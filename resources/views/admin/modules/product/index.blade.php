 @extends('admin.master')
   @section('title','Danh Sách Thể Loại')
 @section('content')
 <div class="card">
        <div class="card-header">
          <h3 class="card-title">Danh Sách Thể Loại</h3>
         <?php
          $message = Session::get('message');
            if($message)
             {
               echo"<div class='alert alert-success'>'$message'</div>";
               Session::put('message',null);
             }
          ?>
          
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
<div class="card-body">
<table id="example1" class="table table-bordered table-hover">
   <thead>
      <tr>
        <th>Nhập Hàng</th>
         <th>#</th>
         <th>Code</th>
         <th>Image</th>
         <th>Name</th>
         <th>Category</th>
         <th>Brand</th>
         <th>Price</th>
         <th>Quantity</th>
         <th>Selling Quantitu</th>
         <th>Remain</th>
         <th>Status</th>
         <th>Created at</th>
         <th>Updated at</th>
         <th>Actions</th>
      </tr>
   </thead>
   <tbody>
    @foreach ($data_product as $items)
        <tr>
          <td><a href="{{ route('admin.warehouse.importgoods',['id'=>$items->id]) }}">Nhập Hàng</a></td>
          <td>{{$items->id}}</td>
          <td>{{$items->code}}</td>
          <td><img width="100" src="{{ asset("./public/uploads//products/{$items->image}") }}" alt=""></td>
          <td>{{$items->name}}</td>
          <td>{{$items->category_name}}</td>
          <td>{{$items->brand_name}}</td>
          <td>{{$items->price}}</td>
          <td>{{$items->quantity}}</td>
          <td>{{$items->selling_quantity}}</td>
          <td>{{$items->remain}}</td>
         <td>
          @if($items->status==1)
          <input type="checkbox" class="product_status_off" id="{{$items->id}}" checked data-toggle="toggle" data-onstyle="success" data-offstyle="danger">
          @else

           <input type="checkbox" class="product_status_on" id="{{$items->id}}" data-toggle="toggle" data-onstyle="success" data-offstyle="danger">
          @endif
          </td>
         <td>{{$items->created_at}}</td>
         <td>{{$items->updated_at}}</td>
         <td><a href="{{ route('admin.product.edit',['id'=>$items->id]) }}">Edit</a> | <a href="{{ route('admin.product.destroy',['id'=>$items->id]) }}">Delete</a></td>
      </tr>

      @endforeach

</table>

 </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
 </div>
 @endsection