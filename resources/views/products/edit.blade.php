<!-- Modal -->

<div class="modal right fade" id="editProduct{{ $product->id}}"  
tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="editProduct">Edit product</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          {{ $product->id}}
        </div>
        <div class="modal-body">
          <form action="{{route('products.update', $product->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="product_name" value="{{$product->product_name}}" id="" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="">Brand</label>
            <input type="text" name="brand" value="{{$product->brand}}" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="">Price</label>
                <input type="number" name="price" value="{{$product->price}}" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Quantity</label>
                <input type="number" name="quantity" value="{{$product->quantity}}" id="" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="">Alert Stock</label>
                <input type="number" name="alert_stock" value="{{$product->alert_stock}}" id="" class="form-control">
            </div>
            
            
            <div class="form-group">
                <label for="">Description</label>
                <textarea type="text" name="description" id="" cols="30" rows="2" class="form-control">{{$product->description}}</textarea>
            </div>
            
            <div class="modal-footer">
                <!-- <i class="fa fa-search"></i> -->
                <button class="btn btn-block btn-success" value="submit" type="submit">Update Product</button>
            
              </div>
            </form>
</div>
      </div>
    </div>
  </div>