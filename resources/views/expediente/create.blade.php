@extends("layout")


@section('head')

    <title>Registrar Expediente</title>
    <style>
        .file_custom {
            width: 0.1px;
            height: 0.1px;
            opacity: 2;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }


        .ui-autocomplete {
            position: absolute;
            z-index: 1051;
            cursor: default;
            padding: 0;
            margin-top: 2px;
            list-style: none;
            background-color: #ffffff;
            border: 1px solid #ccc;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        }

        .ui-autocomplete > li {
            padding: 3px 20px;
            width: 100% !important;
            border: 1px solid #000;

        }

        .ui-autocomplete > li.ui-state-focus {
            background-color: #DDD;
        }

        .ui-helper-hidden-accessible {
            display: none;
        }

        .panel {
            border: 1px solid #000 !important;
            border-radius: 5px !important;
            padding: 8px;
        }

        .alertify-notifier {
            font-weight: bold;
            color: #ffffff !important;
        }

    </style>
@endSection

@section('menu_list')

    <li>
        <a href="{{url('expediente/index')}}" class="li_menu_item active"><i class="lnr lnr-cloud-upload"></i>
            <span>Gestor de Documentos</span></a>
    </li>
    {{--    <li>--}}
    {{--        <a href="{{url('expediente/registrar')}}" class="active li_menu_item"><i class="lnr lnr-cloud-upload"></i>--}}
    {{--            <span>Registrar Expediente</span></a>--}}
    {{--    </li>--}}

@endSection


@section("content")
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="page-title">INGRESO DE NUEVO DOCUMENTO</h3>
                    </div>

                    <div class="panel-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="divtab" id="tab_01">
                                <div class="col-md-12 mx-auto">
                                    <h4 class="page-title">DATOS EXPEDIENTE:</h4>
                                    <div class="row">
                                        <div class="col-md-4 col-lg-4 form-group">
                                            <label for="txt_Recurso">RECURSO</label>
                                            <input type="text"
                                                   class="form-control autocomplete"
                                                   name="txtRecurso"
                                                   placeholder="CASACION XYZ WXYZ"
                                                   id="txt_Recurso"/>
                                        </div>
                                        <div class="col-md-4 col-lg-4 form-group">
                                            <label for="txt_Expediente">EXPEDIENTE :</label>
                                            <input type="text"
                                                   class="form-control autocomplete"
                                                   placeholder="000XX XYZ WXYZ"
                                                   id="txt_Expediente"/>
                                        </div>
                                        <div class="col-md-2 col-lg-4 ">

                                            <button id="btnSeleccionar" type="button" class="btn btn-success "
                                                    style="margin-top: 27px;">
                                                SELECCIONAR
                                            </button>


                                            <button ID=btnQuitarSeleccion type="button" class="btn btn-danger "
                                                    style="margin-top: 27px;">
                                                QUITAR SELECCION
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="divtab " id="tab_02">
                                <div class="panel col-md-12 mx-auto">
                                    <h4 class="page-title">DATOS PARTES INVOLUCRADAS QUE PRESENTA DOCUMENTO:
                                        <button id="btnBuscarParte" type="button" class="btn btn-primary "
                                        >RECARGAR LISTA PARTES
                                        </button>
                                    </h4>
                                    <table class="table table-hover">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">APELLIDOS Y NOMBRES</th>
                                            <th scope="col">TIPO DOCUMENTO</th>
                                            <th scope="col">NRO. DOCUMENTO</th>
                                            <th scope="col">TIPO PARTE</th>
                                            <th scope="col">OPCIONES</th>

                                        </tr>
                                        </thead>
                                        <tbody id="tbody_partes">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="divtab " id="tab_03">
                                <div class=" col-sm-12 mx-auto">
                                    <div class="row panel">


                                        <div class="col-md-12 mx-auto">
                                            <h4 class="page-title">DATOS DEL DOCUMENTO: </h4>

                                            <div class="row">
                                                <div class="col-md-4 col-lg-4 form-group">
                                                    <label for="sel_Documento">DOCUMENTO :</label>
                                                    <select class="form-control" name="sel_Documento"
                                                            id="sel_Documento">
                                                        <option value="0">---- Seleccione ----</option>
                                                        @foreach($ActoProcesal as $ActoItem)
                                                            <option value="{{$ActoItem->c_acto_procesal }}">
                                                                {{$ActoItem->x_documento}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>


                                                <div class="col-md-4 col-lg-4 form-group">
                                                    <label for="txt_Observacion">OBSERVACION :</label>
                                                    <textarea name="txt_Observacion" id="txt_Observacion"
                                                              class="form-control" rows="3"></textarea>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row panel ">

                                        <h4 class="page-title">Adjuntar Documentos: </h4>


                                        <div class="col-md-8 ">
                                            <table class="table table-hover">
                                                <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">NOMBRE DOCUMENTO</th>
                                                    <th scope="col">TAMAÑO</th>
                                                    <th scope="col">PAGINAS</th>
                                                    <th scope="col">TIPO</th>

                                                </tr>
                                                </thead>
                                                <tbody id="tbody_documentos">

                                                </tbody>
                                            </table>
                                        </div>


                                        <div class="col-md-4 ">
                                            <div class="row " id="">
                                                <div class="col-sm-12 " id="">
                                                    <span id="txt_nombreArchivo" style="top:0" class="">
                                                        No ha seleccionado Ningun Archivo</span>
                                                    <span id="txt_nroPaginas" class=""></span>
                                                    <button ID=btnSubirArchivo type="button"
                                                            class="btn btn-success">
                                                        ADJUNTAR
                                                    </button>

                                                    <div class="col-sm-12 " id="">
                                                        <label class="btn btn-primary " id="label_archivo"
                                                               for="archivo">Seleccionar
                                                            Archivo</label>
                                                        <input type="file"
                                                               class="file_custom right disabled "
                                                               name="archivo" id="archivo"
                                                               accept="application/pdf">
                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>


                        <br><br>
                        <br><br>
                        <div class="row center" id="">

                            <button id="btnRegistrarDocumento" type="button"
                                    class="btn btn-primary  ">
                                REGISTRAR
                            </button>

                            <button id=btnCancelarRegistro" type="button"
                                    class="btn btn-default  ">
                                CANCELAR
                            </button>


                        </div>
                    </div>


                </div>


            </div>
        </div>
    </div>


    </div>

@endSection()


@section("script_adicional")
    <script src=" {{url('//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.js')}}"></script>
    <script>

        function showMsj(mesage) {
            alertify.set('notifier', 'position', 'bottom-center');
            alertify.success(mesage);
        }

        function showMsjError(mesage) {
            alertify.set('notifier', 'position', 'bottom-center');
            alertify.error(mesage);
        }


        $("#btnBuscarParte").on("click", function () {

            buscarPartes();
        });


        $("#btnSeleccionarExpediente").on("click", function () {
            $("#modalExpedientes").modal("hide");
        });


        $("#txt_Expediente").autocomplete({
            minLength: 0,
            source: function (request, response) {
                var form_data = new FormData();
                form_data.append('_token', '{!! csrf_token() !!}');
                form_data.append('txtSearch', $("#txt_Expediente").val());
                $.ajax({
                    url: '/search',
                    type: 'POST',
                    dataType: 'JSON',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    success: function (resp, textStatus, jqXHR) {

                        console.table(resp)
                        response(resp);
                    }
                });


            },
            focus: function (event, ui) {
                $("#txt_Expediente").val(
                    ui.item.x_formato
                );
                return false;
            }

            ,
            select: function (event, ui) {
                $("#txt_Recurso").val(
                    ui.item.x_desc_motivo_ingreso + " " +
                    ui.item.n_exp_sala + " " +
                    ui.item.n_ano);
                n_unico = ui.item.n_unico;
                return false;
            }
        }).autocomplete("instance")._renderItem = function (ul, item) {
            var itemHtml = item.x_formato;
            return $("<li>").append(itemHtml).appendTo(ul);
        };


        $("#txt_Recurso").autocomplete({
            minLength: 0,
            source: function (request, response) {
                var form_data = new FormData();
                form_data.append('_token', '{!! csrf_token() !!}');
                form_data.append('txtSearch', $("#txt_Recurso").val());
                $.ajax({
                    url: '/search',
                    type: 'POST',
                    dataType: 'JSON',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    success: function (resp, textStatus, jqXHR) {

                        //console.table(resp)
                        response(resp);
                    }
                });


            },
            focus: function (event, ui) {
                $("#txt_Recurso").val(
                    ui.item.x_desc_motivo_ingreso + " " +
                    ui.item.n_exp_sala + " " +
                    ui.item.n_ano
                );


                return false;
            },
            select: function (event, ui) {
                $("#txt_Expediente").val(ui.item.x_formato);
                n_unico = ui.item.n_unico;
                n_secuencia = ui.item.n_secuencia;
                return false;
            }
        }).autocomplete("instance")._renderItem = function (ul, item) {
            var itemHtml = item.x_desc_motivo_ingreso + " " + item.n_exp_sala + " " + item.n_ano;
            return $("<li>").append(itemHtml).appendTo(ul);
        };
        var n_unico = 0;
        var n_secuencia = 0;

        // $("#txt_RecursoModal").autocomplete({
        //     source: listRecurso
        //
        // });


        $("#btnQuitarSeleccion").hide();
        $("#tab_02").hide();
        $("#tab_03").hide();


        $("#btnSeleccionar").on("click", function () {
            buscarPartes();

        });


        function buscarPartes() {
            partesList = [];
            errors = 0;
            validarImputs("#txt_Expediente");
            validarImputs("#txt_Recurso");


            if (errors == 0) {


                $("#btnQuitarSeleccion").show();
                $("#btnSeleccionar").hide();
                $("#btnSeleccionar").addClass('disabled');

                $("#txt_Expediente").attr('disabled', '');
                $("#txt_Recurso").attr('disabled', '');


                $("#tab_02").show();
                $("#tab_03").show();
                getListPartes();
            } else {
                showMsjError("Seleccione un Expediente")
            }
        }

        $("#btnQuitarSeleccion").on("click", function () {
            $("#tab_02").hide();
            $("#tab_03").hide();
            $("#btnQuitarSeleccion").hide();
            $("#btnSeleccionar").show();
            $("#btnSeleccionar").removeClass('disabled');


            $("#txt_Expediente").removeAttr('disabled');
            $("#txt_Recurso").removeAttr('disabled');


        });


        function getListPartes() {
            partesList = [];
            var form_data = new FormData();
            form_data.append('_token', '{!! csrf_token() !!}');
            form_data.append('n_unico', n_unico);

            $("#tbody_partes").empty();
            $.ajax({
                url: '/allPartes',
                type: 'POST',
                dataType: 'JSON',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                success: function (response, textStatus, jqXHR) {


                    var contPartes = 0;
                    for (var i in response) {
                        contPartes++;
                        var htmlItem = '';
                        htmlItem += '<tr id="tr_item_' + i + '">';
                        htmlItem += '   <th scope = "row" > ' + contPartes + ' </th>';

                        htmlItem += '   <td> ' +
                            response[i].x_ape_paterno + ' ' +
                            response[i].x_ape_materno + ' ' +
                            response[i].x_nombres + ' </td>';

                        htmlItem += '   <td> ' + response[i].x_abrevi + ' </td>';
                        htmlItem += '   <td> ' + response[i].x_doc_id + ' </td>';
                        htmlItem += '   <td> ' + response[i].x_desc_parte + ' </td>';
                        htmlItem += '   <td> ' +
                            '<button type="button" id="" data-index="' + i + '" class="btn btn-primary btn_deleteParte btn-xs" ' +
                            'data-idparte="' + response[i].x_doc_id + '"' +

                            '>' +
                            '<span class="glyphicon glyphicon-trash " aria-hidden="true"></span>' +
                            'QUITAR</button> ' +
                            '</td>';

                        htmlItem += '</tr>';


                        $("#tbody_partes").append(htmlItem);
                        partesList.push(response[i])

                    }

                    $(".btn_deleteParte").on("click", function () {


                        var index = $(this).data("index");
                        var trItem = $("#tr_item_" + index);
                        trItem.empty();
                        trItem.hide();


                        console.log("indexDelete : " + index)

                        if (index > -1) {
                            partesList.splice(index, 1);
                        }

                        console.table(partesList)
                    })

                }

            })
        }


        var contDocuments = 1;


        var filesPDF = [];
        // $("#divFileChooser").hide();
        $("#btnSubirArchivo").on("click", function () {

            validarImputs("#archivo");

            if (errors == 0) {

                var file_data = $("#archivo")[0].files[0];
                var form_data = new FormData();
                form_data.append('_token', '{!! csrf_token() !!}');
                form_data.append('archivo', file_data);
                form_data.append('nroPaginas', nroPaginas);


                nroPaginasTotal = nroPaginasTotal + nroPaginas;
                $.ajax({
                    url: '/subir',
                    type: 'POST',
                    dataType: 'JSON',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    success: function (response, textStatus, jqXHR) {

                        var tipoDocument = "ANEXO"

                        if (contDocuments == 1) tipoDocument = "PRINCIPAL";

                        var htmlItem = '';
                        htmlItem += '<tr>';
                        htmlItem += '   <th scope = "row" > ' + contDocuments + ' </th>';
                        htmlItem += '   <td> ' + response.nombre + ' </td>';
                        htmlItem += '   <td> ' + response.size + ' </td>';
                        htmlItem += '   <td> ' + response.paginas + ' </td>';
                        htmlItem += '   <td> ' + tipoDocument + ' </td>';
                        htmlItem += '   <td> ' +
                            '<button type="button" id="" class="btn btn-primary btn_deleteDocument btn-xs" ' +
                            'data-idparte=""' +
                            '>' +
                            '<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>' +
                            '</button> ' +
                            '</td>';

                        htmlItem += '</tr>';

                        $("#tbody_documentos").append(htmlItem);

                        filesPDF.push(response)

                        contDocuments++;

                        console.log(filesPDF.length);
                        $("#btnSubirArchivo").hide();
                        $("#label_archivo").show();
                        $("#txt_nombreArchivo").text("Seleccione otro Archivo")
                        $("#txt_nroPaginas").text("")
                    }

                });
            }
        });


        var nroPaginas = 0;
        var nroPaginasTotal = 0;
        $('#archivo').on('change', function () {
            var ext = $(this).val().split('.').pop();
            nroPaginas = 0;
            if ($(this).val() != '') {
                if (ext == "pdf") {

                    var reader = new FileReader();
                    reader.readAsBinaryString($(this)[0].files[0]);
                    var archivo = $(this)[0].files[0];
                    var count = 0;
                    reader.onloadend = function () {
                        count = reader.result.match(/\/Type[\s]*\/Page[^s]/g).length;
                        $("#txt_nroPaginas").text("Nro Hojas Detectadas : " + count);
                        $("#btnSubirArchivo").show();
                        $("#label_archivo").hide();
                        nroPaginas = count;

                    }


                    if ($(this)[0].files[0].size > 1048576 * 5) {
                        console.log("El documento excede el tamaño máximo");
                        //showMsj("El documento excede el tamaño máximo");
                        $(this).val('');
                    } else {

                        $("#txt_nombreArchivo").text($(this)[0].files[0].name);


                        //showMsj("Se ha verificado el tamaño del Documento");
                    }
                } else {
                    $(this).val('');
                    showMsj("Extensión no permitida: " + ext);
                }
            }
        });
        $("#btnSubirArchivo").hide();

        var partesList = [];
        var contPartes = 0;


        $("#btnRegistrarDocumento").on("click", function () {
            console.log("btnRegistrarDocumento clicked");
            errors = 0;
            var n_actoDocumento = $("#sel_Documento").val();
            var txt_obtervacion = $("#txt_Observacion").val();


            validarImputs("#sel_Documento", "s");
            validarImputs("#txt_Observacion", "s");
            validarPDFs();
            validarPartes();

            if (errors == 0) {

                var form_data = new FormData();
                form_data.append('_token', '{!! csrf_token() !!}');
                form_data.append('n_actoDocumento', n_actoDocumento);
                form_data.append('txt_obtervacion', txt_obtervacion);
                form_data.append('n_fojas', nroPaginasTotal);
                form_data.append('n_unico', n_unico);
                form_data.append('filesPDF', JSON.stringify(filesPDF));
                form_data.append('partesList', JSON.stringify(partesList));

                $.ajax({
                    url: '/addDocument',
                    type: 'POST',
                    dataType: 'JSON',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    success: function (response, textStatus, jqXHR) {

                        if (response == 1 || response == "1") {
                            window.location.replace("/expediente/index");
                        } else {
                            showMsjError('Error de Registro !');
                        }
                    },
                    error: function (jqXHR, exception) {
                        showMsjError('No Conexión del servidor !');
                    }


                })

            } else {
                showMsjError("Verifique todas las entradas de texto")
            }

        });


        function validarPDFs() {
            if (filesPDF.length == 0) {
                errors++;
                showMsjError("Seleccionar al menos un Archivo PDF")
            }
        }

        function validarPartes() {
            if (partesList.length == 0) {
                errors++;
                showMsjError("Partes no Existentes")
            }
        }

        $("#btnCancelarParte").on("click", function () {
            ClearImputsPartnte();

        });

        var errors = 0;

        function validarImputs(idSelect, tipoValidacion) {
            // switch (tipoValidacion) {
            //     case "s":
            if ($(idSelect).val() == 0 || $(idSelect).val() == "") {
                errors++;
            }


        }


        function ClearImputsPartnte() {

        }
    </script>

@endsection()