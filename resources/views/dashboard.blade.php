@extends('layouts.main')
@section('stylesheet')
<script src="{{asset('datatable/jquery-3.5.1.js')}}"></script>
@endsection
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <label class="d-none d-sm-inline-block">
                <i class="fas fa-user fa-sm text-white-50"></i><strong>Dashboard--></strong>{{Auth()->user()->name}}</a>
        </h1>
    </div>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Customers</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                               # {{ \App\Models\Customer::all()->count() }}
                            </div>
                        </div>
                        <div class="col-auto">
                      <i class="fa fa-cart-plus fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Earnings (Total)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ \App\Models\Transaction::get()->sum('trantotal') }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-money-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">USERS
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                   {{ \App\Models\User::all()->count() }}
                                    </div>
                                </div>
                             
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-plus fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                EXPENSES</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ \App\Models\Stock::get()->sum('stock_price') }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-bank fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



<div class="row">
    <div class="col-12">
            <div class="card shadow mb-4">
             <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Sales</h6>
                </div>
               <div class="card-body">
                <div style="width: 80%;margin: 0 auto;">
                    {!! $chart->container() !!}
                </div>
                <script src="{{asset('js/chart1.js')}}"></script>
                {!! $chart->script() !!}
                </div>
            </div>
        </div>
</div>


    <div class="row">
        <div class="col-xl-5 col-lg-5">
                 <div class="card shadow mb-4">
                  <div
                         class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                         <h6 class="m-0 font-weight-bold text-primary">Last Week Services 
                        </h6>
                     </div>
                    <div style="height: 440px" class="card-body">
                        <div style="width: 100%;margin: 0 auto;">
                            {!! $chartpie->container() !!}
                        </div>
                        {!! $chartpie->script() !!}
                    </div>
                 </div>
             </div>
         <div class="col-xl-7 col-lg-8">
                 <div class="card shadow mb-4">
                   <div
                         class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                         <h6 class="m-0 font-weight-bold text-primary">Expenses</h6>
                     </div>
                    <div class="card-body">
                        <div style="width: 80%;margin: 0 auto;">
                            {!! $expensesline->container() !!}
                        </div>
                        {!! $expensesline->script() !!}
             </div>
         </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                    <div class="card shadow mb-4">
                     <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Sales</h6>
                        </div>
                       <div class="card-body">
                        <div style="width: 100%;margin: 0 auto;">
                            {!! $salesline->container() !!}
                        </div>
                        {!! $salesline->script() !!}
                        </div>
                    </div>
                </div>
        </div>
        
    </div>
    @endsection
@section('javascript')
    <script src="{{asset('js/highcharts.js')}}"></script>
    <script src="{{asset('js/jquery-3.3.1.slim.min.js')}}"></script>
    <script src="{{asset('popper.min.js')}}"></script>
    <script src="{{asset('js/chart.js')}}"></script>
    @jquery
@endsection

