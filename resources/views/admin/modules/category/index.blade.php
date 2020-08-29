 @extends('admin.master')
   @section('title','Danh Sách Thể Loại')
 @section('content')
 <div class="card">
        <div class="card-header">
          <h3 class="card-title">Danh Sách Thể Loại</h3>
         <?php
          $message = Session::get('message');
            if($message)
             {
               echo"<div class='alert alert-success'>'$message'</div>";
               Session::put('message',null);
             }
          ?>
          
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
<div class="card-body">
<table id="example1" class="table table-bordered table-hover">
   <thead>
      <tr>
         <th>#</th>
         <th>Name Category</th>
         <th>Status</th>
         <th>Created at</th>
         <th>Updated at</th>
         <th>Actions</th>
      </tr>
   </thead>
   <tbody>
     @foreach ($data_cat as $items)
        <tr>
         <td>{{$items->id}}</td>
         <td>{{$items->category_name}}</td>
         <td>
            @if($items->category_status==1)
             <div class="text-center bade badge-success">On</div>
            @else
            <div class="text-center bade badge-danger">Off</div>
            @endif
          </td>
         <td>{{$items->created_at}}</td>
         <td>{{$items->updated_at}}</td>
         <td><a href="{{ route('admin.category.edit',['id'=>$items->id]) }}">Edit</a> | <a href="{{ route('admin.category.destroy',['id'=>$items->id]) }}">Delete</a></td>
      </tr>
     @endforeach
     

</table>

 </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
 </div>
 @endsection