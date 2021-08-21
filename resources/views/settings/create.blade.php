@extends('layouts.main')
@section('stylesheet')
<script src="{{asset('datatable/jquery-3.5.1.js')}}"></script>
@endsection
@section('content')
<div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Company</h1>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add Company info</h6>
                         </div>
                     </div>
                      
       <div class="card-body">
  <form action="{{ route('suppliers.store') }}" method="post" enctype="multipart/form-data">
        @csrf
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Company Name</label>
    <div class="col-sm-10">
      <input type="text" name="setting_name" class="form-control" >
    </div>
  </div>
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Company Address</label>
    <div class="col-sm-10">
      <input type="email" name="setting_address" class="form-control">
    </div>
  </div>
     <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Email Address</label>
    <div class="col-sm-10">
      <input type="number" name="setting_email" class="form-control">
    </div>
  </div>
       <div class="form-group row">
    <label  class="col-sm-2 col-form-label">company Phone</label>
    <div class="col-sm-10">
      <input type="number" name="setting_phone" class="form-control">
    </div>
  </div>
   <div class="form-group row">
    <button type="reset" style="margin-left:190px; margin-top:50px; margin-right:10px" class="btn btn-danger mb-2">Cancel</button>
    <button type="submit" style=" margin-top:50px;" class="btn btn-success mb-2">Save</button>
  </div>
</form>
</div>

</div>   

@endsection
@section('javascript')
<script src="{{asset('js/app.js')}}"></script>
<script>
var jQ = $.noConflict(true);
jQ(document).ready(function(){
var number = 1 + Math.floor(Math.random() * 999999999);
jQ("input[name='supplier_id']").val(number);

});</script>
@jquery
@endsection

