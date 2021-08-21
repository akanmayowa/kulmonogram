@extends('layouts.main')
@section('stylesheet')
<script src="{{asset('datatable/jquery-3.5.1.js')}}"></script>
@endsection
@section('content')
                <div class="container-fluid">
                    <div class="col-xl-6">
                            <div id="result"></div>
                        </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Profile
                            </h6>
                         </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable_info" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>S/n</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $user)
                                        <tr >
     @if(Auth::user()->id   == $user->id) <th>{{ $user->id  }}</th>@else<th></th> @endif
     @if(Auth::user()->id   == $user->id)  <th>{{ $user->name  }}</th>@else<th></th> @endif
     @if(Auth::user()->id   == $user->id)  <th>{{ $user->email }}</th>@else<th></th> @endif
     @if(Auth::user()->id   == $user->id) 
    <th>
     @if($user->is_admin == 1)
    <a href="#" class="btn btn-danger btn-sm btn-icon-split"><span class="text-white-50">
 </span> <span class="text">Admin</span> </a> 
 @else <a href="#" class="btn btn-primary btn-sm btn-icon-split"> <span class="text-white-50">
  </span><span class="text">Cashier/User</span></a>  
  @endif </th>
  @else<th></th> @endif

@if(Auth::user()->id   == $user->id)
<th> <a href="{{ route('users.edit', [$user->id]) }}"  class="btn btn-sm btn-primary"><span class="icon text-white-50"><i class="fas fa-flag"></i></span></a></th>
@else
<th></th>@endif
</tr> 
@empty

<tr>
<th colspan="5">No users</th>
</tr> 
                                       
                                    @endforelse                                  
                                    </tbody>
                                </table>	
                     </div>
                    </div>
                    </div>
                    @endsection
             @section('javascript')
                    <script  src="{{asset('js/userhandler.js')}}"></script>
                    @endsection

