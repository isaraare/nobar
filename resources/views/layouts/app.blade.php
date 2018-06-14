<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Nobar</title>
    {{ Html::style('plugin/bootstrap/dist/css/bootstrap.min.css') }}
    {{ Html::style('plugin/font-awesome/css/font-awesome.min.css') }}
    {{ Html::style('plugin/Ionicons/css/ionicons.min.css') }}
    {{ Html::style('css/AdminLTE.css') }}
    {{ Html::style('css/skins/_all-skins.min.css') }}
    {{-- <Table> --}}
    {{ Html::style('plugin/datatables.net-bs/css/dataTables.bootstrap.min.css') }}
    {{-- {{ Html::style('plugin/morris.js/morris.css') }}
    {{ Html::style('plugin/jvectormap/jquery-jvectormap.css') }}
    {{ Html::style('plugin/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}
    {{ Html::style('plugin/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}
    {{ Html::style('plugin/bootstrap-daterangepicker/daterangepicker.css') }}
    {{ Html::style('plugin/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }} --}}
    {{ Html::style('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic') }}
    {{ Html::style('plugin/iCheck/square/blue.css') }}
</head>
    @auth
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            @include('layouts.template.header')
            @include('layouts.template.aside')
            @yield('content')
            @include('layouts.template.footer')
        </div>
    @else
    <body class="hold-transition login-page">
            @yield('login')
    @endauth
   
    <!-- ./wrapper -->
    {{ Html::script('plugin/jquery/dist/jquery.min.js') }}
    {{ Html::script('plugin/jquery-ui/jquery-ui.min.js') }}
    {{ Html::script('plugin/bootstrap/dist/js/bootstrap.min.js') }}
    {{ Html::script('plugin/raphael/raphael.min.js') }}
    {{ Html::script('plugin/morris.js/morris.min.js') }}
    {{-- {{ Html::script('plugin/jquery-sparkline/dist/jquery.sparkline.min.js') }}
    {{ Html::script('plugin/jvectormap/jquery-jvectormap-1.2.2.min.js') }}
    {{ Html::script('plugin/jvectormap/jquery-jvectormap-world-mill-en.js') }} --}}
    {{ Html::script('plugin/jquery-knob/dist/jquery.knob.min.js') }}
    {{ Html::script('plugin/moment/min/moment.min.js') }} 
    {{-- {{ Html::script('plugin/bootstrap-daterangepicker/daterangepicker.js') }}
    {{ Html::script('plugin/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}
    {{ Html::script('plugin/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }} --}}
    {{ Html::script('plugin/jquery-slimscroll/jquery.slimscroll.min.js') }}
    {{ Html::script('plugin/fastclick/lib/fastclick.js') }}
    @stack('scripts')   
    {{-- <table> --}}
    {{ Html::script('plugin/datatables.net/js/jquery.dataTables.min.js') }}
    {{ Html::script('plugin/datatables.net-bs/js/dataTables.bootstrap.min.js') }}

    {{ Html::script('js/adminlte.min.js') }}
    {{-- {{ Html::script('js/pages/dashboard.js') }} --}}
    {{ Html::script('js/demo.js') }}
</body>
</html>
