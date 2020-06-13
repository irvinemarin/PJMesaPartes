@extends('login-layout')

@section('head')
    <title>LOGIN</title>
    <link href="{!! asset('vendor/linearicons/style.css') !!}" rel="stylesheet"/>
    <link href="{!! asset('vendor/chartist/css/chartist-custom.css') !!}" rel="stylesheet"/>
@endsection

@section('content')
    <div id="wrapper">
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle">
                <div class="auth-box ">
                    <div class="left">
                        <div class="content">
                            <div class="header">
                                <div class="logo text-center"><img src="{!! asset('img/logo-dark.png') !!}"
                                                                   alt="Klorofil Logo">
                                </div>
                                <p class="lead">Ingrese a su cuenta</p>



                            </div>


                            {!! Form::open(['url' => 'validate']) !!}
                            {!! Form::token() !!}

                            <div class="form-auth-small">
                                <div class="form-group">
                                    <label for="signin-email" class="control-label sr-only">Email</label>
                                    <input type="text" class="form-control" name="txt_username" id="signin-email"
                                           placeholder="Usuario">
                                </div>
                                <div class="form-group">
                                    <label for="signin-password" class="control-label sr-only">Password</label>
                                    <input type="password" class="form-control" name="txt_clave" id="signin-password"
                                           placeholder="clave">
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Inicar Sesion</button>
                                <div class="bottom">
                                <span class="helper-text"><i class="fa fa-exclamation-circle"></i> <a
                                            href="{{url('abogado/create')}}">Solicitar Registro de Usuario</a></span>
                                </div>
                            </div>
                            {!!  Form::close() !!}

                        </div>
                    </div>
                    <div class="right" style="background-image: url({!! asset('img/login-bg.jpg')!!})">
                        <div class="overlay"></div>
                        <div class="content text">
                            <h1 class="heading">Sistema de Mesa de Partes Web</h1>
                            <p>Salas Supremas Penales - Corte Suprema</p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
