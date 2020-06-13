@extends('login-layout')


@section('head')

    <title>Registrar Abogado</title>


@endSection

@section('content')
    <!-- WRAPPER -->
    <div id="wrapper">
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle">
                <div class="auth-box lockscreen clearfix">
                    <div class="content">
                        <div class="logo text-center"><img src="{!! asset('img/logo-dark.png') !!}" alt="Klorofil Logo">
                        </div>
                        <div class="user text-center">
                            <img src="{!! asset('img/img_abogado.png') !!}" width="70" height="70" class="img-circle"
                                 alt="Avatar">
                            <h2 class="name">Bienvenidos al Módulo de Solicitud de Registro de Usuario Electrónico -
                                <b>Abogado.</b></h2>
                        </div>


                        {!! Form::open(['url' => 'abogado']) !!}
                        {!! Form::token() !!}
                        <div action="#">

                            <div class="form-group">
                                <label for="txt_username">Usuario :</label>
                                <input type="text" class="form-control" id="txt_clave" name="txt_username">
                            </div>

                            <div class="form-group">
                                <label for="txt_clave">Clave :</label>
                                <input type="password" class="form-control" id="txt_username" name="txt_clave">
                            </div>

                            <div class="form-group">
                                <label for="sel_tipoPersona">Tipo Persona :</label>
                                <select class="form-control" name="sel_tipoPersona" id="sel_tipoPersona">
                                    <option value="0">---- Seleccione ----</option>
                                    @foreach($TipoPersona as $tp)

                                        <option value="{{$tp->c_tipo_persona}}">{{$tp->x_desc_tipo_persona}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="sel_colegioAbogado">Colegio de Abogado :</label>
                                <select class="form-control" name="sel_colegioAbogado" id="sel_colegioAbogado">
                                    <option value="0">---- Seleccione ----</option>
                                    @foreach($colegios as $itemColegio)
                                        <option value="{{$itemColegio->c_colegio}}">{{$itemColegio->x_desc_colegio}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="txt_nroColegiatura">N° Colegiatura</label>
                                <input type="text" class="form-control" name="txt_nroColegiatura"
                                       id="txt_nroColegiatura">
                            </div>

                            <div class="form-group">
                                <label for="sel_tipoDocumento">Tipo Documento :</label>
                                <select class="form-control" name="sel_tipoDocumento" id="sel_tipoDocumento">
                                    <option value="0">---- Seleccione ----</option>
                                    @foreach($tipoDocumentos as $itemtipoDoc)
                                        <option value="{{$itemtipoDoc->c_tipo_doc}}">{{$itemtipoDoc->x_tipo_doc}}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="txt_nroDocumento">Numero de documento</label>
                                <input type="text" class="form-control" name="txt_nroDocumento" id="txt_nroDocumento">
                            </div>

                            <div class="form-group">
                                <label>Nombres:</label>
                                <input type="text" class="form-control" name="txt_nombres" id="</label>">
                            </div>

                            <div class="form-group">
                                <label for="txt_apePaterno">Apellido Paterno</label>
                                <input type="text" class="form-control" name="txt_apePaterno" id="txt_apePaterno">
                            </div>

                            <div class="form-group">
                                <label for="txt_apeMaterno">Apellido Materno</label>
                                <input type="text" class="form-control" name="txt_apeMaterno" id="txt_apeMaterno">
                            </div>

                            <div class="form-group">
                                <label for="txt_fNacimiento">Fecha Nacimiento</label>
                                <input type="date" class="datepicker form-control" name="txt_fNacimiento"
                                       id="txt_fNacimiento">
                            </div>


                            <div class="form-group">
                                <label>Telefono/ Celular </label>
                                <input type="text" class="form-control" name="txt_NroTelefono" id="txtNroTelefono">
                            </div>

                            <div class="form-group">
                                <label>Correo</label>
                                <input type="email" class="form-control" name="txt_correo" id="txt_correo">
                            </div>

                            <div class="form-group">
                                <label>SINOE</label>
                                <input type="text" class="form-control" name="txt_sinoe" id="txt_sinoe">
                            </div>


                            <div class="form-group" style="text-align: center;">
                                <label class="fancy-checkbox">
                                    <input type="checkbox">
                                    <span>Acepto los términos y condiciones del servicio.</span>
                                    <a href="#" style="color: red;">Ver los términos y condiciones</a>
                                </label>
                            </div>
                            <br><br>
                            <div style=" float: right;">
                                <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
                                <button type="button" class="btn btn-primary btn-sm">Cancelar</button>
                            </div>


                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END WRAPPER -->

@endsection

