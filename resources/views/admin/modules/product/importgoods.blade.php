 @extends('admin.master')
 @section('title','Thêm Số Lượng Sản Phẩm')
 @section('content')
 <?php
  $message = Session::get('message');
    if($message)
     {
       echo"<div class='alert alert-success'>'$message'</div>";
       Session::put('message',null);
     }
  ?>
   <form id="form-category" action="{{ route('admin.warehouse.storeimportgoods',['id'=>$single->id]) }}" method="POST">
      @csrf
 <div class="card">
        <div class="card-header">
          <h3 class="card-title">Thêm Số Lượng Sản Phẩm</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
             <div class="form-group">
              <label>Product Name</label>
              <input type="text" value="{{$single->name}}" readonly  class="form-control"> 
            </div>
            <div class="form-group">
              <label>Code</label>
              <input type="text" value="{{$single->code}}" readonly  class="form-control"> 
            </div>
            <div class="form-group">
              <label>So Luong Ton</label>
              <input type="text" value="{{$single->remain}}" name="remain" readonly class="form-control"> 
            </div>
            <div class="form-group">
              <label>Số Lượng Nhập Thêm</label>
              <input type="text" value="" name="input_remain" class="form-control"> 
            </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <input type="submit" value="Thêm" class="btn btn-primary">
        </div>
        <!-- /.card-footer-->
        
 </div>
 </form>
 @endsection