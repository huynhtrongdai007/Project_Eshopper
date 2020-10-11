 @extends('admin.master')
 @section('title','Thông Tin Liên Hệ')
 @section('content')
   
      <div id="message-success"></div>
 <div class="card">
        <div class="card-header">
          <h3 class="card-title">Thông tin liên hệ</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
              <h3>Name: {{$showcontact->name}}</h3><br/>
              <h3>Email: {{$showcontact->email}}</h3><br/>
              <h3>Subject: {{$showcontact->subject}}</h3><br/>
              <h3>Message: {{$showcontact->content}}</h3>
          
  
        </div>
        <!-- /.card-body -->
        
        <!-- /.card-footer-->
 </div>
 </form>

 @endsection

