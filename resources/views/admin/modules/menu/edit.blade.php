 @extends('admin.master')
 @section('title','Thêm Menu')
 @section('content')
  <?php
    $message = Session::get('message');
      if($message)
       {
         echo"<div class='alert alert-success'>".$message."</div>";
         Session::put('message',null);
       }
    ?>
   <form id="form-category" action="{{ route('admin.menu.update',['id'=>$menuFollowIdEdit->id]) }}" method="POST">
      @csrf
 <div class="card">
        <div class="card-header">
          <h3 class="card-title">Thêm Menu</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">

            <div class="form-group">
              <label for="exampleInputEmail1">Menu Name</label>
              <input type="text" name="name" class="form-control" value="{{$menuFollowIdEdit->name}}" placeholder="Enter Category Name">
            </div>
            <div class="form-group">
                <select class="form-control" name="parent_id">
                 <option value="0">Chọn danh muc cha</option>
                 {!! $optionSelect!!}
              </select>
            </div> 
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <input type="submit" value="Sửa" class="btn btn-primary">
        </div>
        <!-- /.card-footer-->
 </div>
 </form>
 @endsection