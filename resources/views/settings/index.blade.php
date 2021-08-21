@extends('layouts.main')
@section('stylesheet')
<script src="{{asset('datatable/jquery-3.5.1.js')}}"></script>
@endsection
@section('content')
<div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Company</h1>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Company Info
                            <a  href="{{route('settings.create')}}" class="btn btn-primary btn-icon-split btn-sm float-right">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Add New comopany Info</span>
                            </a></h6>
                         </div>
                        </div>
                          <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                           <th>Address</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>			

                                           <tr> 
                                           <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
<td><a   class="btn btn-danger btn-circle"> <i class="fas fa-trash"></i></a></td>
                                        </tr> 
                                       <tr>

                                       <td>
                                        </td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                     </div>
                    </div>
</div>     
@endsection
@section('javascript')             
@endsection

