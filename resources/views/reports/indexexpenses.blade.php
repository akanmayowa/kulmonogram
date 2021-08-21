@extends('layouts.main')
@section('stylesheet')
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
    @include('reports.navbar')
<div class="card shadow mb-4">
    <div class="mb-4 card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Expenses
       </h6>      
     </div>
    <div class="card-body">
  
        <form action="{{route('reports.index')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container">
            <div class="row">
            <label for="from" class="col-form-label">From</label>
                <div class="col-md-4">
                <input required type="date" class="form-control input-lg" id="from" name="from">
                </div>
                <label for="from" class="col-form-label">To</label>
                <div class="col-md-4">
                    <input required type="date" class="form-control input-lg" id="to" name="to">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary btn-sm" name="search" >Search</button>
                </div>
            </div>
        </div>
        </form>
   
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
            <table class="table table-bordered" id="example"  width="100%" cellspacing="0">
                <thead>
                    <tr>
                      <th>Purchase #</th>
                      <th>Item Name</th>
                      <th>quantity </th>
                      <th>Price</th>
                      <th>Total</th>
                      <th>Supplier Name</th>
                      <th>Purchase Date</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($stock as $stocks)
                  <tr>
                    <td>{{$stocks->stock_id}}</td>
                    <td>{{ $stocks->stock_name }}</td>
                      <td>{{ $stocks->stock_quantity }}</td>
                      <td>{{ $stocks->stock_price }}</td>
                      <td>{{ $total = $stocks->stock_quantity * $stocks->stock_price }}</td>
        <td>  {{$stocks->supplier_name}}</td> 
        <td>{{date('d-m-Y', strtotime($stocks->created_at))  }}</td>
                          </tr>
              @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<script>
    $(function(){           
        if (!Modernizr.inputtypes.date) {
            $('input[type=date]').datepicker({
                  dateFormat : 'dd/mm/yyyy'
                }
             );
        }
    });
</script>
@endsection
@section('javascript')
@endsection

