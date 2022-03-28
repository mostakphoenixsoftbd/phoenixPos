<!-- Modal -->

<div class="modal right fade" id="deleteUser{{ $user->id}}"  
tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Delete User</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          {{ $user->id}}
        </div>
        <div class="modal-body">
<form action="{{ route('users.destroy', [$user->id]) }}" method="post" >
@csrf
@method('DELETE')

<P> <h4 style="color:red">Are you sure you want to delete this {{ $user->name}} ? </h4></P>

<div class="modal-footer">
<button class="btn btn-success" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-danger">Delete</button>

  </div>
</form>
</div>
      </div>
    </div>
  </div>