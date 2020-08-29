 @extends('admin.master')
  @section('title','Sửa Thể Loại')
 @section('content')
    <form id="form-category" action="{{ route('admin.category.update',['id'=>$data_cat->id]) }}" method="POST">
      @csrf
 <div class="card">
        <div class="card-header">
          <h3 class="card-title">Chỉnh Sửa Thể Loại</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="form-group">
            <label>Category Name</label>
            <input type="text" id="category_name" name="category_name" class="form-control" value="{{$data_cat->category_name}}">
          </div>
          <div class="form-group">
           <select id="category_status" name="category_status" class="form-control">
             <option value="">Chọn trạng thái</option>
              @if($data_cat->category_status==1)
                <option selected="selected" value="1">On</option>
                <option value="0">Off</option>
              @else
                <option selected="selected" value="0">Off</option>
                <option value="1">On</option>
              @endif
           </select>
            
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <input type="submit" value="Edit" class="btn btn-primary">
        </div>
        <!-- /.card-footer-->
 </div>
</form>
 @endsection