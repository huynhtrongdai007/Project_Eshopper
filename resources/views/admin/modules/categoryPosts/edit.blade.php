 @extends('admin.master')
 @section('title','Sửa Danh Mục Bài Viết')
 @section('content')
   <form id="form-category-post">
    
     
 <div class="card">
        <div class="card-header">
          <h3 class="card-title">Sửa Danh Mục Bài Viết</h3>
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
              <input type="text" id="name" name="name" value="{{"$getById->name"}}" class="form-control" id="exampleInputEmail1" placeholder="Enter  Name">
            </div>
            <div class="mesaage-error"></div>
             <div class="form-group">
              <label for="exampleInputEmail1">Slug Name</label>
              <input type="text" id="slug" name="slug" value="{{"$getById->slug"}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Slug">
            </div>
            <div class="form-group">
              <label for="">Description</label>
              <textarea style="height: 200px" id="description" name="description" class="form-control" id="exampleInputEmail1" placeholder="Enter Mô tả bài viết">{{"$getById->description"}}</textarea>
            </div>
          
  
  
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <input type="hidden" id="id_update" value="{{$getById->id}}">
          <button type="submit" id="btn-update" class="btn btn-primary">Edit</button> 
        </div>
        <!-- /.card-footer-->
 </div>
 </form>

 @endsection

