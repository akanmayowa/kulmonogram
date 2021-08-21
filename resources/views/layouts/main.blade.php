<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    @livewireStyles
    @yield('stylesheet')
</head>
<body id="page-top">
    <div id="wrapper">
@include('includes.navbar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('includes.header')
                 <div class="container-fluid">
                    <main class="py-4">
                        @include('includes.message')
                        @yield('content')
                    </main>
                </div>
            </div>
            @include('includes.footer')
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('js/toastr.min.js')}}"></script>
    @livewireScripts
    @yield('javascript')
</body>
</html>