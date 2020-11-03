 @extends('admin.master')
   @section('title','Chi tiết đơn hàng')
 @section('content')
 <div class="card">
        <div class="card-header">
          <h3 class="card-title">Chi tiết đơn hàng:</h3>
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

         <th>tên khách hàng</th>
         <th>địa chỉ</th>
         <th>số điên thoại</th>
      </tr>
     
   </thead>
   <tbody>
 
      <tr>
        <td>{{$detail_customer->lastname}} {{$detail_customer->middlename}} {{$detail_customer->firstname}}</td> 
        <td>{{$detail_customer->address}}</td>
        <td>{{$detail_customer->phone}}</td>
      </tr>
    
  </tbody>
  <thead>
     <tr>
         <th>tên sản phẩm</th>
         <th>Hinh Anh</th>
         <th>Số Lượng</th>
         <th>Giá</th>
         <th>Tổng Tiền</th>
      </tr>
      <tbody>
        @foreach ($getOrderDetail as $items)
         <tr>
          <td>{{$items->product_name}}</td>
          <td><img width="80" src="{{ asset("public/uploads/products/{$items->image}") }}" alt=""></td>
          <td>{{$items->qty}}</td>
          <td>{{number_format($items->price)}}</td>
          <td>{{number_format($items->qty * $items->price)}}</td>

        </tr>
        @endforeach
        <tr>
          <td colspan="5">Tong Thanh Tien {{$items->total}}</td>

        </tr>
        <tr>
           <td>Ma don hang: {{$items->order_code}}</td>
        </tr>
      </tbody>
  </thead>
  <tbody>
    
  </tbody>
</table>

 </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <a target="_blank" href="{{ route('admin.orders.print_order',['order_code'=>$items->order_code]) }}" class="btn btn-success">Print Bill</a>
        </div>
        <!-- /.card-footer-->
 </div>
 @endsection