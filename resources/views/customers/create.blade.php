@extends('layouts.main')
@section('stylesheet')
<script src="{{asset('datatable/jquery-3.5.1.js')}}"></script>
@endsection
@section('content')
<div class="container-fluid">

      
                    <h1 class="h3 mb-2 text-gray-800">Customer</h1>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add New Customer</h6>
                       
                         </div>
                        </div>
                      
       <div class="card-body">
<form method="POST" action="{{route('customers.store')}}">
@csrf
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Full Name</label>
    <div class="col-sm-10">
      <input type="text" name="name" class="form-control" >
    </div>
  </div>
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Phone-Number</label>
    <div class="col-sm-10">
      <input type="number" name="phone" class="form-control">
    </div>
  </div>
   <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Date of Birth</label>
    <div class="col-sm-10">
      <input type="date" name="dob" class="form-control">
    </div>
  </div>
   <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Address</label>
    <div class="col-sm-10">
      <textarea type="text" name="address"  rows="5" class="form-control" placeholder="Address Here"></textarea>
    </div>
  </div>


   <div class="form-group row">
    <button type="reset" style="margin-left:190px; margin-top:50px; margin-right:10px" class="btn btn-danger mb-2">Cancel</button>
    <button type="submit" style=" margin-top:50px;" class="btn btn-success mb-2">Save Customer</button>
  </div>
</form>
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

