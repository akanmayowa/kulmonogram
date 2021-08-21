@extends('layouts.main')
@section('stylesheet')
@jquery
<script src="{{asset('datatable/jquery-3.5.1.js')}}"></script>
<script src="{{asset('datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('datatable/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('datatable/jszip.min.js')}}"></script>
<script src="{{asset('datatable/pdfmake.min.js')}}"></script>
<script src="{{asset('datatable/vfs_fonts.js')}}"></script>
<script src="{{asset('datatable/buttons.html5.min.js')}}"></script>
<script src="{{asset('datatable/buttons.print.min.js')}}"></script>
@endsection
@section('content')
<div class="container-fluid">
  <p class="mb-4"></p>
  
  <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Order
          <a  href="{{route('orders.create')}}" class="btn btn-primary btn-icon-split btn-sm float-right">
              <span class="icon text-white-50">
                  <i class="fas fa-plus"></i>
              </span>
              <span class="text">Add New Invoice</span>
          </a></h3>      </div>
      <div class="card-body">
    
        <div class="table-responsive">
            <script type="text/javascript">
                $(document).ready(function() {
                  $('#example').DataTable( {
                      dom: 'Bfrtip',
                  buttons: [
                  'copyHtml5',
                  'excelHtml5',
                  'csvHtml5',
                  'pdfHtml5'
                      ]
                  } );
              } );
              </script>
              <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>Ord#</th>
                          <th>Invoice #</th>
                          <th>Items</th>
                          <th>Qty</th>
                          <th>Price</th>
                          <th>Amnt</th>
                          <th>Total</th>
                          <th>Date</th>
                          <th>Print</th>
                      
                            @if (auth()->check())
                            @if(auth()->user()->is_admin == 1)
                            <th>Del</th>
                            @else
                            @endif
                            @endif
                        
                        </tr>
                  </thead>
                  <tbody>
                    @forelse($orders as $order)
                    <span hidden>{{$total1 = 0}}</span>
                         <tr>
                        <td>{{$order->id}}</td>
                        <td>@foreach($order->transaction as $item){{$item->invoice_id}}<br>@endforeach</td>
                        <td>@foreach($order->orderdetail as $item){{$item->product_name}}<br> @endforeach</td>
                        <td>@foreach($order->orderdetail as $item){{$item->quantity}}<br> @endforeach</td>
                        <td>@foreach($order->orderdetail as $item){{$item->unitprice}}<br>@endforeach</td>
                        <td>@foreach($order->orderdetail as $item){{$item->total}}<br><span hidden>{{$total1 += $item->quantity * $item->unitprice}}</span>@endforeach</td>
                        <td>{{$total1}}</td>
                        <td> @foreach($order->transaction as $item){{$item->transac_date}}<br>@endforeach</td>
 <td> 
<a href="{{route('orders.show',[$order->id])}}" class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Print"><i class="fa fa-print"></i></a>
<a href="{{route('orders.printpos',[$order->id])}}" class="btn btn-warning btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Print"><i class="fa fa-print"></i></a>
</td>

@if (auth()->check())
@if(auth()->user()->is_admin == 1)
<td>
    <form  action="{{ url('/orders' . '/' .$order->id) }}" method="post">
        @method('DELETE')
         @csrf
        <button type="submit"   class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete">
        <i class="fa fa-trash"></i></button>
        </form> 
    </td>
@else
@endif
@endif
                </tr>
                @empty
                <tr><td colspan="12">No Order Data</td></tr>
                @endforelse
                  </tbody>
              </table>
          </div>
      </div>
  </div>
</div>
@endsection
@section('javascript')  
@endsection
