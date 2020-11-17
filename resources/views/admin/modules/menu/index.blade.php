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
         <th>Name</th>
         <th>parent</th>
         <th>Status</th>
         <th>Created at</th>
         <th>Updated at</th>
         <th>Actions</th>
      </tr>
   </thead>
   <tbody>
     @foreach ($dataMenu as $items)
        <tr>
         <td>{{$items->id}}</td>
           <td>
              {{$items->name}}
          </td>
           
         <td>
          @if($items->parent_id==0)
           0
           @else 
           @foreach ($dataMenu as $items2)
             @if($items2->id==$items->parent_id)
                {{$items2->name}}
             @endif
           @endforeach
          @endif
         </td>
       
         <td>
           @if($items->category_status==1)
          <input type="checkbox" class="category_status_off" id="{{$items->id}}" checked data-toggle="toggle" data-onstyle="success" data-offstyle="danger">
          @else
           <input type="checkbox" class="category_status_on" id="{{$items->id}}" data-toggle="toggle" data-onstyle="success" data-offstyle="danger">
          @endif
          </td>
         <td>{{$items->created_at}}</td>
         <td>{{$items->updated_at}}</td>
         <td><a href="{{ route('admin.menu.edit',['id'=>$items->id]) }}">Edit</a> | <a href="{{ route('admin.menu.destroy',['id'=>$items->id]) }}">Delete</a></td>
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