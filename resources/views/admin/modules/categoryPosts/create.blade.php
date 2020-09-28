 @extends('admin.master')
 @section('title','Thêm Danh Mục Bài Viết')
 @section('content')
   <form id="form-category-post" action="{{ route('admin.category_posts.store') }}" method="POST">
      @csrf
      <div id="message-success"></div>
 <div class="card">
        <div class="card-header">
          <h3 class="card-title">Thêm Danh Mục Bài Viết</h3>
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
              <input type="text" id="name" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter  Name">
            </div>
             <div class="form-group">
              <label for="exampleInputEmail1">Slug Name</label>
              <input type="text" id="slug" name="slug" class="form-control" id="exampleInputEmail1" placeholder="Enter Slug">
            </div>
            <div class="form-group">
              <label for="">Description</label>
              <textarea style="height: 200px" id="description" name="description" class="form-control" id="exampleInputEmail1" placeholder="Enter Mô tả bài viết"></textarea>
            </div>
          
  
  
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <input type="submit" id="save" value="Thêm" class="btn btn-primary">
        </div>
        <!-- /.card-footer-->
 </div>
 </form>

 @endsection

