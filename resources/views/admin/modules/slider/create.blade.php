 @extends('admin.master')
 @section('title','Thêm Slider')
 @section('content')
   <form id="form-slider" action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
 <div class="card">
        <div class="card-header">
          <h3 class="card-title">Thêm Slider</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">

            <div class="form-group">
                    <label for="exampleInputEmail1">Slider Name</label>
                    <input type="text" id="slider_name" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Slider Name">
                    @foreach($errors->all() as $e)
                    <span class="text-danger">{{$e}}</span>
                    @endforeach
            </div>
            <div class="form-group">
              <label for="">Description</label>
              <textarea id="description" name="description" class="form-control" id="exampleInputEmail1" placeholder="Enter Description"></textarea> 
            </div>
             <div class="form-group">
             <label>Image</label>
             <input type="file" id="image" name="image">
            </div>
            <div class="form-group">
              <select class="form-control" id="status" name="status">
                <option value="">Chọn trạng thái</option>
                <option value="1">On</option>
                <option value="0">Off</option>
              </select>
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