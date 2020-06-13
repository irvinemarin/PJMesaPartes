<button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal"
        >Registrar Parte
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar parte</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div id="divParteExpediente">

                    <div class="row">


                        <div class="col-md-6 col-lg-6 form-group">
                            <label>Nombres:</label>
                            <input type="text" class="form-control" name="txt_nombres_parte">
                        </div>
                        <div class="col-md-6 col-lg-6 form-group">
                            <label>Apellido Paterno</label>
                            <input type="text" class="form-control" name="txt_apellidopat_parte">
                        </div>
                        <div class="col-md-6 col-lg-6 form-group">
                            <label>Apellido Materno</label>
                            <input type="text" class="form-control" name="txt_apellidomat_parte">
                        </div>

                        <div class="col-md-6 col-lg-6 form-group">
                            <label>Tipo Persona</label>
                            <select class="form-control" name="sel_TipoPersona">
                                <option value="0">---- Seleccione ----</option>
                                @foreach($TipoPersona as $tp)

                                    <option value="{{$tp->c_tipo_persona}}">{{$tp->x_desc_tipo_persona}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 col-lg-6 form-group">
                            <label>Tipo Parte</label>
                            <select class="form-control" name="sel_TipoParte">
                                <option value="0">---- Seleccione ----</option>
                                @foreach($TipoParte as $tp2)

                                    <option value="{{$tp2->l_tipo_parte}}">{{$tp2->x_desc_parte}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 col-lg-6 form-group">
                            <label>Tipo de documento</label>
                            <select class="form-control" name="sel_tipodocumento_parte">
                                <option value="0">---- Seleccione ----</option>
                                <option value="1">DNI</option>
                                <option value="2">CARNÉ DE EXTRANJERÍA</option>
                            </select>
                        </div>
                        <div class="col-md-6 col-lg-6 form-group">
                            <label>Numero de documento</label>
                            <input type="text" class="form-control" name="txt_nroducumento_parte">
                        </div>

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Registrar Parte</button>
            </div>
        </div>
    </div>
</div>
