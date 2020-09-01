 @extends('admin.master')
 @section('title','Sua Slider')
 @section('content')
   <form id="form-category" action="{{ route('admin.slider.update',['id'=>$data_slider->id]) }}" method="POST" enctype="multipart/form-data">
      @csrf
 <div class="card">
        <div class="card-header">
          <h3 class="card-title">Sua Slider</h3>
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
                    <input type="text" id="category_name" name="name" value="{{$data_slider->name}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Slider Name">
                    @foreach($errors->all() as $e)
                    <span class="text-danger">{{$e}}</span>
                    @endforeach
            </div>
            <div class="form-group">
              <label for="">Description</label>
              <input type="text" id="description" name="description" value="{{$data_slider->description}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Description">
            </div>

             <div class="form-group">
             <label>Image</label>
             <input type="file" id="image" name="image" value="{{$data_slider->image}}">
            </div>
            <div class="form-group">
              <select class="form-control" id="status" name="status">
                <option value="">Chọn trạng thái</option>
                @if($data_slider->status)
                <option selected value="1">On</option>
                 <option value="0">Off</option>
                @else
                <option selected value="0">Off</option>
                <option value="1">On</option>
                @endif
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