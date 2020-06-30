<!doctype html>
<html lang="es">

<head>

    @yield("head")

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link href="{!! asset('vendor/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet"/>
    <link href="{!! asset('vendor/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet"/>
    <link href="{!! asset('vendor/linearicons/style.css') !!}" rel="stylesheet"/>
    <link href="{!! asset('vendor/chartist/css/chartist-custom.css') !!}" rel="stylesheet"/>
    <link href="{!! asset('vendor/alertify/css/alertify.min.css') !!}" rel="stylesheet"/>
    <link href="{!! asset('css/main.css') !!}" rel="stylesheet"/>
    <link href="{!! asset('css/demo.css') !!}" rel="stylesheet"/>


    <link href="{!! asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700') !!}"
          rel="text/css"/>
    <link href="{!! asset('img/iconPj.png') !!}" rel="shortcut icon" type="image/png"/>

</head>

<body style="background-image: url({!! asset('img/img-body.jpg') !!})">
<!-- WRAPPER -->
<div id="wrapper">
    <!-- NAVBAR -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="brand">
            <a href="index.html"><img src="{!! asset('img/logo-dark.png') !!}" alt="Klorofil Logo"
                                      class="img-responsive logo"></a>
        </div>
        <div class="container-fluid">
            <div class="navbar-btn">
                <button type="button" class="btn-toggle-fullwidth"><i
                            class="lnr lnr-arrow-left-circle"></i></button>
            </div>
            <div class="navbar-text">
                <H4 href="#" class="center" data-toggle="">
                    MESA DE PARTES WEB DEL PODER JUDICIAL DEL PERU</H4>
            </div>
            <div id="navbar-menu">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{!! asset('img/user0.png') !!}" class="img-circle" alt="Avatar">
                            <span>{{Session::get("username")}}</span>
                            <i class="icon-submenu lnr lnr-chevron-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{url('/out')}}">
                                    <i class="lnr lnr-exit"></i>
                                    <span>Logout</span>
                                </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END NAVBAR -->
    <!-- LEFT SIDEBAR -->
    <div id="sidebar-nav" class="sidebar">
        <div class="sidebar-scroll">
            <nav>
                <ul class="nav" id="list_menu">
                    @yield("menu_list")

                </ul>
            </nav>
        </div>
    </div>
    <!-- END LEFT SIDEBAR -->
    <!-- MAIN -->
    <div class="main">
        @yield('content')
    </div>
    <div class="clearfix"></div>
    <footer>
        <div class="container-fluid">
            <p class="copyright">
                Av. Paseo de la República S/N Palacio de Justicia, Cercado, Lima -
                <i class="fa fa-love"></i><a>Innovación Judicial. </a>
            </p>
        </div>
    </footer>
</div>
<!-- END WRAPPER -->
<!-- Javascript
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="assets/scripts/common.js"></script>
-->
<!-- END WRAPPER -->


<script src="{!! asset('vendor/jquery/jquery.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('vendor/bootstrap/js/bootstrap.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('vendor/jquery-slimscroll/jquery.slimscroll.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('vendor/alertify/alertify.min.js') !!}" type="text/javascript"></script>


<script src="{!! asset('vendor/chartist/js/chartist.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('scripts/klorofil-common.js') !!}" type="text/javascript"></script>
<script src="{!! asset('scripts/myscript.js') !!}" type="text/javascript"></script>

@yield("script_adicional")
</body>

</html>
