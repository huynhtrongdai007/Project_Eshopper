 @extends('admin.master')
   @section('title','Danh Sách Số Lượng Trong Kho')
 @section('content')
 <div class="card">
        <div class="card-header">
          <h3 class="card-title">Danh Sách Số Lượng Trong Kho</h3>
        
          
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
         <th>Code</th>
         <th>Tên Sản Phẩm</th>
         <th>Đã Bán</th>
         <th>Số Lượng Trước Nhập</th>
         <th>Số Lượng Thêm</th>
         <th>Số Lượng Sau Nhập</th>
         <th>Ngày Nhập</th>
      </tr>
   </thead>
   <tbody>
    @php
      $stt = 0;
    @endphp
    @foreach ($data as $items)
      @php
        $stt++;
      @endphp
        <tr>
          <td>{{$stt}}</td>
          <td>{{$items->code}}</td>
          <td>{{$items->name}}</td>
          <td>{{$items->selling_quantity}}</td>
          <td>{{$items->remain - $items->input_number}}</td>
                    <td>{{$items->input_number}}</td>

          <td>{{$items->remain}}</td>
          <td>{{$items->ngaythemhang}}</td>
       </tr>
    
    @endforeach
  
   </tbody>
</table>


 </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
 </div>
 @endsection