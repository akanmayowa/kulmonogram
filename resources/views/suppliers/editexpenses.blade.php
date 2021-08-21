@extends('layouts.main')
@section('stylesheet')
@endsection
@section('content')
<div class="container-fluid">
 <h1 class="h3 mb-2 text-gray-800">Supplier</h1>
      <div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Edit Supplier Info</h6>
   </div>
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
@jquery             
@endsection

