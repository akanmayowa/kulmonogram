@extends('layouts.main')
@section('stylesheet')
<script src="{{asset('datatable/jquery-3.5.1.js')}}"></script>
@endsection
@section('content')
<div class="container-fluid">
                    <div class="card shadow">
                        <div class="card-header">
                            <h6 class="m-0 font-weight-bold text-primary">Customer 
                            <a  href="{{route('customers.create')}}" class="btn btn-primary btn-icon-split btn-sm float-right">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Add New Customer</span>
                            </a></h6>
                         </div>
                        </div>
                           <div class="card-body">
                            <div class="table-responsive">
                                <form class="card-body" action="{{route('customers.index')}}" method="GET" role="search">
                                    {{ csrf_field() }}
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search for..." name="q">
                                        <span class="input-group-btn">
                                    <button class="btn btn-secondary" type="submit">Go!</button>
                                  </span>
                                    </div>
                                </form>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Date-of-Birth</th>
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


                                        @if($customers->isNotEmpty())
           
                                        @foreach($customers as  $customer)
                                        @if ($customer->id == 1)
                                        @else
                                                <tr>
                                            <td>{{$customer->name}}</td>
                                            <td>{{$customer->phone}}</td>
                                            <td>{{$customer->address}}</td>
                                            <td>{{$customer->dob}}</td>
                                <td><a href="{{route('customers.edit', $customer->id)}}" class="btn btn-sm btn-info btn-circle"><i class="fas fa-edit"></i></a></td>
                                @if (auth()->check())
                                @if(auth()->user()->is_admin == 1)
                                <td>
                                <a href="{{route('customers.destroy', ['id'=>$customer->id])}}" class="btn btn-sm btn-danger btn-circle">
                                    <i class="fas fa-trash">
                                </i>
                                </a>
                                </td>
                                @else
                                @endif
                                @endif    
                                @endif
                                        </tr>   
                                    @endforeach 
                                    
                                    @else 

                                    <tr>
                                        <td colspan="6">
                                           No Customer Data
                                        </td>
                                    </tr>
                                    @endif
                                    
                                    </tbody>
                                </table>
                            </div>
                            {!! $customers->links() !!}
                        </div>
                     </div>
                     @endsection
                     @section('javascript')
          @endsection

