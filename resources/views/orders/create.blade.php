
@extends('layouts.main')
@section('stylesheet')
<link href="{{asset('css/invoice.css')}}">
<script src="{{asset('js/poppercart.min.js')}}"></script>
<script src="{{asset('js/jquerycart.min.js')}}"></script>

<style>
    .thumbnail {
      position: relative;
      padding: 0px;
      margin-bottom: 20px;
  }
  .thumbnail img {
      width: 80%;
  }
  .thumbnail .caption{
      margin: 7px;
  }
  .main-section{
      background-color: #F8F8F8;
  }
  .dropdown{
      float:right;
      padding-right: 30px;
  }
  .btn{
      border:0px;
      margin:10px 0px;
      box-shadow:none !important;
  }
  .dropdown .dropdown-menu{
      padding:20px;
      top:30px !important;
      width:350px !important;
      left:-110px !important;
      box-shadow:0px 5px 30px black;
  }
  .total-header-section{
      border-bottom:1px solid #d2d2d2;
  }
  .total-section p{
      margin-bottom:20px;
  }
  .cart-detail{
      padding:15px 0px;
  }
  .cart-detail-img img{
      width:100%;
      height:100%;
      padding-left:15px;
  }
  .cart-detail-product p{
      margin:0px;
      color:#000;
      font-weight:500;
  }
  .cart-detail .price{
      font-size:12px;
      margin-right:10px;
      font-weight:500;
  }
  .cart-detail .count{
      color:#C2C2DC;
  }
  .checkout{
      border-top:1px solid #d2d2d2;
      padding-top: 15px;
  }
  .checkout .btn-primary{
      border-radius:50px;
      height:50px;
  }
  .dropdown-menu:before{
      content: " ";
      position:absolute;
      top:-20px;
      right:50px;
      border:10px solid transparent;
      border-bottom-color:#fff;
  }
  </style>
<link  ref="{{asset('css/cartview.css')}}" >
<script src="{{asset('datatable/jquery-3.5.1.js')}}"></script>
@endsection
@section('content')
<div class="container-fluid">
     @include('orders.companyshow')
     <div class="row">
        <div style="margin-left:25px" class="col-8 text-left">
          <a  data-target="#addModal" data-toggle="modal" class="btn btn-primary btn-md float-left">Add New Customer</a>
          <button onclick="submitButtonClick(event)"  style="margin-left:20px;" data-target="#addProductModal" data-toggle="modal" class="btn btn-success btn-md float-left">Add New Item</button>
          <a  onclick="submitButtonClick(event)" href="{{route('orders.history')}}" style="margin-left:20px;"  class="btn btn-secondary btn-md">Transaction History</a>   
        </div>
        @include('orders.customermodal')
        @include('orders.productmodal')
     </div>

  <div class="row">
    <div class="col-lg-12 col-sm-12 col-12 main-section">
        <div class="dropdown">
            <button type="button" class="btn btn-info" data-toggle="dropdown">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
              </button>
@include('orders.cartview')


<div  style="margin-top:35px;"  class="container">
  <div class="row">
  <div class="container-fluid" style="background-color:lavender;">
  <div class="card-body">
  <div class=""><input type="text"  onkeyPress="submitButtonClick(event)"  keyDown="submitButtonClick(event)"  onkeyUp="submitButtonClick(event)" class="form-control input-lg" id="search" class="form-group" placeholder="Search Item Here" /></div>
  <div class="" style="margin-top: 10px;">
                        <table id="table1" class="table table-striped table-bordered">
                       <thead>
                        <tr>
                            <th>Item</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Descriptn</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
      
                      </tr>
                    </tbody>
                  </table>
                      </div>               
                  </div>
                </div>
            </div>
  </div>
</div>
@include('orders.searchscript')
@endsection
@section('javascript')
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript">$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });</script>
  <script src="{{asset('js/1.12.0-jquery.min.js')}}"></script>
  <script src="{{asset('js/app.js')}}"></script>
@endsection


