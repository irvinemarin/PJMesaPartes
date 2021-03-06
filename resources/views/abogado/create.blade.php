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
                                <label class="fancy-checkbox" for="cbx_modal">
                                    <input id="cbx_modal" type="checkbox">
                                    <span>Acepto los términos y condiciones del servicio.</span>
                                    <a id="txtShowModalAcuerdo" href="#" style="color: red;">
                                        Ver los términos y condiciones</a>
                                </label>
                            </div>
                            <br><br>
                            <div style=" float: right;">
                                <button id="btnRegistrarAbogado" type="submit" class="btn btn-primary btn-sm">REGISTRAR
                                    USUARIO
                                </button>
                                <a href="{{url('/')}}" type="button" class="btn btn-primary btn-sm">Cancelar
                                </a>
                            </div>


                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END WRAPPER -->

    <div class="modal fade" id="modal_acuerdo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         data-backdrop="static" data-keyboard="false">

        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Acuerdos Legales</h4>
                </div>
                <div class="modal-body">
					<textarea class="form-control" rows="25" readonly="true">
                        SISTEMA DE MESA DE PARTES VIRTUAL PENAL
										UETI-PENAL
									CONSEJO EJECUTIVO
							 		  PODER JUDICIAL

TÉRMINOS Y CONDICIONES DE USO (TCU)

Los presentes términos y condiciones regirán el acceso y el uso del producto de software y de los servicios contenidos en este, denominado MESA DE PARTES VIRTUAL PENAL (en adelante, el «Aplicativo»), propiedad del PODER JUDICIAL (en adelante, la «Entidad») así como toda información, (texto, gráficos, fotografías, etc.) que se carguen o se muestre en el Aplicativo o se descarguen a través de este (en adelante, colectivamente, el «Contenido»).  El acceso y/o utilización del Aplicativo y el uso que usted haga de estos significa la plena aceptación y cumplimiento de los presentes Términos y Condiciones de Uso.
El PODER JUDICIAL se reserva el derecho de actualizar sin previo aviso, los presentes TCU. La versión más actualizada de los TCU puede ser revisada dando clic en la sección “Términos y Condiciones de Uso” localizada en la página principal de acceso del aplicativo.

Condiciones básicas.
El usuario es responsable del uso que haga del Aplicativo, del Contenido que proporcione a través este y de las consecuencias que se deriven de dicho uso. Otros usuarios del Aplicativo podrán ver el Contenido que el usuario envíe, publique o muestre; de ahí que queda obligado a proporcionar sólo Contenidos correspondientes a los procesos en materia penal, especialidad para la cual fue desarrollado el Aplicativo.
El usuario deberá respetar en todo momento los presentes Términos y Condiciones de Uso del Software. De forma expresa el usuario DECLARA BAJO JURAMENTO que utilizará el Aplicativo de forma diligente y asumiendo cualquier responsabilidad que pudiera derivarse del incumplimiento de las normas.

Condiciones de utilización del Aplicativo.
El Aplicativo contiene servicios de registro, envío y recepción de archivos digitales y/u otros mensajes o comunicaciones diseñados para la interacción con los actores del flujo del proceso de la remisión de información digital para las mesas de partes de la Entidad. USTED SEE COMPROMETE a utilizar estos servicios únicamente para registrar, enviar y visualizar del Contenido que no contravienen las disposiciones legales.
Los Usuarios se obligan a hacer buen uso del Aplicativo y de sus contenidos, respetando la normativa nacional vigente, las buenas costumbres y el orden público, comprometiéndose en todo momento a no causar daños a la Entidad ni a terceros. A tal efecto, el usuario se abstendrá de utilizar cualquiera de los servicios con fines o efectos ilícitos, prohibidos en los presentes Términos y Condiciones, lesivos de los derechos e intereses de terceros, o que de cualquier forma puedan dañar, inutilizar, sobrecargar, deteriorar o impedir la normal utilización del aplicativo, funcionamiento de cualquier módulo, documentos y toda clase de contenidos en y desde cualquier equipo informático o de telecomunicaciones.
El Aplicativo no podrá usarse de ninguna manera tal que pudiera causar daño, deshabilitar o saturar cualquiera de los servidores, la(s) red(es) conectada(s) a cualquier equipo de la Entidad o interferir con el uso y goce de los servicios a favor de otro usuario. El usuario no debe intentar tener acceso no autorizado al Aplicativo, a otra cuenta, sistemas o redes conectadas a algún servidor de la Entidad o a los Servicios a través del robo o violación de datos o programas.
El usuario es responsable del material que él mismo ingrese, por lo que deberá cumplir con las Leyes y reglamentos que en materia de Propiedad Intelectual y legislativa apliquen. El usuario asumirá la total responsabilidad de cualquier demanda, denuncia y/o reclamación que se presente en su contra por la publicación de información del que es responsable, quedando la Entidad eximida de cualquier responsabilidad.
El Aplicativo se proporciona para el uso exclusivo y específico de los usuarios institucionales (Ministerio Público) y naturales (Litigantes) identificados por la Entidad; los usuarios no están autorizados a modificar, copiar, distribuir, transmitir, comunicar, ejecutar, reproducir, publicar, licenciar, crear obras derivadas de, transferir o vender ninguna información obtenida o que se desprenda del Aplicativo.

Alcance del Aplicativo
El presente Aplicativo, propiedad del Poder Judicial, ha sido desarrollado para uso estricto en la especialidad penal, asimismo, el usuario se compromete hacer uso de este para el registro y remisión de:
1.	Habeas Corpus
2.	Querellas
3.	Documentos (escritos y oficios)
4.	Solicitudes
Obligaciones de los Usuarios y Condiciones de acceso.

El usuario sólo puede tener acceso al Aplicativo y utilizarlo con propósitos legítimos.
El usuario SE COMPROMETE a señalar su casilla electrónica al llenar el formato exigido en este aplicativo con motivo de la presentación de algún documento o solicitud, por lo que, a partir de la fecha esa dirección electrónica se convierte en su único DOMICILIO PROCESAL, salvo posterior modificación expresa
El usuario es el único responsable del conocimiento y cumplimiento de las leyes, normativas y reglamentos relativos al uso del Aplicativo.  El usuario se compromete a NO:
•	Utilizar el Aplicativo o alentar conductas que puedan constituir la comisión de un delito o dar lugar a responsabilidad civil y/o penal, o de otro modo incumplir cualquier legislación o normativa local, estatal o internacional, incluido, a título enunciativo;
•	Registrar o publicar contenido que sea ilegal, amenazante, difamatorio, hostil, vulgar, obsceno, pornográfico, profano, que invada la privacidad de otra persona y demás que se encuentren tipificadas en el Código Penal o que sea censurable por el motivo que fuere;
•	Registrar, remitir o visualizar Contenido para el que no tenga los derechos de acceso;
•	Registrar, remitir o visualizar Contenido que infrinja derechos, disposiciones judiciales, u otros derechos de propiedad de terceros;
•	Modificar, dañar o eliminar contenido u otras comunicaciones que no sean de su propiedad, o bien interferir en la capacidad de otros a acceder al Aplicativo o utilizarlo;
•	Registrar y/o remitir información incongruente u otras formas de abordar a los demás usuarios que no estén autorizadas, incluido, a título enunciativo, «notificaciones», «mensajes», etc.;
•	Interferir o interrumpir los servicios, los servidores o las redes conectadas a los Servicios o desobedecer los requisitos, procedimientos, políticas o reglamentos de las redes conectadas al Aplicativo, así como adaptar o de otro modo modificar, crear un producto derivado o descompilar, aplicar ingeniería inversa o de otro modo intentar obtener el código fuente del Aplicativo (o de una parte de estos);
•	Reproducir, duplicar, copiar, usar, distribuir, vender, revender o explotar de la forma que fuere y con fines comerciales partes del Aplicativo y  sus canales o Servicios;
•	Perjudicar a menores de edad de la forma que fuere;
•	Acosar u hostigar a otras personas o;
•	Recopilar o almacenar información personal sobre otros usuarios sin su consentimiento.
La Entidad se reserva el derecho a suprimir o rechazar la atención del contenido en el Aplicativo y de suspender o cancelar usuarios y deslindar responsabilidad total de todo índole con él.  Asimismo, se reserva el derecho a accesar, leer, preservar y revelar toda la información que considere necesaria para:
•	Cumplir con las leyes o reglamentos aplicables o atender a las solicitudes relativas a procedimientos judiciales o gubernamentales;
•	Hacer valer las condiciones, incluida la investigación de posibles violaciones de estas;
•	Detectar, prevenir o, según sea el caso, abordar problemas de fraude, de seguridad o técnicos;
•	Responder a solicitudes de asistencia de los usuarios o;
•	Proteger los derechos, la propiedad o la seguridad de la Entidad, los usuarios y terceros.

Aceptaciones del Usuario
Usuario de institución autorizada
•	El usuario representante de una institución, acepta haber recibido gratuitamente sus respectivas credenciales de acceso en sobre cerrado, las que tienen el carácter de estrictamente personales. El usuario, por estrictas razones de seguridad, podrá cambiar su clave de acceso cuando lo considere necesario.
•	El usuario se compromete a no ceder ni transferir bajo ninguna modalidad ni circunstancia, las credenciales de acceso al Aplicativo; siendo en todo caso, único responsable del uso que terceras personas pudieran darle.
•	El Aplicativo, será utilizado exclusivamente para el registro de Requerimientos y Solicitudes y no para otros fines.
•	El usuario consignará obligatoriamente su casilla electrónica en los Requerimientos o solicitudes que se registren en el Aplicativo.
•	El usuario DECLARA BAJO JURAMENTO que el documento que se ingrese al Aplicativo es auténtico y asume la responsabilidad de su contenido.
•	El usuario conoce el horario de funcionamiento del Aplicativo, turno normal  funcionará dentro del horario de 8:00 am a 4:59 pm, asimismo, de registrar fuera del horario establecido - turno especial  de 5:00 pm a 7:59 am los Requerimientos y Solicitudes será considerado como registrado el día siguiente hábil.
•	El usuario en responsable del contenido de los documentos registrados en el Aplicativo, asimismo reconoce como fecha de ingreso del documento, el que figura en el cargo que emita el Sistema.
•	El usuario, deberá solicitar formalmente, mediante escrito dirigido a la Gerencia de Administración Distrital de la Corte Superior de Justicia de LIMA ESTE, ante olvido o perdida de usuario y clave del Aplicativo, el reinicio o la generación de credenciales nuevas.
•	El usuario, deberá solicitar formalmente, mediante escrito dirigido a la Gerencia de Administración Distrital de la Corte Superior de Justicia de LIMA ESTE la supresión definitiva de sus credenciales de acceso, por consiguiente, la cancelación de su usuario del Aplicativo.
•	El usuario, conoce y acepta que se procederá a cancelar las credenciales de acceso al Aplicativo, cuando el Ministerio Público comunique alguna sanción firme en contra de su persona, que implique su inhabilitación o suspensión en el ejercicio de su función, previstas en la Ley Orgánica del Ministerio Público  (Decreto Legislativo N° 052).
•	El usuario acepta que el presente documento tiene la calidad de Declaración Jurada.
•	El usuario acepta que ante cualquier falsedad del documento se tipificaría el  delito de falsedad documental sancionado en el  Código Penal , debiendo de seguirse el proceso penal correspondiente.
Usuario Litigante
•	El Aplicativo, será utilizado exclusivamente para el registro de Habeas Corpus y Querellas, y no para otros fines.
•	El usuario consignará obligatoriamente su casilla electrónica en los Habeas Corpus o Querellas y cualquier otro documento y solicitud que se registren en el Aplicativo.
•	El usuario declara que el documento que se ingrese al Aplicativo es auténtico y asume la responsabilidad del contenido.
•	El usuario conoce el horario de funcionamiento del Aplicativo, turno normal funcionará dentro del horario de 8:00 am a 4:59 pm, asimismo, de registrar fuera del horario establecido turno especial de 5:00 pm a 7:59 am las Habeas Corpus, Querellas y documentos será considerado como registrado el día siguiente hábil.
•	El usuario en responsable del contenido de los documentos registrados en el Aplicativo, asimismo reconoce como fecha de registro y/o ingreso del documento, el que figura en el cargo que emita el Sistema.
•	El usuario, deberá solicitar formalmente, mediante escrito dirigido a la Gerencia de Administración Distrital de la Corte Superior de Justicia de LIMA ESTE, ante olvido o perdida de usuario y clave del Aplicativo, el reinicio o la generación de credenciales nuevas.
•	El usuario, deberá solicitar formalmente, mediante escrito dirigido a la Gerencia de Administración Distrital de la Corte Superior de Justicia de LIMA ESTE, la supresión definitiva de sus credenciales de acceso, por consiguiente, la cancelación de su usuario del Aplicativo.
•	El usuario, conoce y acepta que se procederá a cancelar las credenciales de acceso al Aplicativo, cuando el Colegio de Abogados al que pertenece, comunique la aplicación de alguna sanción firme en contra de su persona, que implique su inhabilitación o suspensión en el ejercicio de la profesión, o cuando se configuren las causales de impedimento para patrocinar por razones de función, previstas por los Artículos 286 y 287 del Texto Único Ordenado de la Ley Orgánica del Poder Judicial .
•	El usuario acepta que el presente documento tiene la calidad de Declaración Jurada.
•	El usuario acepta que ante cualquier falsedad del documento se tipificaría el  delito de falsedad documental sancionado en el  Código Penal , debiendo de seguirse el proceso penal correspondiente.
Derechos de Autor.
El Aplicativo se pone a disposición para su uso exclusivamente para los usuarios institucionales (Ministerio Público) y naturales (Litigantes) identificados por la Entidad. Cualquier reproducción o redistribución del Software fuera de lo establecido por la Entidad está expresamente prohibido por la Ley y es considerado como delito en los términos penales. Cualquier violación a los derechos autorales así como de los presentes Términos y Condiciones se perseguirá como delito ante las autoridades competentes. Sin limitación por lo anterior, queda expresamente prohibida su reproducción total o parcial a cualquier otro servidor o locación para su posterior reproducción o redistribución, su traducción, inclusión, transmisión, almacenamiento o acceso a través de medios analógicos, digitales o de cualquier otro sistema o tecnología creada, a menos que esté expresamente permitido por el contrato de licencia que acompañe a dicho software.
Todos los contenidos, documentación, códigos de programación o cualquier otro elemento susceptible de protección por la legislación de Derechos de Autor o Propiedad Intelectual, que sean accesibles en el Aplicativo, corresponden exclusivamente a la Entidad o a sus legítimos titulares y quedan expresamente reservados todos los derechos sobre los mismos.
En cualquier caso, la Entidad se reserva todos los derechos sobre los contenidos, información, datos y servicios que ostente sobre los mismos. La Entidad no concede ninguna licencia o autorización de uso al usuario sobre sus contenidos, datos o servicios, distinta de la que expresamente se detalle en los presentes Términos y Condiciones de Uso.
En caso de que se utilice cualquier información contenida en este Aplicativo para fines diferentes a los autorizados, o simplemente se utilice para fines distintos a los expresamente detallados en los presentes Términos y Condiciones de Uso se considerará esto como una vulneración a los Derechos de Autor y la Entidad ejercerá las acciones legales correspondientes a que haya lugar conforme a la Ley vigente de Derechos de Autor y Ley de Propiedad Intelectual.

6.- Limitaciones de Responsabilidad.
Este apartado establece los límites de responsabilidad de la Entidad, sociedades vinculadas, directivos, consejeros y empleados (en adelante, colectivamente, las «interesados»). El usuario es responsable del uso que haga del Aplicativo o del Contenido y del acceso a estos.  El usuario entiende y acepta que el Aplicativo y sus servicios se le proporcionan COMO ESTÁN Y SEGÚN DISPONIBILIDAD.
La Entidad se compromete en mantener, en la medida de lo posible, el Aplicativo en funcionamiento, sin errores y seguro, pero el usuario lo utilizará bajo su propia responsabilidad.
La Entidad proporciona el Aplicativo tal cual, sin garantía alguna expresa o implícita, incluidas, entre otras, adecuación a un fin particular y no incumplimiento. La Entidad NO garantiza que el Aplicativo sea siempre seguro o esté libre de errores, ni que funcione siempre sin interrupciones, retrasos o imperfecciones. La Entidad no se responsabiliza de las acciones, el contenido, la información o los datos de terceros, y por la presente el usuario dispensa a la Entidad, de cualquier demanda o daños, conocidos o desconocidos, derivados de cualquier demanda que tenga interpuesta contra tales, terceros o de algún modo relacionados con esta.
La Entidad se excluye de toda responsabilidad con respecto a:
•	La integridad y exactitud del contenido que registre y remita cualquiera de los usuarios que tengan acceso al Aplicativo,
•	Los daños ocasionados en su sistema informático, la pérdida de datos u otros daños que sean consecuencia del uso que el usuario haga de los Servicios o del Contenido o del acceso a estos, y
•	La supresión del Contenido y de otras comunicaciones mantenidas a través de los Servicios o la omisión de guardarlos o transferirlos.
Los consejos o las informaciones, verbales o por escrito, proporcionados por la Entidad o a través de los Servicios, no crearán ninguna garantía que no se ofrezca de manera expresa en el presente.
En la medida máxima permitida por la legislación aplicable, la Entidad no será responsable por los daños indirectos, incidentales, cuantificables, emergentes o punitivos; pérdidas de beneficios o ingresos, directas o indirectas, o pérdidas de datos, uso u otras pérdidas intangibles, que sean consecuencia:
•	Del uso que el usuario haga de los Servicios o del acceso a estos por su parte, o de la imposibilidad de utilizar los servicios o acceder a estos,
•	De la conducta o el contenido de terceros en los servicios, incluido, a título enunciativo, toda conducta difamatoria, ofensiva o ilícita de otros usuarios o terceros,
•	Del contenido obtenido a través de los Servicios, o
•	Del acceso, el uso o la modificación no autorizados de su contenido o de las transferencias que el usuario efectúe.
Las limitaciones que se establecen en este subapartado se aplican a toda teoría de responsabilidad, sea por garantía, contrato, ley, agravio (incluida negligencia) o según sea el caso, e independientemente de que se haya informado a la Entidad  de la posibilidad de que se produzcan tales daños, incluso en el caso de que un recurso establecido en virtud del presente haya fallado en su propósito esencial.
En ningún caso la Entidad podrá ser señalada responsable por cualquier daño especial, indirecto o cualquier otro tipo de agravio que resulte de la pérdida de información por el uso o negligencia que surja por o en conexión con el uso o desempeño del Aplicativo, documentos o alguna falla al proveer los Servicios o información disponible en ellos.

7.- Legislación aplicable y jurisdicción competente.
En caso de controversia derivada de la interpretación o cumplimiento de los presentes Términos y Condiciones de Uso, de las Políticas de Privacidad o de cualquier otro documento relevante del software, el usuario está de acuerdo en que serán aplicables la Ley N° 30096  y legislación sustantiva nacional vigente, cuya competencia recae ante Juez Penal peruano, renunciando expresamente a cualquier otro fuero o jurisdicción que pudiera corresponderle en razón de su domicilio presente o futuro.
*Copyright PODER JUDICIAL 2020, todos los derechos reservados.
El Sistema de Mesa de Partes Virtual Penal, sus logotipos y slogans son propiedad del PODER JUDICIAL.
					</textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" id="aceptarAcuerdo" class="btn btn-success">Sí, estoy de acuerdo</button>
                    <button type="button" id="cancelarAcuerdo" class="btn btn-danger" data-dismiss="modal">No, estoy de
                        acuerdo
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

@endsection

@section('extra_js')

    <script !src="">


        $("#aceptarAcuerdo").on("click", function () {
            $("#cbx_modal").attr('checked', true);
            $("#modal_acuerdo").modal("hide");
            $("#btnRegistrarAbogado").show();

        });
        $("#cancelarAcuerdo").on("click", function () {
            $("#cbx_modal").attr('checked', false);
            $("#modal_acuerdo").modal("hide");
            $("#btnRegistrarAbogado").hide();
        });

        $("#txtShowModalAcuerdo").on("click", function () {
            $("#modal_acuerdo").modal("show");
        });
        $("#cbx_modal").on("click", function () {
            if ($(this).is(':checked')) {
                $("#modal_acuerdo").modal("show");
            } else {
                $("#btnRegistrarAbogado").hide();
            }
        })
        $("#btnRegistrarAbogado").hide();
        $("#modal_acuerdo").modal("hide");

    </script>
@endsection