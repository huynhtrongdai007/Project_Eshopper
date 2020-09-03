 @extends('admin.master')
 @section('title','Thêm Thương Hiệu')
 @section('content')
   <form id="form-category" action="{{ route('admin.brand.store') }}" method="POST">
      @csrf
 <div class="card">
        <div class="card-header">
          <h3 class="card-title">Thêm Thể Hiệu</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">

            <div class="form-group">
              <label for="exampleInputEmail1">Brand Name</label>
              <input type="text" id="brand_name" name="brand_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Brand Name">
              @foreach($errors->all() as $e)
              <span class="text-danger">{{$e}}</span>
              @endforeach
            </div>
            <div class="form-group">
              <label>Status</label>
              <select class="form-control" id="brand_status" name="status">
                <option value="">Chọn trạng thái</option>
                <option value="1">On</option>
                <option value="0">Off</option>
              </select>
              @foreach($errors->all() as $e)
              <span class="text-danger">{{$e}}</span>
              @endforeach
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