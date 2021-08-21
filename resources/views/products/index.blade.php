
@extends('layouts.main')
@section('stylesheet')
<script src="{{asset('datatable/jquery-3.5.1.js')}}"></script>
@endsection
@section('content')
 <div class="container-fluid">  
<div class="container-fluid" style="margin-bottom:4rem;">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                  Services
                  </h6>
                 </div>
                </div>   
  <div class="row">
    <div class="col">
     <div class="card">
  <div class="card-header">
    <strong >Add Services</strong>
  </div>
  <div class="card-body">

<form action="{{route('services.store')}}" method="post">
 @csrf
    <div class="form-group row">
        <label class="col-sm-4 col-form-label">Service Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="service_name">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-4 offset-sm-2">
            <button type="submit" class="btn btn-sm btn-primary">Save Service</button>
        </div>
    </div>
</form>

  </div>
</div>
    </div>
    <div class="col">
    <div class="card">
  <div class="card-header">
   <b>Services Available</b>
  </div>
  <div class="card-body">
 <table  class="table table-striped table-bordered">
  <thead class="thead-dark">
    <tr>
      <th >#</th>
      <th >Service Name</th>
      <th >Delete</th>
    </tr>
  </thead>
  
  @foreach($service as $services)
    <tr>
      <th>{{$services->id}}</th>
      <td> {{$services->service_name}}</td>
      <td><a href="{{ route('services.destroy', $services->id)}}" class="btn-danger btn-sm btn-circle"> <i class="fas fa-trash"></i></a></td>
    </tr>
    @endforeach
  
</table>
  </div>
</div>
    </div>
  </div>
</div>
            <div class="col-xl-6">
                    <div id="result"></div>
                </div>
            <div class="card shadow mb-4">
                <div class="card-header ">
                    <h6 class="m-0 font-weight-bold text-primary">Item
                    <a id="create-new-post" onclick="addPost()" href="javascript:void(0)"  class="btn btn-primary btn-icon-split btn-sm float-right">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Add New Item</span>
                    </a>
                  </h6>
                 </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form class="card-body" action="/products" method="GET" role="search">
                            {{ csrf_field() }}
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for..." name="q">
                                <span class="input-group-btn">
                            <button class="btn btn-secondary" type="submit">Go!</button>
                          </span>
                            </div>
                        </form>
                

            <table id="laravel_crud" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Services</th>
                        <th>quantity</th>
                        <th>price</th>
                        <th>Edit</th>
                        <th>Delete</th>
                       
                    </tr>
                </thead>
                <tbody>
                  @if($posts->isNotEmpty())
                    @foreach($posts as $post)
                    <tr id="row_{{$post->id}}">
                       <td>{{ $post->id  }}</td>
                       <td>{{ $post->name }}</td>
                       <td>{{ $post->description }}</td>
                       <td>{{ $post->brand}}</td>
                       <td>{{ $post->quantity }}</td>
                       <td>{{ $post->price }}</td>
 <td><a href="javascript:void(0)" data-id="{{ $post->id }}" onclick="editPost(event.target)" class="btn btn-sm btn-info">Edit</a></td>
<td><a href="javascript:void(0)" data-id="{{ $post->id }}" class="btn btn-sm btn-danger" onclick="deletePost(event.target)">Delete</a></td>
</tr>
@endforeach
@else 
<tr>
  <td colspan="8">No Item Data</td>
</tr>
                @endif
                </tbody>
              </table>
               @include('products.modal')
                    </div>
               {!! $posts->links() !!}
                  </div>
                </div>
@endsection
@section('javascript')
<script  src="{{asset('js/producthandler.js')}}"> </script>
<script src="{{asset('js/app.js')}}"></script>
@endsection