@extends('layouts.main')
@section('stylesheet')
<link href="{{asset('css/invoice.css')}}">
<script src="{{asset('js/poppercart.min.js')}}"></script>
<script src="{{asset('js/jquerycart.min.js')}}"></script>
<script src="{{asset('datatable/jquery-3.5.1.js')}}"></script>
@endsection
@section('content')
<div class="container-fluid">
<form  action="{{route('orders.store')}}" method="post" > 
    @csrf     
    <div  style="margin-top:35px;"  class="container">
        <div class="row">
            <div class="col-4">
                <div class="mb-3">
                    <label  class="form-label">Invoice #</label>
                    <input type="number" readonly name="invoice_id"  class="form-control" >
                  </div><script src="{{asset('js/invoiceid.js')}}"></script>
                  <div class="mb-3">
                    <label  class="form-label">Invoice Date</label>
                    <span class="form-control" readonly >{{ Carbon\Carbon::now();  }}</span>
                  </div>
            </div>

            <div class="col-4"></div>
                <div class="col-4">
                    <div class="">
                      <label  class="form-label">Payment Method</label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label">
 <input onkeyPress="submitButtonClick(event)"  keyDown="submitButtonClick(event)"  onkeyUp="submitButtonClick(event)"  type="radio" class="form-check-input"  value="Cash" name="payment_method">Cash
                      </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label">
<input  onkeyPress="submitButtonClick(event)"  keyDown="submitButtonClick(event)"  onkeyUp="submitButtonClick(event)"  type="radio" class="form-check-input" value="Pos" checked name="payment_method" >Pos
                      </label>
                    </div>
                    <div class="form-check-inline disabled">
                      <label class="form-check-label">
 <input onkeyPress="submitButtonClick(event)"  keyDown="submitButtonClick(event)"  onkeyUp="submitButtonClick(event)"   value="Transfer" type="radio" class="form-check-input"  name="payment_method" >Transfer
                      </label>
                    </div>
                    <div class="form-check-inline disabled">
                      <label class="form-check-label">
<input  onkeyPress="submitButtonClick(event)"  keyDown="submitButtonClick(event)"  onkeyUp="submitButtonClick(event)"  type="radio" value="Others" class="form-check-input" name="payment_method">Others
                      </label>
                    </div>
                    
                </div>
            </div>
    </div>

<div class="container" style="margin-top:35px;" >
<table id="cart" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th hidden style="width:8%"></th>
            <th style="width:50%">Item</th>
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
<td hidden data-th="Product_id"><input name="product_id[]" value="{{ $details['id'] }}" class="form-control "> </td>
<td data-th="Product"><input readonly name="product_name[]" value="{{ $details['name'] }}" class="form-control "></td>
<td data-th="Price"><input onkeyup="submitButtonClick(event)"  type="number" name="unitprice[]" value="{{ $details['price'] }}" class="form-control price update-cart"></td>
<td data-th="Quantity"><input  onkeyup="submitButtonClick(event)" name="quantity[]" type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" /></td>
<td data-th="Subtotal" class="text-center">
<input type="number" onkeypress="submitButtonClick(event)" readonly name="total[]" value="{{ $details['price'] * $details['quantity'] }}" class="form-control" />
</td>
<td  class="actions" data-th="">
<button class="btn btn-danger btn-sm remove-from-cart"  data-id="{{ $id }}"><i class="fa fa-trash"></i>
</button></td>
                </tr>
            @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-right"><h3><strong>
            Total N: 
            <input type="number" style="width:170px; margin-left: 710px;"  name="trantotal" value="{{$total}}" readonly class="form-control"   /></strong></h3></td> </tr>
        </strong></h3></td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">
                <a href="{{ route('orders.create') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Adding Items</a>
                <a href="{{ route('checkout.cart.clear') }}" class="btn btn-danger">Clear Cart</a>
            </td>
                 
        </tr>
    </tfoot>
</table>
<div>





<div>
    @livewire('statecity')
  </div>
  
  
  <div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <button type="submit" value="finish" name="action" class="btn btn-success btn-md">Finish</button>
            <button onclick="openWindow()" type="submit" value="finishprint" name="action"   class="btn btn-success btn-md"><i class="fa fa-print"></i> Finish/Print</button>
            <a onclick="submitButtonClick(event)"  data-target="#calculatorModal" data-toggle="modal" class="btn btn-primary btn-md">Calculator</a>
            @include('orders.calculatormodal')
        </div>
        </div>
     </div>
      </form>  

    </div>

<script>
    $(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});
</script>

    @include('orders.cartscript')
    @endsection
@section('scripts')
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
   <script src="{{asset('js/1.12.0-jquery.min.js')}}"></script>
  <script src="{{asset('js/invoice.js')}}"></script>
  <script src="{{asset('js/calculator.js')}}"></script>
  <script src="{{asset('js/cartpopper.js')}}"></script>
  <script src="{{asset('js/cartjquery.min.js')}}"></script>
  @endsection

