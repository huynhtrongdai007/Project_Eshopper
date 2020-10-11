 @extends('admin.master')
   @section('title','Danh Sách Liện Hệ')
 @section('content')
 @php
   $message = Session::get('message');
 @endphp
 @if ($message)
  <div class="alert alert-success">{{$message}}</div>  
  {{Session::put('message',null)}}
 @endif
 
 <div class="card">
        <div class="card-header">
          <h3 class="card-title">Danh Sách Liên Hệ</h3>
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
         <th>Subject</th>
         <th>Created at</th>
         <th>Actions</th>
      </tr>
   </thead>
   <tbody>
  @foreach ($data as $items)
        <tr>
          <td>{{$items->id}}</td>
          <td>{{$items->name}}</td>
          <td>{{$items->email}}</td>
          <td>{{$items->subject}}</td>
          <td>{{$items->created_at}}</td>
         <td><a href="{{ route('admin.contact.show',['id'=>$items->id]) }}">Show</a> | <a href="{{ route('admin.contact.destroy',['id'=>$items->id]) }}">Delete</a></td>
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