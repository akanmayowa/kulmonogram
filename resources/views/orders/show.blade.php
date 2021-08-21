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
<div id="pdf" class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">   
                    <div class="card-body p-0">
                        <div class="row p-5"> 
                            <div class="col-md-6">
    <img src="{{asset('image/logo2.jpg')}}">
        <div><strong> PLAZA NO, 30-32 OJUELEGBA ROAD, SHOP, A06/A07</strong></div>
        <div><strong>TEL: 08023093400, 08107688499</strong></div>
        <div><strong>Kul@gmail.com</strong></div>
</div>
   <div class="col-md-6 text-right">
    <p class="font-weight-bold mb-1">
    <a type="button" id="btnPrint"  class="pull-right hidden-print"><i class="fa fa-print"></i>PRINT THIS RECEIPT </a></p>
    <br>
  <p class="font-weight-bold mb-1">INVOICE #@foreach ($order->transaction as $orders){{$orders->invoice_id}} @endforeach</p>
 <p class="font-weight-bold mb-1">DATE: @foreach ($order->transaction as $orders){{$orders->transac_date}} @endforeach</p>
                            </div>
                        </div>
                        <hr class="my-5">
                        <div class="row pb-5 p-5">
                            <div class="col-md-6">
                                <p class="font-weight-bold mb-4">CLIENT INFORMATION</p>
                                <p class="mb-1"><strong>NAME:</strong> {{$order->customer->name}}</p>
                                <p class="mb-1"><strong>ADDRESS:</strong> {{$order->customer->address}}</p>
                                <p class="mb-1"><strong>PHONE #:</strong> {{$order->customer->phone}}</p>
                            </div>
                            <div class="col-md-6 text-right">
                                <p class="font-weight-bold mb-4">PAYMENT DETAILS</p>
<p class="mb-1"><span class="text-muted"><strong>ORDER #:</strong> </span>{{$order->id}}</p>
 <p class="mb-1"><span class="text-muted"><strong>PAYMENT TYPE:</strong>@foreach($order->transaction as $orders) {{$orders->payment_method}}@endforeach</span></p>
                                <p class="mb-1"><span class="text-muted"><strong>USER AUTH #:</strong>@foreach($order->transaction as $orders) {{$orders->user_id}}@endforeach </span></p>
                            </div>
                        </div>
    
                        <div class="row p-5">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="border-0 text-uppercase small font-weight-bold">ID</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">Item</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">Description</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">Quantity</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">Unit Cost</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <span hidden>{{$count = 0}}</span>
                                        <span hidden>{{$total1 = 0}}</span>
                                        @foreach ($order->orderdetail as $orders)
                                        <tr>
                                            <td>{{$count += 1}}</td>
                                            <td>{{$orders->product_name}}</td>
                                            <td>{{$orders->product_name}}</td>
                                            <td>{{$orders->quantity}}</td>
                                            <td>{{$orders->unitprice}}</td>
                                            <td>{{$total1 += $orders->quantity * $orders->unitprice}}</td>
                                        </tr>
                                        @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="d-flex flex-row-reverse bg-success text-dark p-4">
                            <div class="py-3 px-5 text-right">
                                <div class="mb-2">Grand Total</div>
                                <div class="h2 font-weight-bold">N: {{$total1}}</div>
                            </div>
                            <div class="py-3 px-5 text-right">
                                <div class="mb-2">Discount</div>
                                <div class="h2 font-weight-bold">0%</div>
                            </div>
                            <div class="py-3 px-5 text-right">
                                <div class="mb-2">Sub - Total amount</div>
                                <div class="h2 font-weight-bold">N: {{$total1}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-light mt-5 mb-5 text-center small">BY : <a class="text-light">KUL MONOGRAM & PRINT</a></div>
    </div>
</div>


@endsection


@section('javascript')
<script src="{{asset('datatable/jquery-3.5.1.js')}}"></script>
<script src="{{ asset('js/app.js')}}"></script>
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script type="text/javascript">
$(function () {
    $("#btnPrint").click(function () {
        var contents = $("#pdf").html();
        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({ "position": "absolute", "top": "-1000000px" });
        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();
        frameDoc.document.write('<html><head><title>DIV Contents</title>');
        frameDoc.document.write('</head><body>');
        frameDoc.document.write('<link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">');
        frameDoc.document.write(contents);
        frameDoc.document.write('</body></html>');
        frameDoc.document.close();
        setTimeout(function () {
            window.frames["frame1"].focus();
            window.frames["frame1"].print();
            frame1.remove();
        }, 500);
    });
});
</script>
@jquery
@endsection










