 @extends('admin.master')
 @section('title','Thêm User')
 @section('content')
   <form  action="{{ route('admin.user.update',['id'=>$data_user->id]) }}" method="POST" enctype="multipart/form-data">
      @csrf
 <div class="card">
        <div class="card-header">
          <h3 class="card-title">Thêm User</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">

            <div class="form-group">
              <label >User Name</label>
              <input type="text" value="{{$data_user->username}}" name="username" class="form-control" id="exampleInputEmail1" placeholder="Enter User Name">
            @error('username')
              <span class="text-danger">{{$message}}</span>
            @enderror
            </div>
             <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="email"  name="email" value="{{$data_user->email}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Email">
               @error('email')
              <span class="text-danger">{{$message}}</span>
            @enderror
            </div>
            <div class="form-group">
              <label>Image</label>
              <img width="300" src="{{ asset("./public/uploads/sliders/{$data_user->image}")}}"><br/>
              <label class="mt-3">Update new image</label>
              <input type="file" name="image" class="form-control">
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