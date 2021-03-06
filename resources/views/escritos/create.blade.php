@extends("layout")


@section('head')
    <title>Registrar Documentos</title>
@endSection()

@section('menu_list')

    <li>
        <a href="{{url('expediente/index')}}" class="li_menu_item"><i class="lnr lnr-cloud-upload"></i>
            <span>Gestor de Documentos</span></a>
    </li>
    <li>
        <a href="{{url('expediente/registrar')}}" class="li_menu_item"><i class="lnr lnr-cloud-upload"></i>
            <span>Registrar Expediente</span></a>
    </li>

    <li>
        <a href="{{url('escritos/registrar')}}" class="active li_menu_item"><i class="lnr lnr-cloud-upload"></i>
            <span>Escritos</span></a>
    </li>
@endSection()


@section("content")
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <h3 class="page-title">Registrando Documentos:</h3>


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


                        {!! Form::open(['url' => 'escritos/store']) !!}
                        {!! Form::token() !!}

                        <div id="divRegistroExpediente">
                            <h4 class="page-title">Escritos :</h4>
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


                                {{--                                <div class="form-group">--}}
                                {{--                                    <label for="file_pdf">Seleccione Pdf</label>--}}
                                {{--                                    <input type="file" class="form-control-file" accept="application/pdf"--}}
                                {{--                                           name="file_pdf" id="file_pdf">--}}
                                {{--                                </div>--}}


                                <div class="col-md-6 col-lg-12 form-group">
                                    <label>Nro Hojas</label>
                                    <input type="number" class="form-control" name="txt_nroHojas" id="txt_nroHojas">
                                </div>


                                <div class="form-group">
                                    <label for="sel_acto">Acto Procesal :</label>
                                    <select class="form-control" name="sel_actoProcesal" id="sel_actoProcesal">
                                        <option value="0">---- Seleccione ----</option>
                                        {{--                                        @foreach($ActoProcesalList as $apl)--}}
                                        {{--                                            <option value="{{$apl->c_acto_procesal}}">{{$apl->x_documento}}</option>--}}
                                        {{--                                        @endforeach--}}
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="sel_acto">Instancia :</label>
                                    <select class="form-control" name="sel_actoProcesal" id="sel_actoProcesal">
                                        <option value="0">---- Seleccione ----</option>
                                        @foreach($InstanciaList as $ins)
                                            <option value="{{$ins->c_instancia}}">{{$ins->x_nom_instancia}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="sel_acto">Abogado :</label>
                                    <select class="form-control" name="sel_actoProcesal" id="sel_actoProcesal">
                                        <option value="0">---- Seleccione ----</option>
                                        @foreach($AbogadoList as $abgl)
                                            <option value="{{$abgl->n_abogado}}">{{$abgl->x_ape_paterno." ".$abgl->x_ape_materno.", ".$abgl->x_nombres}}</option>
                                        @endforeach
                                    </select>
                                </div>


                            </div>
                        </div>
                        {!! Form::close() !!}


                        {{--                        <a href="{{ Storage::url('public/img/file_01.pdf') }}" class="btn  btn-primary "--}}
                        {{--                           target="_blank">VER DOCUMENTO--}}
                        {{--                            <i class="fas fa-download"></i>--}}
                        {{--                        </a>--}}

                    </div>
                </div>
            </div>
        </div>
    </div>


@endSection()




