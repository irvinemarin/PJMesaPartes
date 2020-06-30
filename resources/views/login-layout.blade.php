<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link href="{!! asset('vendor/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet"/>
    <link href="{!! asset('vendor/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet"/>

    @yield('head')

    <link href="{!! asset('css/main.css') !!}" rel="stylesheet"/>
    <link href="{!! asset('css/demo.css') !!}" rel="stylesheet"/>


    <link href="{!! asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700') !!}"
          rel="text/css"/>
    <link href="{!! asset('img/iconPj.png') !!}" rel="shortcut icon" type="image/png"/>

</head>

<body style="background-image: url({!! asset('img/img-body.jpg') !!})">
<!-- WRAPPER -->
@yield('content')
<!-- END WRAPPER -->


<script src="{!! asset('vendor/jquery/jquery.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('vendor/bootstrap/js/bootstrap.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('vendor/jquery-slimscroll/jquery.slimscroll.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('vendor/chartist/js/chartist.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('scripts/klorofil-common.js') !!}" type="text/javascript"></script>



@yield('extra_js')
</body>

</html>
