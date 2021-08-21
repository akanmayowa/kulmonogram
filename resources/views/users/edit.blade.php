@extends('layouts.main')
@section('stylesheet')
<script src="{{asset('datatable/jquery-3.5.1.js')}}"></script>
@endsection
@section('content')
                <div class="container-fluid">
                   
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h5 class="m-0 font-weight-bold text-primary">Update Users </h5>
                         </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('users.update', $user->id) }}"  method="post">
                              @method('put')  
                              @csrf
                                <div class="form-group">
                                  <label for="recipient-name" class="col-form-label">Name:</label>
                                  <input readonly type="text"value="{{$user->name}}"  required class="form-control" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Email Address:</label>
                                    <input readonly type="email" value="{{$user->email}}" required class="form-control" name="email">
                                  </div>
                                 
                    
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Password:</label>
                                    <input type="password"  class="form-control" name="password">
                                  </div>
                            </div>
                            <div class="modal-footer">
                              <button type="reset" class="btn btn-secondary">Cancel</button>
                              <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                         </form>
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

