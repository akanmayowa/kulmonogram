@extends('layouts.main')
@section('stylesheet')
@jquery
<script src="{{asset('datatable/jquery-3.5.1.js')}}"></script>
@endsection
@section('content')
                <div class="container-fluid">
                    <div class="col-xl-6">
                            <div id="result"></div>
                        </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">User 
                            <a  data-target="#addModal" data-toggle="modal" class="btn btn-primary btn-icon-split btn-sm float-right">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Add New User</span>
                            </a></h6>
                         </div>
                        </div>
                        <div class="card-body">
                                <form class="card-body" action="/users" method="GET" role="search">
                                    {{ csrf_field() }}
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search for..." name="q">
                                        <span class="input-group-btn">
                                    <button class="btn btn-secondary" type="submit">Go!</button>
                                  </span>
                                    </div>
                                </form>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable_info" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>S/n</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Permission</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($users->isNotEmpty())
                                        @forelse ($users as $user)
                                        <tr id="todo_{{$user->id}}">
                                            
   <th>{{ $user->id  }}</th>
  <th>{{ $user->name  }}</th>
     <th>{{ $user->email }}</th>
   
    <th>
     @if($user->is_admin == 1)
    <a href="#" class="btn btn-danger btn-sm btn-icon-split"><span class="text-white-50">
 </span> <span class="text">Admin</span> </a> 
 @else <a href="#" class="btn btn-primary btn-sm btn-icon-split"> <span class="text-white-50">
  </span><span class="text">Cashier/User</span></a>  
  @endif </th>
  
  @if(Auth::user()->id   != $user->id) 
      <th>
    @if($user->is_admin == '1')
     <a  href="{{route('users.notmake_admin', ['id' =>$user->id])}}" class="btn btn-sm btn-success btn-icon-split">
     <span class="text">Remove admin </span></a>
     @else <a  href="{{route('users.make_admin', ['id' =>$user->id])}}" class="btn btn-sm  btn-warning btn-icon-split">
    <span class="text">Not admin</span> </a>
     @endif</th>
    @else<th></th> @endif


<th>
@if(Auth::user()->id   != $user->id) 
<a href="javascript:void(0);" onclick="deleteTodo({{ $user->id }})" class="btn btn-sm btn-danger">
<span class="icon text-white-50"><i class="fas fa-trash"></i></span>
</a>
@else
@endif

</th>

</tr> 
                                        @empty
                                        <p>No users</p>
                                    @endforelse
                                    @else 
                                        <th>
                                            <h2>No User found</h2>
                                        </th>
                                    @endif
                                    </tbody>
                                </table>	
                          
                       @include('users.create')
                     </div>
                     {!! $users->links() !!}
                    </div>
                    @endsection
                    @section('javascript')y
                    <script  src="{{asset('js/userhandler.js')}}">
                    </script>
                    @endsection

