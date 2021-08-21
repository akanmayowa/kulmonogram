@extends('layouts.main')
@section('stylesheet')
<style>
    td:after {
      content: "\00A0";
    }
	@media print {
    .hidden-print,
    .hidden-print * {
        display: none !important;
    }
}
</style>
<script src="{{asset('datatable/jquery-3.5.1.js')}}"></script>
@endsection
@section('content')
<div class="container-fluid">
		  <center>
			<div style="width:900px;"  class="card text-dark mb-3">
				<div class="text-white bg-primary card-header">Print Invoice</div>
				<div class="card-body">
			<div  id="pdf">

				<div>
					<img src="{{asset('image/logo2.jpg')}}" style="height: 50px; width:50px;"> 
				</div>

			<table width="100%" border="0" cellpadding='2' cellspacing="2" align="center"  style="padding-top:4px;">
			<tbody>
			<tr>
				<td style="line-height:18px; vertical-align: bottom; text-align: center;">
							<strong style="font-size:16px;">KUL MONOGRAM & PRINT</strong>
							<br>PHONE: 08023093400 
							<br>6X EXQUISITE PLAZA NO 30|32 OJUELEGBA ROAD SHOP A06|A07
					</td>
			</tr>
			<tr><td height="2" colspan="0" style="border-bottom:1px solid #e4e4e4 "></td></tr>
			</tbody>
			</table>
			
			
			<table width="100%" border="0" cellpadding='2' cellspacing="2" align="center" style="padding-top:4px;">
			<tbody>
			<tr><td style="line-height:18px; vertical-align: bottom; text-align: center;"><strong style="font-size:16px;">SALES INVOICE</strong></td></tr>
			<tr><td style="line-height:18px; vertical-align: bottom; text-align: LEFT;">BRANCH:       YABA,LAGOS </td></tr>
			<tr><td style="line-height:18px; vertical-align: bottom; text-align: LEFT;">SOLD BY:      {{Auth()->user()->name}}</td></tr>
<tr><td style="line-height:18px; vertical-align: bottom; text-align: LEFT;">INVOICE NO:               {{$transactions->invoice_id}}
			</td></tr>
			<tr><td style="line-height:18px; vertical-align: bottom; text-align: LEFT;">TRANS DATE:   {{\Carbon\Carbon::parse($transactions->transac_date)->format('d/m/Y')}} </td></tr>
			<tr><td style="line-height:18px; vertical-align: bottom; text-align: LEFT;">POSTED ON:    {{ Carbon\Carbon::now();}} </td></tr>
			</tbody>
			</table>
			
					 <br>
					<center>
						 <strong>CASH RECEIPT</strong>
					</center><br>
			<table width="100%" border="0" cellpadding="0" align="center">
				<th>
			<tr>
			 <td style="line-height:18px; vertical-align: top; text-align: left; whitespace: wrap; overflow: hidden;">ITEMS</td>
			<td style="line-height:18px; vertical-align: top; text-align: left; whitespace: nowrap; overflow: hidden;">QTY</td>
			<td style="line-height:18px; vertical-align: top; text-align: left; whitespace: nowrap; overflow: hidden;">PRICE</td>
			<td style="line-height:18px; vertical-align: top; text-align: left; whitespace: nowrap; overflow: hidden;">AMNT</td>
			</tr>
				</th>
			<tbody>
			<div hidden>{{$totalt = 0}}</div>
			@foreach($orderdetails as $orderdetail)
						<tr>
						<td style="line-height:18px; vertical-align: top; text-align: left; whitespace: nowrap; overflow: hidden;">
						<br> {{$orderdetail->product->name}}
						</td>				
						<td style="line-height:18px; vertical-align: top; text-align: left; whitespace: nowrap; overflow: hidden;">
						 <br> {{$orderdetail->quantity}}
						</td>
						<td style="line-height:18px; vertical-align: top; text-align: left; whitespace: nowrap; overflow: hidden;">
							<br>{{$orderdetail->unitprice}}
						</td>
						<td style="line-height:18px; vertical-align: top; text-align: left; whitespace: nowrap; overflow: hidden;">
						<br>{{$orderdetail->total}}					

						</td>
						<td hidden>{{$totalt += $orderdetail->unitprice * $orderdetail->quantity}} </td>
					</tr>
					@endforeach
				</tbody>
			</table>
			
			<table border="0"  style="margin-bottom:30px;line-height:18px; margin-top:60px;border-bottom:1px;" cellpadding="0"  align="">
						<td style="font-size:20px;">
							<strong >TOTAL: {{$totalt}}</strong>
						</td>
				</tbody>
			</table>
			

			<center>
			<p class="centered">THANKS FOR YOUR PATRONAGE......
				<br>KINDLY COME AGAIN, PLEASE.......</p>
			</center>
		
		
		</div>
				</div>
		     	</div>
<button type="button" style="width:700px;"  onclick="printDiv('pdf')" class="btn btn-success btn-md hidden-print">
Print Reciept</button>
				</center>
               </div>
@endsection

@section('javascript')
<script>
	function printDiv(divId,title) {
	  let mywindow = window.open('', 'PRINT', 'height=890,width=800,top=100,left=150');
	  mywindow.document.write('<body><div id="pdf">');
	  mywindow.document.write(document.getElementById(divId).innerHTML);
	  mywindow.document.write('</div></body>');
	  mywindow.document.close(); 
	  mywindow.focus(); 
	  mywindow.print();
	  mywindow.close();
	  return true;
	}
	  </script>
@endsection



