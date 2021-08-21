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
    <form action="{{ route('suppliers.update', ['id'=>$suppliers->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
   <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Suppliers ID</label>		
    <div class="col-sm-10">
      <input type="number" value="{{$suppliers->supplier_id}}" readonly name="supplier_id" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Full Name</label>
    <div class="col-sm-10">
      <input type="text" value="{{$suppliers->supplier_name}}" name="supplier_name" class="form-control" >
    </div>
  </div>
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Email Address</label>
    <div class="col-sm-10">
      <input type="email" value="{{$suppliers->supplier_email}}" name="supplier_email" class="form-control">
    </div>
  </div>
     <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Supplier Phone</label>
    <div class="col-sm-10">
  <input type="number" value="{{$suppliers->supplier_phone}}" name="supplier_phone" class="form-control">
    </div>
  </div>
   <div class="form-group row">
    <button type="reset" style="margin-left:190px; margin-top:50px; margin-right:10px" class="btn btn-danger mb-2">Cancel</button>
    <button type="submit" style=" margin-top:50px;" class="btn btn-success mb-2">Update Supplier</button>
  </div>
</form>
</div>
</div>     
@jquery             
@endsection

