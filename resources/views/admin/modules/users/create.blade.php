 @extends('admin.master')
 @section('title','Thêm User')
 @section('content')
   <form  action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
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
              <input type="text" id="category_name" value="{{old('username')}}" name="username" class="form-control" id="exampleInputEmail1" placeholder="Enter User Name">
            @error('username')
              <span class="text-danger">{{$message}}</span>
            @enderror
            </div>
             <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="email"  name="email" value="{{old('email')}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Email">
               @error('email')
              <span class="text-danger">{{$message}}</span>
            @enderror
            </div>
            <div class="form-group">
              <label>Image</label>
              <input type="file" value="{{old('image')}}" name="image" class="form-control">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Password</label>
              <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="Enter Password">
               @error('password')
              <span class="text-danger">{{$message}}</span>
            @enderror      
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