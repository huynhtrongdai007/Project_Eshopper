 @extends('admin.master')
 @section('title','Thêm Bài Viết')
 @section('content')
    <?php
          $message = Session::get('message');
           $message_error = Session::get('message-error');
            if($message)
             {
               echo"<div class='alert alert-success'>'$message'</div>";
               Session::put('message',null);
             }
            if($message_error)
             {
               echo"<div class='alert alert-danger'>'$message_error'</div>";
               Session::put('message-error',null);
             }
          ?>
   <form id="form-post" action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div id="message-success"></div>
 <div class="card">
        <div class="card-header">
          <h3 class="card-title">Thêm Bài Viết</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">

            <div class="form-group">
              <label for="exampleInputEmail1">Post Name</label>
              <input type="text"  value="{{old("title")}}" name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter  Name">
            </div>
            @error('title')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <div class="form-group">
              <label for="exampleInputEmail1">Slug</label>
              <input type="text"  value="{{old("slug")}}" name="slug" class="form-control" id="exampleInputEmail1" placeholder="Enter Slug">
            </div>
            @error('slug')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <div class="mesaage-error"></div>
             <div class="form-group">
              <label for="exampleInputEmail1">Description</label>
              <textarea name="description" class="form-control">{{old("description")}}</textarea>
            </div>
            @error('description')
              <span class="text-danger">{{$message}}</span>
            @enderror
            <div class="form-group">
              <label for="">Content</label>
              <textarea style="height: 200px" id="content" name="content" class="form-control" id="exampleInputEmail1" placeholder="Enter Mô tả bài viết">{{old("Content")}}</textarea>
            </div>
             @error('content')
              <span class="text-danger">{{$message}}</span>
            @enderror
            <div class="form-group">
              <label for="">Image</label>
              <input type="file" name="image" value="{{old("image")}}" class="form-control">
            </div>
             @error('image')
              <span class="text-danger">{{$message}}</span>
            @enderror
            <div class="form-group">
                <select class="form-control" name="category_post_id">
                   <option value="">----Chọn Chuyên Mục Bài Post----</option>
                   @foreach ($getAllData_category_post as $items)
                     <option value="{{$items->id}}">{{$items->name}}</option>
                   @endforeach
                </select>
            </div>
            @error('category_post_id')
              <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <input type="submit"  value="Thêm" class="btn btn-primary">
        </div>
        <!-- /.card-footer-->
 </div>
 </form>

 @endsection

