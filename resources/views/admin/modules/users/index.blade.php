 @extends('admin.master')
   @section('title','Danh Sách Users')
 @section('content')
  <?php
          $message = Session::get('message');
            if($message)
             {
               echo"<div class='alert alert-success' role='alert'>'$message'</div>";
               Session::put('message',null);
             }
          ?>
 <div class="card">
        <div class="card-header">
          <h3 class="card-title">Danh Sách Users</h3>
        
          
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
         <th>Email</th>
         <th>image</th>
         <th>Created at</th>
         <th>Updated at</th>
         <th>Actions</th>
      </tr>
   </thead>
   <tbody>
     @foreach ($data_users as $items)
        <tr>
         <td>{{$items->id}}</td>
           <td>
              {{$items->username}}
          </td>
           
         <td>
            {{$items->email}}
         </td>
      
         <td>
           <img width="80" src="{{ asset("./public/uploads/users/{$items->image}")}}" alt="">
         </td>
         <td>{{$items->created_at}}</td>
         <td>{{$items->updated_at}}</td>
         <td><a href="{{ route('admin.user.edit',['id'=>$items->id]) }}">Edit</a> | <a href="{{ route('admin.user.destroy',['id'=>$items->id]) }}">Delete</a></td>
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