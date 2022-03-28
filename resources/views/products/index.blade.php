@extends('layouts.app')


@section('content')

<div class="container-fluid">
    <div class="col-lg-12">
    <div class="row">
           
     <div class="col-md-9">
        <div class="card">
            <div class="card-header"><h4 style="float: left;">Products List</h4>
                <a class="btn btn-success" data-toggle="modal" data-target="#addUserModal" style="float:right" href="#">
               <i style="padding-right: 7px;" class="fa fa-plus"></i>Add New Products</a></div>
            <div class="card-body">
<table class="table table-bordered table-left">
<thead>
<tr>
    <th>#</th>
    <th>Name</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Brand</th>
    <th>Stock Alert</th>
    <th>Description</th>
    <th>Action</th>
</tr>
</thead>
<tbody>
@foreach ($products as $key => $product )
<tr>
    <td>{{$key +1}}</td>
    <td>{{$product->product_name}}</td>
    <td>{{number_format($product->price, 2)}}</td>
    <td>{{$product->quantity}}</td>
    <td>{{$product->brand}}</td>
    <td>
    {{-- <!-- @if ($product->alert_stock <= 100)  --> --}}
    @if($product->alert_stock <= $product->quantity) 
    <span class="badge badge-danger">Low Stock >{{$product->alert_stock}} </span>
    @else
    <span class="badge badge-success">{{$product->alert_stock}}</span>
@endif
</td>
    <td>{{$product->description}}</td>
    <td>
<div class="btn-group text-center offset-2">
<a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editProduct{{$product->id}}"> 
<i style="padding-right:2px" class="fa fa-edit"></i>Edit</a>
&nbsp;&nbsp;
<a href="#" data-toggle="modal" data-target="#deleteProduct{{$product->id}}"
 class="btn btn-sm btn-danger">
 <i style="padding-right: 2px" class="fa fa-trash"></i>Delete</a>

</div>

<!-- Edit Modal Begin -->

@include('products.edit')

<!-- Edit modal end -->
<!-- Edit Modal Begin -->

@include('products.delete')

<!-- Edit modal end -->
</td>
</tr>
@endforeach
</tbody>
{{ $products->links()}}
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
          <h4 class="modal-title" id="exampleModalLabel">Add Product</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

<form action="{{route('products.store')}}" method="post">
@csrf
<div class="form-group">
    <label for="">Name</label>
    <input type="text" name="product_name" id="" class="form-control">
</div>

<div class="form-group">
    <label for="">Brand</label>
<input type="text" name="brand" value="" class="form-control">
</div>

<div class="form-group">
    <label for="">Price</label>
    <input type="number" name="price" id="" class="form-control">
</div>
<div class="form-group">
    <label for="">Quantity</label>
    <input type="number" name="quantity" id="" class="form-control">
</div>

<div class="form-group">
    <label for="">Alert Stock</label>
    <input type="number" name="alert_stock" id="" class="form-control">
</div>


<div class="form-group">
    <label for="">Description</label>
    <textarea type="text" name="description" id="" cols="30" rows="2" class="form-control"></textarea>
</div>

<div class="modal-footer">
    <!-- <i class="fa fa-search"></i> -->
    <button class="btn btn-block btn-success" value="submit" type="submit">Save Product</button>

  </div>
</form>

  
                    
        </div>
      </div>
    </div>
  </div>



<!-- {{-- User Edit Modal Begin --}}

{{-- User Edit Modal End --}} -->
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