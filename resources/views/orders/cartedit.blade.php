
<table id="cart" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th style="width:8%">id</th>
            <th style="width:50%">Product</th>
            <th style="width:30%">Price</th>
            <th style="width:5%">Quantity</th>
            <th style="width:22%" class="text-center">Amount</th>
            <th style="width:5%">Action</th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0 @endphp
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
         @php $total += $details['price'] * $details['quantity'] @endphp
 <tr data-id="{{ $id }}">
 <td data-th="Product_id"><input name="product_id[]" value="{{ $details['id'] }}" class="form-control "> </td>
  <td data-th="Product">
      
    <input readonly name="product_name[]" value="{{ $details['name'] }}" class="form-control ">

</td>
 <td data-th="Price"><input onkeyup="submitButtonClick(event)"  type="number" name="unitprice[]" value="{{ $details['price'] }}" class="form-control price update-cart"></td>
<td data-th="Quantity"><input onkeyup="submitButtonClick(event)"  type="number" name="quantity[]" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" /> </td>
 <td data-th="Subtotal" class="text-center">
     <input type="number" onkeypress="submitButtonClick(event)" readonly name="total[]" value="{{ $details['price'] * $details['quantity'] }}" class="form-control" />
    </td>
<td>
<form action="{{ route('remove.from.cart') }}" method="POST">
@csrf
<input type="hidden" value="{{ $details['id'] }}" name="id">
<button type="submit"  class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
</form>
</td>
 </tr>
 @endforeach
  @endif
    </tbody>
    <tfoot>
        <tr>
<td  colspan="5" class="text-right"><h3><strong>Total N:
<input type="number" style="width:110px; margin-left: 500px;"  name="trantotal" value="{{$total}}" readonly class="form-control"   /></strong></h3></td> </tr>
<tr><td colspan="5" class="text-right">
<a href="{{ route('checkout.cart.clear') }}" class="btn btn-warning">Clear Cart</a></td>
 </tr>
</tfoot>
</table>
<script>
    $(document).ready(function () {
     $('#button').click(function(e) {
      e.preventDefault();
       e.stopPropagation();
        e.stopImmediatePropagation();
         return false;
        });});
    </script>