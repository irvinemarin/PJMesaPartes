@extends("layout")


@section('head')
    <title>Expedientes</title>

@endsection

@section('menu_list')

    <li>
        <a href="#" class="active li_menu_item"><i class="lnr lnr-cloud-upload"></i>
            <span>Gestor de Documentos</span></a>
    </li>
    {{--    <li>--}}
    {{--        <a href="#" class="li_menu_item"><i class="lnr lnr-cloud-upload"></i>--}}
    {{--            <span>Registrar Expediente</span></a>--}}
    {{--    </li>--}}
@endSection

@section("content")

    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Gestión de Documentos:</h3>
            <div class="col-md-12" style="margin-bottom: 20px;">
                <a href="{{url('expediente/create')}}" class="btn btn-default"><i class="fa fa-plus-square"></i>
                    Registrar
                    Documentos
                </a>
            </div>

            <div class="col-md-12">
                <!-- BORDERED TABLE -->
                <div class="panel">
                    {{--                    <div class="panel-heading">--}}
                    {{--                        <div style="padding: 5px; height: auto;">--}}
                    {{--                            --}}{{--                            <div class="col-md-6">--}}
                    {{--                            --}}{{--                                <label>Seleccione Año:</label>--}}
                    {{--                            --}}{{--                                <select class="form-control" id="exampleFormControlSelect1">--}}
                    {{--                            --}}{{--                                    <option value="0">---- Seleccione ----</option>--}}
                    {{--                            --}}{{--                                    <option value="2020">2020</option>--}}
                    {{--                            --}}{{--                                    <option value="2019">2019</option>--}}
                    {{--                            --}}{{--                                </select>--}}
                    {{--                            --}}{{--                            </div>--}}
                    {{--                            --}}{{--                            <div class="col-md-6">--}}
                    {{--                            --}}{{--                                <label>Seleccione Mes:</label>--}}
                    {{--                            --}}{{--                                <select class="form-control" id="exampleFormControlSelect1">--}}
                    {{--                            --}}{{--                                    <option value="0">---- Seleccione ----</option>--}}
                    {{--                            --}}{{--                                    <option value="ENERO">ENERO</option>--}}
                    {{--                            --}}{{--                                    <option value="FEBRERO">FEBRERO</option>--}}
                    {{--                            --}}{{--                                    <option value="MARZO">MARZO</option>--}}
                    {{--                            --}}{{--                                    <option value="ABRIL">ABRIL</option>--}}
                    {{--                            --}}{{--                                    <option value="MAYO">MAYO</option>--}}
                    {{--                            --}}{{--                                    <option value="JUNIO">JUNIO</option>--}}
                    {{--                            --}}{{--                                    <option value="JULIO">JULIO</option>--}}
                    {{--                            --}}{{--                                    <option value="AGOSTO">AGOSTO</option>--}}
                    {{--                            --}}{{--                                    <option value="SETIEMBRE">SETIEMBRE</option>--}}
                    {{--                            --}}{{--                                    <option value="OCTUBRE">OCTUBRE</option>--}}
                    {{--                            --}}{{--                                    <option value="NOVIEMBRE">NOVIEMBRE</option>--}}
                    {{--                            --}}{{--                                    <option value="DICIEMBRE">DICIEMBRE</option>--}}
                    {{--                            --}}{{--                                </select>--}}
                    {{--                            --}}{{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                    <br><br>--}}
                    <div class="panel-body">


                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">MOTIVO / EXPEDIENTE</th>
                                <th scope="col">FECHA REGISTRO</th>
                                <th scope="col">ACTO PROCESAL</th>
                                <th scope="col">DOCUMENTO</th>
                                <th scope="col">OPC.</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php( $count=0)
                            @foreach($EscritosWeb as $itemEscrito)

                                <tr>
                                    <td>
                                        @php( $count++)
                                        {{$count}}

                                    </td>
                                    <td>
                                        {{ $itemEscrito->x_desc_motivo_ingreso." ".$itemEscrito->n_exp_sala." ".$itemEscrito->n_ano_sala }}
                                        <br>
                                        {{ $itemEscrito->x_formato }}
                                    </td>
                                    <td>{{$itemEscrito->f_ingresoDocumento}}</td>
                                    <td>{{$itemEscrito->x_documento}}</td>
                                    <td style="text-align: center;">
                                        <img class="img-pdf"
                                             src="{{url('img/ico-pdf.png')  }}"
                                             width="40" height="40"/><br>
                                        <a href="{{ url("/pdf/".$itemEscrito->x_nombre_archivo) }}"
                                           target="_blank">VER DOCUMENTO PRINCIPAL</a>
                                    </td>
                                    <td>
                                        {{--                                        <button type="button" class="btn btn-danger btn-sm">Firmar</button>--}}
                                        {{--                                        <button type="button" class="btn btn-info btn-sm">Ver</button>--}}
                                        {{--                                        <button type="button" class="btn btn-warning btn-sm">Editar</button>--}}
                                    </td>
                                </tr>
                            @endforeach
                            {{--                            <tr>--}}
                            {{--                                <td>2</td>--}}
                            {{--                                <td>Simon</td>--}}
                            {{--                                <td>26/05/2020</td>--}}
                            {{--                                <td style="text-align: center;">--}}
                            {{--                                    <img class="img-pdf"--}}
                            {{--                                         src="{{url('img/ico-pdf.png')  }}" width="40"--}}
                            {{--                                         height="40"/><br>--}}
                            {{--                                    <a href="#">ver</a>--}}
                            {{--                                </td>--}}
                            {{--                                <td>--}}
                            {{--                                    <button type="button" class="btn btn-danger btn-sm">Firmar</button>--}}
                            {{--                                    <button type="button" class="btn btn-info btn-sm">Ver</button>--}}
                            {{--                                    <button type="button" class="btn btn-warning btn-sm">Editar</button>--}}
                            {{--                                </td>--}}
                            {{--                            </tr>--}}
                            {{--                            <tr>--}}
                            {{--                                <td>3</td>--}}
                            {{--                                <td>Jane</td>--}}
                            {{--                                <td>27/05/2020</td>--}}
                            {{--                                <td style="text-align: center;">--}}
                            {{--                                    <img class="img-pdf"--}}
                            {{--                                         src="{{url('img/ico-pdf.png')  }}"--}}
                            {{--                                         width="40"--}}
                            {{--                                         height="40"/><br>--}}
                            {{--                                    <a href="#">ver</a>--}}
                            {{--                                </td>--}}
                            {{--                                <td>--}}
                            {{--                                    <span style="color:#841D19">El documento se encuentra procesado!!</span>--}}
                            {{--                                </td>--}}
                            {{--                            </tr>--}}
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END BORDERED TABLE -->
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->

    <!-- END MAIN -->

@endSection()
