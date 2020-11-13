 @extends('admin.master')
 @section('title','Thêm Thể Loại')
 @section('content')
   <form id="form-category" action="{{ route('admin.category.store') }}" method="POST">
      @csrf
 <div class="card">
        <div class="card-header">
          <h3 class="card-title">Thêm Thể Loại</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">

            <div class="form-group">
              <label for="exampleInputEmail1">Category Name</label>
              <input type="text" id="category_name" name="category_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Category Name">
              @foreach($errors->all() as $e)
              <span class="text-danger">{{$e}}</span>
              @endforeach
            </div>
             <div class="form-group">
              <label for="exampleInputEmail1">Slug Name</label>
              <input type="text" id="slug" name="slug" class="form-control" id="exampleInputEmail1" placeholder="Enter Slug">
            </div>
            <div class="form-group">
                <select class="form-control" id="parent" name="parent">
                <option value="0">Chọn danh muc cha</option>
                  {!!$htmlOption!!}
              </select>
            </div>
            <div class="form-group">
              <select class="form-control" id="category_status" name="category_status">
                <option value="">Chọn trạng thái</option>
                <option value="1">On</option>
                <option value="0">Off</option>
              </select>
            </div>
            <div class="form-group">
             
            </div>
          
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <input type="submit" value="Thêm" class="btn btn-primary">
        </div>
        <!-- /.card-footer-->
 </div>
 </form>
 @endsection