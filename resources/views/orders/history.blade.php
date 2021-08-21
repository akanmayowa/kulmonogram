@extends('layouts.main')
@section('stylesheet')
<script src="{{asset('datatable/jquery-3.5.1.js')}}"></script>
@endsection
@section('content')
<div class="container-fluid">
  <p class="mb-4"></p>
  <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">User Order History
          <a  href="{{route('orders.create')}}" class="btn btn-primary btn-icon-split btn-sm float-right">
              <span class="icon text-white-50">
                  <i class="fas fa-plus"></i>
              </span>
              <span class="text">Add New Invoice</span>
          </a></h6>      </div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>Order #</th>
                          <th>Invoice #</th>
                          <th>Items</th>
                          <th>Qty</th>
                          <th>Price</th>
                          <th>Amount</th>
                          <th>Total</th>
                          <th>Sold by</th>
                          <th>Date</th>
                          <th>Print</th>
                          <TH>Print</TH>
                      </tr>
                  </thead>
                  <tbody>
                
                            @foreach($orderss as $order)

                            <span hidden>{{$total1 = 0}}</span>
                                 <tr>
                                <td>{{$order->id}}</td>
                                <td>@foreach($order->transaction as $item){{$item->invoice_id}}<br>@endforeach</td>
                                <td>@foreach($order->orderdetail as $item){{$item->product_name}}<br> @endforeach</td>
                                <td>@foreach($order->orderdetail as $item){{$item->quantity}}<br> @endforeach</td>
                                <td>@foreach($order->orderdetail as $item){{$item->unitprice}}<br>@endforeach</td>
                                <td>@foreach($order->orderdetail as $item)
                                {{$item->total}}<br>
                                <span hidden>{{$total1 += $item->quantity * $item->unitprice}}</span>@endforeach</td>
                              
                                <td>{{$total1}}</td>
                                
<td>
        @foreach ($order->transaction as $item)
        @foreach ($user as $users)
        @if($users->id == $item->user_id)
        {{$users->name}}
        @endif
        @endforeach
        @endforeach
</td>
 <td> @foreach($order->transaction as $item){{\Carbon\Carbon::parse($item->transac_date)->format('d/m/Y')}}<br>@endforeach</td>
<td><a href="{{route('orders.show',[$order->id])}}" class="btn btn-primary btn-sm" ><i class="fa fa-print"></i> Print</a></td>  
<td><a href="{{route('orders.printpos',[$order->id])}}" class="btn btn-success btn-sm" ><i class="fa fa-print"></i> Pos</a></td>  
</tr>
   @endforeach

           </tbody>
              </table>
          </div>
      </div>
  </div>
</div>  
@endsection
@section('javascript')
@endsection
