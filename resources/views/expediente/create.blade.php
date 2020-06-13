@extends("layout")


@section('head')
    <title>Registrar Expediente</title>
@endSection

@section('menu_list')

    <li>
        <a href="{{url('expediente/index')}}" class="li_menu_item"><i class="lnr lnr-cloud-upload"></i>
            <span>Gestor de Documentos</span></a>
    </li>
    <li>
        <a href="{{url('expediente/registrar')}}" class="active li_menu_item"><i class="lnr lnr-cloud-upload"></i>
            <span>Registrar Expediente</span></a>
    </li>
@endSection


@section("content")
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Registrando Expediente:</h3>


            <div class="col-md-12">

                <div class="panel">
                    <div class="panel-heading">
                        <div style="padding: 5px; height: auto;">
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="panel-body">
                        {!! Form::open(['url' => 'expediente/store']) !!}
                        {!! Form::token() !!}

                        <div id="divRegistroExpediente">
                            <h4 class="page-title">Expediente:</h4>
                            <div class="row">
                                <div class="col-md-6 col-lg-3 form-group">
                                    <label>Formato :</label>
                                    <input type="text" class="form-control" id="txt_Formato">
                                </div>
                                <div class="col-md-6 col-lg-3 form-group">
                                    <label>Fecha Programación</label>
                                    <input type="date" class="datepicker form-control" id="txt_FechaProgramacion">
                                </div>
                                <div class="col-md-6 col-lg-3 form-group">
                                    <label>Fecha permiso</label>
                                    <input type="date" class="datepicker form-control" id="txt_fechaPermiso">
                                </div>
                                <div class="col-md-6 col-lg-3 form-group">
                                    <label>Dias Permiso</label>
                                    <input type="number" class="form-control" id="txt_DiasPermiso">
                                </div>
                            </div>
                            {{--                            <div class="row">--}}


                            {{--                                <div style=" float: right;">--}}
                            {{--                                    <button type="submit" class="btn btn-primary btn-sm">Guardar</button>--}}
                            {{--                                    <button type="button" class="btn btn-primary btn-sm">Cancelar</button>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                        </div>
                        {!! Form::close() !!}

                        <div class="row">
                            <div class="col-md-12 mx-auto">
                                <h4 class="page-title">Parte Expediente:
                                    @include("expediente.modal.parte")
                                </h4>
                                <table class="table table-hover">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">First</th>
                                        <th scope="col">Last</th>
                                        <th scope="col">Handle</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

@endSection()
