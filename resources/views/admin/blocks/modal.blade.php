
 <!-- Modal -->
<div class="modal fade" id="show_{{$single_data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>Name:</h3><p>{{$single_data->name}}</p><br/>
        <h3>Email:</h3><p>{{$single_data->email}}</p><br/>
        <h3>Created_at:{{$single_data->created_at}}</h3>
        <h3>Conten Comment:</h3><br/>
        <p>
          {{$single_data->comment}}
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>