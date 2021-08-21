
  <div class="modal" tabindex="-1" id="recieptModal" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        
      <div id="pdf" class="modal-content">
        <div class="modal-body">
<table width="100%" border="0" cellpadding='2' cellspacing="2" align="center" bgcolor="#ffffff" style="padding-top:4px;">
	<tbody>
		<tr>
			<td style="line-height:18px; vertical-align: bottom; text-align: center;">
				<strong style="font-size:16px;">Shop Name</strong>
				<br>phone: 0403 - 247830 322
				<br>TRN: 34231123123123
				<br> Court Road, Manjeri, Malappuram
			</td>
		</tr>
		<tr>
			<td height="2" colspan="0" style="border-bottom:1px solid #e4e4e4 "></td>
		</tr>
	</tbody>
</table>

<table width="100%" border="0" cellpadding="0" cellspacing="2" align="center">
	<tbody>
		<tr>
			<td colspan="100" style="font-size: 14px; color: #5b5b5b; font-family: 'Open Sans', sans-serif; line-height: 
18px; vertical-align: bottom; text-align: center;">
				<strong>Cash Receipt</strong>
			</td>
		</tr>
		<tr>
			<td style="line-height:18px; vertical-align: bottom; text-align: left;">
				Customerasdf
			   <br> TRN: 234234234234
			</td>
			<td style="line-height:18px; vertical-align: top; text-align: right;">
				<br>INVOICE: #32432432423
				<br>Date: Feb 27, 2018
			</td>
		</tr>
		<tr>
			<td height="2" colspan="100" style="padding-top:15px;border-bottom:1px solid #e4e4e4 "></td>
		</tr>
	</tbody>
</table>

<style>

    td:after {
      content: "\00A0";
    }
	@media print {
  #printPageButton {
    display: none;
  }
}
    </style>


		<center>
             <strong>Cash Receipt</strong>
		</center>
<table width="100%" border="0" cellpadding="0" align="center">
	<th>


			<tr>
            <td style="line-height:18px; vertical-align: top; text-align: center; whitespace: wrap; overflow: hidden;">
			ITEMS
			</td>
			<td style="line-height:18px; vertical-align: top; text-align: center; whitespace: nowrap; overflow: hidden;">
			QTY
			</td>
            <td style="line-height:18px; vertical-align: top; text-align: center; whitespace: nowrap; overflow: hidden;">
			PRICE
			</td>
            <td style="line-height:18px; vertical-align: top; text-align: center; whitespace: nowrap; overflow: hidden;">
			DISC
			</td>
            <td style="line-height:18px; vertical-align: top; text-align: center; whitespace: nowrap; overflow: hidden;">
			AMNT
			</td>
		</tr>
		</th>
<tbody>
<div hidden >{{ $total1 = 0 }}</div>
@foreach($order_details as $order_detail)
			<tr>
			<td style="line-height:18px; vertical-align: top; text-align: center; whitespace: nowrap; overflow: hidden;">
		    <br>
			</td>				
			<td style="line-height:18px; vertical-align: top; text-align: center; whitespace: nowrap; overflow: hidden;">
				<br>{{$order_detail->quantity}}
			</td>
            <td style="line-height:18px; vertical-align: top; text-align: center; whitespace: nowrap; overflow: hidden;">
				<br>{{$order_detail->unitprice}}
			</td>
            <td style="line-height:18px; vertical-align: top; text-align: center; whitespace: nowrap; overflow: hidden;">
				<br>{{$order_detail->discount}}
			</td>
            <td style="line-height:18px; vertical-align: top; text-align: center; whitespace: nowrap; overflow: hidden;">
				<br>{{$order_detail->total}}  
			</td>
			<td hidden>{{$total1 += $order_detail->total}}</td>
		</tr>
@endforeach
	</tbody>
</table>




<table width="100%" border="0 "  style="margin-top:60px;border-bottom:1px solid #e4e4e4 " cellpadding="0" cellspacing="2" align="center">
			<td style="font-size: 18px; line-height: 16px; vertical-align: top; text-align:right;" width="100 ">
                <b>TOTAL:</b> {{$total1}}  

			
			</td>
		<tr>
			<td height="3" colspan="100" style="padding-top:8px;border-bottom:1px"></td>
		</tr>
	</tbody>
</table>

<table width="100%" border="0 " cellpadding="0" cellspacing="2" align="center" style="padding: 12px 0px 5px 2px;">
	<tbody>
		<tr>
		</tr>
		<tr>
			<td style="font-size: 14px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 16px; vertical-align: top; text-align:right; padding-top:16px ">
				Customer Signature
			</td>
		</tr>
		<tr>
			<td style="font-size: 14px; font-family: 'Open Sans', sans-serif; color: #646a6e; line-height: 16px; vertical-align: top; text-align:center; padding-top:16px">

			</td>
		</tr>
	</tbody>
</table>

        </div>
        <div class="modal-footer">
		  <button type="button" id="printPageButton" onclick="printDiv('pdf','Title')" class="btn btn-primary">Print Reciept</button>
		  <button type="button" id="printPageButton" onclick="saveDiv('pdf','Title')"  class="btn btn-secondary" data-dismiss="modal">Save</button>
          <button type="button" id="printPageButton" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<script>
  var doc = new jsPDF();
 function saveDiv(divId, title) {
 doc.fromHTML(`<html><head><title>${title}</title></head><body>` + document.getElementById(divId).innerHTML + `</body></html>`);
 doc.save('div.pdf');
}
function printDiv(divId,
  title) {
  let mywindow = window.open('', 'PRINT', 'height=650,width=800,top=100,left=150');
  mywindow.document.write(`<html><head><title>${title}</title>`);
  mywindow.document.write('</head><body>');
  mywindow.document.write(document.getElementById(divId).innerHTML);
  mywindow.document.write('</body></html>');
  mywindow.document.close(); 
  mywindow.focus(); 
  mywindow.print();
  mywindow.close();
  return true;
}
  </script>
