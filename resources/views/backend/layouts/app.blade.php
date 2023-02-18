<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ env('APP_NAME','Master-starter') }} | @yield('title','Administration')</title>

  
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome 6.2.1 Icons -->
    <link rel="stylesheet" href="{{asset('assets/backend/fontawesome/css/all.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/backend/dist/css/adminlte.css')}}">
    <!-- Font Awesome 6.2.1 Icons -->
    <link rel="stylesheet" href="{{asset('assets/backend/fontawesome/css/all.css')}}">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @notifyCss

    @stack('header-css')
</head>
<body class="hold-transition sidebar-mini">
    <!-- wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        @include('backend.includes.header')
        <!-- Main Sidebar Container -->
        @include('backend.includes.sidebar')
                <!--content-wrapper -->
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        @yield('breadcrumbs')
                        
                    </div>
                    <!-- /.content-header -->
                    <!--content -->
                    <section class="content">
                        <!-- container-fluid -->
                        <div class="container-fluid">
                            <!--Flash-Messages-->
                             @include('backend.includes.messages') 
                             <!-- Main content -->
                             @yield('content')
                             
                        </div>
                    </section>
                </div>

        <!-- Main Footer -->
        @include('backend.includes.footer')
    </div>
<!-- ./wrapper -->




<!-- AdminLTE-3.2-Start-->
<script src="{{asset('assets/backend/plugins/jquery/jquery.min.js')}}"></script>  <!-- jQuery --> 
<script src="{{asset('assets/backend/plugins/jquery-ui/jquery-ui.min.js')}}"></script> <!-- jQuery UI 1.11.4 -->

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
    
<script src="{{asset('assets/backend/plugins/bootstrap/js/bootstrap.js')}}"></script> <!-- Bootstrap 4 -->
<script src="{{asset('assets/backend/dist/js/adminlte.js')}}"></script> <!-- AdminLTE App -->
<script src="{{asset('assets/backend/fontawesome/js/all.js')}}"></script> <!-- FontAwesome 6.2.1 --> 
<!-- AdminLTE-3.2-End-->
@stack('scripts')

</body>
</html>
