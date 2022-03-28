@extends('layouts.app')


@section('content')

<div class="container-fluid">
    <div class="col-lg-12">
    <div class="row">
           
     <div class="col-md-9">
        <div class="card">
            <div class="card-header"><h4 style="float: left;">User List</h4>
                <a class="btn btn-success" data-toggle="modal" data-target="#addUserModal" style="float:right" href="#">
               <i style="padding-right: 7px;" class="fa fa-plus"></i>Add New User</a></div>
            <div class="card-body">
<table class="table table-bordered table-left">
<thead>
<tr>
    <th>#</th>
    <th>Name</th>
    <th>Email</th>
    {{-- <th>Phone</th> --}}
    <th>Role</th>
    <th>Action</th>
</tr>
</thead>
<tbody>
@foreach ($users as $key => $user )
<tr>
    <td>{{$key +1}}</td>
    <td>{{$user->name}}</td>
    <td>{{$user->email}}</td>
    {{-- <td>{{$user->phone}}</td> --}}
    <td>
        @if ($user->is_admin==1) Admin @else Cashier @endif</td>
        <td>
<div class="btn-group text-center offset-2">
<a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editUser{{$user->id}}"> 
<i style="padding-right:2px" class="fa fa-edit"></i>Edit</a>
&nbsp;&nbsp;
<a href="#" data-toggle="modal" data-target="#deleteUser{{$user->id}}"
 class="btn btn-sm btn-danger">
 <i style="padding-right: 2px" class="fa fa-trash"></i>Delete</a>

</div>

<!-- Edit Modal Begin -->

@include('users.edit')

<!-- Edit modal end -->
<!-- Edit Modal Begin -->

@include('users.delete')

<!-- Edit modal end -->
</td>
</tr>
@endforeach
</tbody>
</table>                  
            </div>
        </div>        
    
    
    
    
    </div>       

     <div class="col-md-3">
        <div class="card">
            <div class="card-header"><h4>Search User</h4></div>
            <div class="card-body">
eeerere                 
            </div>
        </div>


     </div>

        </div>
    </div>
</div>

{{-- User Modal code --}}


<!-- Modal -->
<div class="modal right fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Add User</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

<form action="{{route('users.store')}}" method="post">
@csrf
<div class="form-group">
    <label for="">Name</label>
    <input type="text" name="name" id="" class="form-control">
</div>
<div class="form-group">
    <label for="">Email</label>
    <input type="email" name="email" id="" class="form-control">
</div>
{{-- <div class="form-group">
    <label for="">Phone</label>
    <input type="text" name="phone" id="" class="form-control">
</div> --}}
<div class="form-group">
    <label for="">Password</label>
    <input type="password" name="password" id="" class="form-control">
</div>
<div class="form-group">
    <label for="">Confirm Password</label>
    <input type="password" name="confirm_password" id="" class="form-control">
</div>
<div class="form-group">
    <label for="">Role</label>
    <select name="is_admin" type="text" id="" class="form-control">
        <option value="1">Admin</option>
        <option value="2">Cashier</option>

    </select>

</div>

<div class="modal-footer">
    {{-- <i class="fa fa-search"></i> --}}
    {{-- <input type="submit" class="btn btn-block btn-success">Save --}}
    <button class="btn btn-block btn-success" value="submit" type="submit">Save</button>

  </div>
</form>

  
                    
        </div>
        {{-- {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
      </div>
    </div>
  </div>



{{-- User Edit Modal Begin --}}

{{-- User Edit Modal End --}}
<style>
    .modal.right .modal-dialog{
        /* position: absolute; */
        top:0; 
        right:0;
         margin-right:19vh;
    }
.modal.fade:not(.in).right .modal-dialog{
    -webkit-transform: translate3d(25%, 0, 0);
    transform: translate3d(25%, 0, 0);
}


</style>


@endsection