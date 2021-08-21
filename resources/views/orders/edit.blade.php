@extends('layouts.main')
@section('stylesheet')
<script src="{{asset('datatable/jquery-3.5.1.js')}}"></script>
@endsection
@section('content')
<div class="container-fluid">
     @include('orders.companyshow')
     <div class="row">
     </div>

     
   
         <div  style="margin-top:35px;"  class="container">
        <div class="row">
               <div class="col-4">
                <div class="mb-3">
  <label  class="form-label"><strong>Invoice #</strong></label>
  <span>@foreach($order->transaction as $orders){{$orders->invoice_id}}@endforeach</span>
  <br>
  <label  class="form-label"><strong>Order #</strong></label>
  <span>@foreach($order->transaction as $orders){{$orders->order_id}}@endforeach</span>
  <br>
  <label  class="form-label"><strong>Date</strong></label>
  <span>@foreach($order->transaction as $orders){{$orders->transac_date}}@endforeach</span>
  <br>                    
</div>
                </div>
            </div>
    </div>

    <form action="{{route('orders.update', $order->id)}}" method="POST">
      @method('put') 
      @csrf   
<div class="container">
  <div class="row clearfix">
    <div class="col-md-12">
      <table class="table table-bordered table-hover" id="tab_logic">
        <thead>
          <tr>
            <th class="text-center" > # </th>
            <th class="text-center"> Product </th>
            <th class="text-center"> Qty </th>
            <th class="text-center"> Price </th>
            <th class="text-center"> Total </th>
          </tr>
        </thead>
        <tbody>
          @foreach($order->orderdetail as $orders)
          <tr >
            <td >
              <input type="text"  name='invoice_id[]'  value="{{$orders->invoice_id}}"  class="form-control"/>
              <input type="text"  name='order_id[]'  value="{{$orders->order_id}}"  class="form-control"/>
              <input type="text"  name='product_id[]'  value="{{$orders->product_id}}"  class="form-control"/></td>
            <td><input type="text" name='product_name[]'  value="{{$orders->product_name}}"  class="form-control"/></td>
            <td><input type="number" name='quantity[]'  value="{{$orders->quantity}}"  class="form-control qty"  min="0"/></td>
            <td><input type="number" name='unitprice[]'  value="{{$orders->unitprice}}"  class="form-control price"  min="0"/></td>
            <td><input type="number" name='total[]'  value="{{$orders->total}}" placeholder='0.00' class="form-control total" readonly/></td>
         
         
          </tr>
          @endforeach
         
        </tbody>
      </table>

    </div>
  </div>
  <div class="row clearfix">
  </div>
  <div class="row clearfix" style="margin-top:20px">
    <div class="col-md-6"></div>
    <div class="pull-right col-md-6">
      <table class="table table-bordered table-hover" id="tab_logic_total">
        <tbody>
          <tr>
            <th class="text-center">Sub Total</th>
            <td class="text-center">
<input value="@foreach($order->transaction as $key => $item)@endforeach{{$item->trantotal}}" type="number" name='trantotal'   class="form-control" id="sub_total" readonly/>
          </td>
          </tr>
          <tr>
            <th class="text-center">Tax</th>
            <td class="text-center"><div class="input-group mb-2 mb-sm-0">
                <input readonly type="number" class="form-control" id="tax" placeholder="0">
                <div class="input-group-addon">%</div>
              </div></td>
          </tr>
          <tr>
            <th class="text-center">Tax Amount</th>
            <td class="text-center"><input type="number" name='tax_amount' id="tax_amount" placeholder='0.00' class="form-control" readonly/></td>
          </tr>
          <tr>
            <th class="text-center">Grand Total</th>
<td class="text-center"><input value="@foreach($order->transaction as $key => $item)@endforeach{{$item->trantotal}}" type="number" name='trantotal' id="total_amount"  class="form-control" readonly/></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>




<div class="container" style="margin-bottom: 20pt;">
  <div class="row">
      <div class="col-md-6 offset-md-3">
          <button type="submit" value="finish" name="action" class="btn btn-success btn-md">Finish</button>
          <button onclick="openWindow()" type="submit" value="finishprint" name="action"   class="btn btn-success"><i class="fa fa-print"></i> Finish/Print</button>
          <a onclick="submitButtonClick(event)"  data-target="#calculatorModal" data-toggle="modal" class="btn btn-primary btn-md">Calculator</a>
          @include('orders.calculatormodal')
      </div>
      </div>
   </div>
</form>  
</div>



@endsection
@section('javascript')
<script type="text/javascript">
$(document).ready(function(){
    var i=1;
    $("#add_row").click(function(){b=i-1;
      	$('#addr'+i).html($('#addr'+b).html()).find('td:first-child').html(i+1);
      	$('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      	i++; 
  	});
    $("#delete_row").click(function(){
    	if(i>1){
		$("#addr"+(i-1)).html('');
		i--;
		}
		calc();
	});
	
	$('#tab_logic tbody').on('keyup change keydown change keypress change',function(){
		calc();
	});
	$('#tax').on('keyup change keydown change keypress change',function(){
		calc_total();
	});
	

});

function calc()
{
	$('#tab_logic tbody tr').each(function(i, element) {
		var html = $(this).html();
		if(html!='')
		{
			var qty = $(this).find('.qty').val();
			var price = $(this).find('.price').val();
			$(this).find('.total').val(qty*price);
			
			calc_total();
		}
    });
}

function calc_total()
{
	total=0;
	$('.total').each(function() {
        total += parseInt($(this).val());
    });
	$('#sub_total').val(total.toFixed(2));
	tax_sum=total/100*$('#tax').val();
	$('#tax_amount').val(tax_sum.toFixed(2));
	$('#total_amount').val((tax_sum+total).toFixed(2));
}
</script>
<script src="{{asset('js/1.12.0-jquery.min.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>            
<script src="{{asset('js/calculator.js')}}"></script>
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
@jquery
@endsection


