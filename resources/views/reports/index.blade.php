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
                <h6 class="m-0 font-weight-bold text-primary">Sales/Transaction
                  </h6>      
               </div>
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
                      <table class="table table-bordered" id="example"  width="100%" class="display nowrap" cellspacing="0">
                          <thead>
                              <tr>
                                  <th>Invoice #</th>
                                  <th>Order ID</th>
                                  <th>Payment Method</th>
                                  <th>Total </th>
                                  <th>Sold By</th>
                                  <th>Trans-Date</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($transaction as $transactions)
                            <tr>
                              <td>{{ $transactions->invoice_id }}</td>
                              <td>{{ $transactions->order_id }}</td>
                                <td>{{ $transactions->payment_method }}</td>
                                <td>{{ $transactions->trantotal }}</td>
      
      <td>
        @foreach ($user as $users)
        @if($users->id == $transactions->user_id)
        {{$users->name}}
        @endif
        @endforeach
       </td>

                                <td>{{date('d-m-Y', strtotime($transactions->transac_date))  }}</td>
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
