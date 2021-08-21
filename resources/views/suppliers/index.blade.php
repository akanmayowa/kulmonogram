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
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Supplier 
            <a  href="{{route('suppliers.create')}}" class="btn btn-primary btn-icon-split btn-sm float-right">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Add New Supplier</span>
            </a></h6>
         </div>
        </div>
          <div class="card-body">
            <div class="table-responsive">
                <script type="text/javascript">
                    $(document).ready(function() {
                      $('#example1').DataTable( {
                          dom: 'Bfrtip',
                      buttons: [
                      'excelHtml5',
                      'csvHtml5',
                      'pdfHtml5'
                          ]
                      } );
                  } );
                  </script>
                <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Supplier Id</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Edit</th>
                            @if (auth()->check())
                            @if(auth()->user()->is_admin == 1)
                            <th>Delete</th>
                            @else
                            @endif
                            @endif
                     </tr>
                    </thead>
                    <tbody>			
                     @forelse ($suppliers as $supplier)
                           <tr> 
                           <td>{{$supplier->supplier_id}}</td>
                            <td>{{$supplier->supplier_name}}</td>
                            <td>{{$supplier->supplier_phone}}</td>
                         <td>{{$supplier->supplier_email}}</td>
                         <td><a href="{{ route('suppliers.edit', ['id'=>$supplier->id]) }}" class="btn btn-sm btn-info btn-circle"><i class="fas fa-edit"></i></a></td>
@if (auth()->check())
@if(auth()->user()->is_admin == 1)
<td><a  href="{{ route('suppliers.destroy', ['id'=>$supplier->id]) }}" class="btn btn-sm btn-danger btn-circle"> <i class="fas fa-trash"></i></a></td>
@else
@endif
@endif
@empty
<td colspan="6">
No Suppliers
 </td>
</tr> 
                     
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    <div class="container-fluid" style="margin-bottom:4rem;">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
              Expenses
              </h6>
             </div>
            </div> 
<div class="row">
    <div class="container">
        @if(session('warning'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>	
              {{ session('warning') }}
            </div> 
        @endif
      </div>
<div class="col-4">
 <div class="card">
<div class="card-header">
<strong >Add Expenses</strong>
</div>


<div class="card-body">

    <form method="post" action="{{route('purchase.store')}}">
    @csrf
        <div class="mb-3">
          <label  class="form-label">Purchase #</label>
          <input type="number" readonly class="form-control" name="stock_id">
        </div>				
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Item</label>
          <input type="text" class="form-control" name="stock_name">
        </div>
        <div class="mb-3">
            <label  class="form-label">Quantity</label>
            <input type="number" class="form-control"  name="stock_quantity">
          </div>
          <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" class="form-control" name="stock_price">
          </div>
          <div class="mb-3">
            <label  class="form-label">Supplier</label>
         
            <select type="text" class="form-control" name="supplier_name">
                <option disabled selected>Select a Supplier</option>
                @forelse( $suppliers as $supplier )
                <option value="{{ $supplier->supplier_name }}" >{{ $supplier->supplier_name }}</option>
                @empty
                <option  selected disabled>
                    Create Supplier First!
                    {{Session::flash('warning', 'Create Supplier First Before Adding Expenses!')}}
               </option>
                @endforelse         
            </select>
          </div>
    <button type="submit"  style="margin-top:10px;" class="btn btn-sm btn-success btn-md">Save Expenses</button>
      </form>

</div>
</div>
</div>
<div class="col-8">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Expenses</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <script type="text/javascript">
                    $(document).ready(function() {
                      $('#example').DataTable( {
                          dom: 'Bfrtip',
                      buttons: [
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
                            <th>Purchase #</th>
                            <th>Item</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Supplier</th>
                            <th>Date</th>
                            @if (auth()->check())
                            @if(auth()->user()->is_admin == 1)
                            <th>Edit</th>
                            <th>Delete</th>
                            @else
                            @endif
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($stocks as $stock)
                        <tr>
                            <td>{{$stock->stock_id}}</td>
                            <td>{{$stock->stock_name}}</td>
                            <td>{{$stock->stock_quantity}}</td>
                            <td>{{$stock->stock_price}}</td>
                            <td>{{$total  = $stock->stock_price * $stock->stock_quantity }}</td>
                            <td>{{$stock->supplier_name}}</td>
                            <td>{{date_format($stock->created_at,'d/M/y')}}</td>
 
    @if (auth()->check())
     @if(auth()->user()->is_admin == 1)
   <td> <a  class="btn btn-info btn-sm btn-circle"><i class="fas fa-edit"></i></a> </td>
    <td>  <a href="{{ route('purchase.destroy', ['id'=>$stock->id]) }}"  class="btn btn-danger btn-sm btn-circle"> <i class="fas fa-trash"></i></a> </td>
    @else
    @endif
    @endif
    
    
    @empty
                        
    <td colspan="9">
    No Stocks available
     </td>
    

</tr>
                            
                         @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>    
</div>
@endsection
@section('javascript')
<script src="{{asset('js/app.js')}}"></script>
<script>
var jQ = $.noConflict(true);
jQ(document).ready(function(){
var number = 1 + Math.floor(Math.random() * 99999);
jQ("input[name='stock_id']").val(number);
});</script>
@endsection

