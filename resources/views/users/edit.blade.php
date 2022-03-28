<!-- Modal -->

<div class="modal right fade" id="editUser{{ $user->id}}"  
tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Edit User</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          {{ $user->id}}
        </div>
        <div class="modal-body">
<form action="{{ route('users.update', [$user->id]) }}" method="post" >
@csrf
@method('PUT')
<div class="form-group">
    <label for="">Name</label>
    <input type="text" name="id" readonly value="{{$user->id}}" id="" class="form-control">
    <input type="text" name="name" value="{{$user->name}}" id="" class="form-control">
</div>
<div class="form-group">
    <label for="">Email</label>
    <input type="email" name="email" value="{{$user->email}}" id="" class="form-control">
</div>
<div class="form-group">
    <label for="">Password</label>
    <input type="password" name="password" readonly value="{{$user->password}}" id="" class="form-control">
</div>
<div class="form-group">
    <label for="">Role</label>
    <select name="is_admin" type="text" id="" class="form-control">
        <option value="1" @if ($user->is_admin == 1) selected
        @endif>Admin</option>
        <option value="2" @if ($user->is_admin == 2) selected            
        @endif>Cashier</option>

    </select>

</div>

<div class="modal-footer">
<button class="btn btn-block btn-success" value="submit" type="submit">Update User</button>

  </div>
</form>
</div>
      </div>
    </div>
  </div>