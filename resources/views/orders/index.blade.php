@extends('layouts.app')

@section('content')

<div class="container-fluid">
<div class="col-lg-12">
<div class="row">

<div class="col-md-9">
<div class="card">
<div class="card-header">
<h4 style="float: left;"> Order Products
</h4>
<a class="btn btn-success" data - toggle="modal" data - target="#addUserModal" style="float:right" href="#">
<i style="padding-right: 7px;" class="fa fa-plus">
</i>Add New Products</a>
</div>
<div class="card-body">
<table class="table table-bordered table-left">
<thead>
<tr>
        {{-- <th></th> --}}
<th> Name
</th>
<th> Quantity
</th>
<th> price
</th>
<th> Discount( % )
</th>
<th> Total
</th>
<th>
<button  class="btn btn-sm btn-success add_more">
<i class="fa fa-plus-circle">
</i>
</button>
</th>
</tr>
</thead>
<tbody class="addMoreProduct">

<tr>
        {{-- <td>1</td> --}}
<td class="productsColumn">
<select name="product_id[]" class="form-control product_id">
@foreach($products as $product)
<option  data-price="{{ $product->price }}" 
        value="{{ $product->id}}"> 
        {{ $product->product_name }}
</option>
@endforeach
</select>
</td>
<td>
<input type="number" name="quantity[]" id="quantity"  
class="quantity form-control">
</td>
<td>
<input type="number" name="price[]" id="price"  
class="price form-control">
</td>
<td>
<input type="number" name="discount[]" id="discount"  
class="discount form-control">
</td>

<td>
<input type="number" name="total_amount[]" id="total_amount"  
class="total_amount form-control">
</td>

<td>
<a href="#" class="btn btn-sm btn-danger">
<i class="fa fa-times">
</i>
</a>
</td>

</tr>



</tbody>

</table>
</div>
</div>




</div>

<div class="col-md-3">
<div class="card">
<div class="card-header">
<h4>Total <b class="total">0.00</b></h4>
</div>
<div class="card-body">
eeerere
</div>
</div>


</div>

</div>
</div>
</div>
 @endsection
@push('script')
<script>    
                $('.add_more').on('click', function() { 
                        var product = $('.productsColumn').html(); 
                      console.log(product);
                //       return;
                     
                      var tr = 
                '<tr>'+
                        '<td>'+
                '<select name="product_id[]" class="form-control product_id">'+
                '@foreach($products as $product)'+
                '<option value="{{ $product->id}}"> {{ $product->product_name }}</option>'+
                '@endforeach'+
                '</select>'+
                '</td>'+
                '<td><input type="number" name="quantity[]"  class="quantity form-control"></td>'+
                '<td><input type="number" name="price[]"  class="price form-control"></td>'+
                '<td><input type="number" name="discount[]"  class="discount form-control"></td>'+
                 '<td><input type="number" name="total_amount[]"  class="total form-control"></td>'+
                 '<td><a href="#" class="btn btn-sm btn-danger delete rounded-circle"><i class="fa fa-times"></i></a></td>'+
                '</tr>';
                $('.addMoreProduct').append(tr);
                // var product = $('.product_id').html(); 
                // var numberofrow = ($('.addMoreProduct tr').length - 0) + 1; 
                // var tr = '<tr><td class= "no">' + numberofrow + '</td>' +
                // <td><select class = "form-control product_id"
                // name = "product_id[] " > ' + product + ' < /select></td >
                // '<td><input type="number " name="quantity[] " class="form-control"></td>'+
                // '<td><input type="number " name="price[] " class="form-control"></td>'+
                // '<td><input type="number " name="discount[] " class="form-control"></td>'+
                // '<td><input type="number " name="total_amount[] " class="form-control"></td>'+
                // '<td><a class="btn btn-danger btn-sm delete rounded-circle"> 
                // <i class="fa fa-times-circle"></i></a></td>';

                //  $('.addMoreProduct').append(tr);
                });
                //delete row
                $('.addMoreProduct').delegate('.delete', 'click', function(){
                        $(this).parent().parent().remove();
                });

                   function TotalAmount(){
                        var total = 0;
                        $('.total_amount').each(function(i, e){
                                var amount = $(this).val() - 0;
                                total += amount;
                        });
                        
                        $('.total_amount').html(total);
                }
        

                $('.addMoreProduct').delegate('.product_id', 'change', function(){
                        var tr = $(this).parent().parent();
                        var price = tr.find('.product_id option:selected').attr('data-price');
                        tr.find('.price').val(price);
                        var qty = tr.find('.quantity').val() - 0;
                        var disc = tr.find('.discount').val() - 0;
                        var price = tr.find('.price').val() - 0;
                        var total_amount = (qty * price) - ((qty * price * disc) / 100);
                        tr.find('.total_amount').val(total_amount); 
                        // alert(TotalAmount());
                        console.log(TotalAmount());
                        TotalAmount();
                });



</script>
        @endpush