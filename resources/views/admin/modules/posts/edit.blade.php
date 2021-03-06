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
   <form id="form-post" action="{{ route('admin.post.update',['id'=>$getById->id]) }}" method="POST" enctype="multipart/form-data">
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
              <input type="text"  value="{{$getById->title}}" name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter  Name">
            </div>
            @error('title')
            <span class="text-danger">{{$message}}</span>
            @enderror
             <div class="form-group">
              <label for="exampleInputEmail1">Slug</label>
              <input type="text"  value="{{$getById->slug}}" name="slug" class="form-control" id="exampleInputEmail1" placeholder="Enter  Name">
            </div>
            @error('slug')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <div class="mesaage-error"></div>
             <div class="form-group">
              <label for="exampleInputEmail1">Description</label>
              <textarea name="description" class="form-control">{{$getById->description}}</textarea>
            </div>
            @error('description')
              <span class="text-danger">{{$message}}</span>
            @enderror
            <div class="form-group">
              <label for="">Content</label>
              <textarea style="height: 200px" id="content" name="content" class="form-control" id="exampleInputEmail1" placeholder="Enter Mô tả bài viết">{{$getById->content}}</textarea>
            </div>
             @error('content')
              <span class="text-danger">{{$message}}</span>
            @enderror
               <img width="200" src="{{ asset("public/uploads/posts/{$getById->image}") }}" alt="">
            <div class="form-group mt-3">
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
                      @if ($items->id == $getById->category_post_id)
                        <option selected value="{{$items->id}}">{{$items->name}}</option>
                   @else
                        <option value="{{$items->id}}">{{$items->name}}</option>   
                   @endif
                   @endforeach
                  
                </select>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <input type="submit"  value="Thêm" class="btn btn-primary">
        </div>
        <!-- /.card-footer-->
 </div>
 </form>

 @endsection

