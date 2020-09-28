 @extends('admin.master')
   @section('title','Danh Sách Orders')
 @section('content')
 <div class="card">
        <div class="card-header">
          <h3 class="card-title">Danh Sách Orders</h3>
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
         <th>#</th>
         <th>Name</th>
         <th>Image</th>
         <th>Total</th>
         <th>Status</th>
         <th>Created at</th>
         <th>Updated at</th>
         <th>Actions</th>
      </tr>
   </thead>
   <tbody>
    @foreach ($data_orders as $items)
      <tr>
          <td>{{$items->id_order}}</td>
          <td>{{$items->lastname}} {{$items->middlename}} {{$items->firstname}}</td>
         
          <td>{{$items->total}}</td>
          <td>{{number_format($items->status_order)}}</td>
          <td>{{$items->created_at}}</td>
          <td>{{$items->updated_at}}</td>
          <td><a href="{{ route('admin.orders.show',['id'=>$items->id_order,'shipping_id'=>$items->shipping_id] )}}">Xem</a> | <a href="">Xóa</a></td>
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