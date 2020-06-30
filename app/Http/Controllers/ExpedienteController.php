<?php

namespace App\Http\Controllers;

use App\Expediente;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Http\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Array_;
use PhpParser\Node\Expr\List_;
use Psy\Util\Json;
use Symfony\Component\HttpFoundation\Session\Session;


class ExpedienteController extends Controller
{

    public function __construct()
    {
        $session = new Session();
        if (!$session->has('username')) {
            return redirect('/');
        }
    }

    public function singOut()
    {

        $session = new Session();

        $session->clear();
        return redirect('/');


    }

    public function partesByExpediente(Request $request)
    {


        $Partes = DB::table('parteexpediente')->select('parteexpediente.*', 'tipoparte.x_desc_parte', 'tipodocumentoidentidad.x_abrevi')
            ->join('tipoparte', 'tipoparte.l_tipo_parte', '=', 'parteexpediente.l_tipo_parte')
            ->join('tipodocumentoidentidad', 'tipodocumentoidentidad.c_tipo_doc', '=', 'parteexpediente.c_tipo_doc')
            ->where('n_unico', '=', $request->get('n_unico'))
            ->get();

        //dd($Partes);

        return $Partes;
    }


    public function getExpediente(Request $request)
    {

        $txtSearch = $request->get("txtSearch");
        if ($txtSearch != "") {
            $Expedientes = DB::table('registroexpediente')->select('registroexpediente.*', 'tipomotivo.x_desc_motivo_ingreso')
                ->join('tipomotivo', 'registroexpediente.c_motivo_ingreso', '=', 'tipomotivo.c_motivo_ingreso')
                ->where("registroexpediente.x_formato", "like", "%" . strtoupper($txtSearch) . "%")
                ->orWhere("tipomotivo.x_desc_motivo_ingreso", "like", "%" . strtoupper($txtSearch) . "%")
                ->orWhere("registroexpediente.n_exp_sala", "like", "%" . strtoupper($txtSearch) . "%")
                ->orWhere("registroexpediente.n_ano", "like", "%" . strtoupper($txtSearch) . "%")
                ->get();

            return $Expedientes;
        } else {
            return "";
        }

    }


    public function index()
    {

        $session = new Session();

        if ($session->get('username')) {
            //dd("usuario existente");

            $username = $session->get('usernameId');

            $EscritosWeb = DB::table('escritoweb')
                ->join("RegistroExpediente",
                    function ($join) {
                        $join->on('RegistroExpediente.n_unico', '=', 'escritoweb.n_unico');
                    })
                ->join('tipomotivo', 'registroexpediente.c_motivo_ingreso', '=', 'tipomotivo.c_motivo_ingreso')
                ->join('actoprocesal', 'actoprocesal.c_acto_procesal', '=', 'escritoweb.c_acto_procesal')
                ->join("escritodocumentos",
                    function ($join) {
                        $join->on('escritodocumentos.n_codigoEscrito', '=', 'escritoweb.n_codigoEscrito');
                        $join->on('escritodocumentos.n_anoEscrito', '=', 'escritoweb.n_anoEscrito');
                    })
                ->leftJoin("estadoescrito",
                    function ($join) {
                        $join->on('estadoescrito.n_codigoEscrito', '=', 'escritoweb.n_codigoEscrito');
                        $join->on('estadoescrito.n_anoEscrito', '=', 'escritoweb.n_anoEscrito');
                    })
                ->where("n_abogado", "=", $username)
                ->where("escritodocumentos.l_tipo_docu", "=", "1")
                ->get();

            //dd($EscritosWeb);

            return view('expediente.index', ['EscritosWeb' => $EscritosWeb]);

        } else {
            return redirect('/');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        //
        $session = new Session();
        if (!$session->has('username')) {
            return redirect('/');
        }


        $TipoPersona = DB::table('tipopersona')->get();
        $TipoParte = DB::table('tipoparte')->get();
        $Instancia = DB::table('instancia')->get();
        $ActoProcesal = DB::table('actoprocesal')->get();
        //$ActoProcesal = DB::table('actoprocesal')->get();
        $Expedientes = DB::table('registroexpediente')->select('registroexpediente.*', 'tipomotivo.x_desc_motivo_ingreso')
            ->join('tipomotivo', 'registroexpediente.c_motivo_ingreso', '=', 'tipomotivo.c_motivo_ingreso')
            ->get();

        //dd($Expedientes);

        return view('expediente.create',
            [
                'TipoPersona' => $TipoPersona,
                'ActoProcesal' => $ActoProcesal,
                'Instancia' => $Instancia,
                'Expedientes' => $Expedientes,
                'TipoParte' => $TipoParte
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect('expediente/show');
    }


    public function addDocument(Request $request)
    {

        //dd($request);
        $countErrors = 0;
        $transaction = DB::transaction(function () use ($request, $countErrors) {

            $filesPDFAdjList = json_decode($request->get("filesPDF"), true);
            $partesList = json_decode($request->get("partesList"), true);


            $f_ingresoDocumento = Carbon::now()->format('Y-m-d h:i:s');


            $session = new Session();
            $n_abogado = $session->get('usernameId');


            $n_codigoEscrito = (DB::table('escritoweb')->max('n_codigoEscrito')) + 1;
            $n_anoEscrito = (DB::table('escritoweb')->max('n_anoEscrito')) + 1;


            $n_unico = $request->get("n_unico");
            $c_acto_procesal = $request->get("n_actoDocumento");
            $x_observacion = $request->get("txt_obtervacion");
            $n_fojas = $request->get("n_fojas");


            $expediente = DB::table('registroexpediente')->where("n_unico", "=", $n_unico)->get();


            $c_distrito = $expediente[0]->c_distrito;
            $c_provincia = $expediente[0]->c_provincia;
            $c_instancia = $expediente[0]->c_instancia;
            $n_incidente = $expediente[0]->n_incidente;
            $n_secuencia = 1;


            $data = array(
                'n_codigoEscrito' => $n_codigoEscrito,
                'n_anoEscrito' => $n_anoEscrito,
                'c_distrito' => $c_distrito,
                'c_provincia' => $c_provincia,
                'c_instancia' => $c_instancia,
                'n_unico' => $n_unico,
                'n_incidente' => $n_incidente,
                'f_ingresoDocumento' => $f_ingresoDocumento,
                'n_abogado' => $n_abogado,
                'c_acto_procesal' => $c_acto_procesal,
                'x_sumilla' => "",
                'n_fojas' => $n_fojas,


            );


            $result = DB::table('escritoweb')->insert($data);


            if ($result) {

                $data2 = array(
                    'n_codigoEscrito' => $n_codigoEscrito,
                    'n_anoEscrito' => $n_anoEscrito,
                    'n_secuencia' => $n_secuencia,
                    'l_estado' => "EN",
//                'l_ultimo' => $c_provincia,
                    'f_registro' => $f_ingresoDocumento,
                    'x_observacion' => $x_observacion,

                );


//
                $result2 = DB::table('estadoescrito')->insert($data2);


                if ($result2) {
                    //dd($result2);

                    $countFiles = 0;
                    $SecuenciaFiles = 1;

                    $dateTodayDocumentosPDF = Carbon::now()->format('Y-m-d h:i:s');


                    $SecuenciaPartes = 1;
                    foreach ($partesList as $itemParte) {

                        $data4 = array(
                            'n_codigoEscrito' => $n_codigoEscrito,
                            'n_anoEscrito' => $n_anoEscrito,
                            'n_item' => $SecuenciaPartes,
                            'n_unico' => $n_unico,
                            'n_incidente' => $n_incidente,
                            'n_secuencia_parte' => $itemParte["n_secuencia"],
                            'n_abogado' => $n_abogado,
                            'f_registro' => $dateTodayDocumentosPDF,

                        );


//
                        $result4 = DB::table('escritopresentantes')->insert($data4);

                        if (!$result4) {
                            $countErrors++;
                        }


                        $SecuenciaPartes++;
                    }


                    foreach ($filesPDFAdjList as $itemFile) {
                        //dd($itemFile["nombre"]);
                        $tipoDocumento = 0;
                        if ($countFiles == 0) {
                            $tipoDocumento = 1;
                        }


                        $data3 = array(
                            'n_anoEscrito' => $n_anoEscrito,
                            'n_codigoEscrito' => $n_codigoEscrito,
                            'n_secuencia' => $SecuenciaFiles,

                            'f_registro' => $dateTodayDocumentosPDF,
                            'x_nombre_archivo' => $itemFile["nombre"],
                            'x_descripcion' => "Sin Descripicción",
                            'x_ruta_archivo' => "public/pdfs/" . $n_abogado . "_" . $itemFile["nombre"],
                            'n_peso' => $itemFile["sizeByte"],
                            'n_folios' => $itemFile["paginas"],
                            'l_tipo_docu' => $tipoDocumento


                        );


//
                        $result3 = DB::table('escritodocumentos')->insert($data3);

                        if (!$result3) {
                            $countErrors++;
                        }

                        $countFiles++;
                        $SecuenciaFiles++;
                    }


                }
            }

        });


        if ($countErrors == 0) {
            DB::commit();
            return 1;
        } else {
            DB::rollBack();
            return -1;
        }
    }


    public function subirArchivo(Request $request)
    {


        $fileSize = $request->file('archivo')->getSize();


        $size = (int)$fileSize;
        $base = log($size) / log(1024);
        $suffixes = array(' bytes', ' KB', ' MB', ' GB', ' TB');
        $fileSiizeConvert = round(pow(1024, $base - floor($base)), 2) . $suffixes[floor($base)];
        $fileNumberPages = $request->get('nroPaginas');

        $session = new Session();
        $userUpload = $session->get('usernameId');


        $originalname = $userUpload . "_" . $request->file('archivo')->getClientOriginalName();


        //Recibimos el archivo y lo guardamos en la carpeta storage/app/public
        $path = $request->file('archivo')->storeAs('public/pdfs/', $originalname);


        $Document = ["nombre" => $originalname, "size" => $fileSiizeConvert, "sizeByte" => $fileSize, "paginas" => $fileNumberPages];


        return $Document;
    }


    public function deleteFile(Request $request)
    {

        $fileName = $request->get('fileName');
        $session = new Session();
        $userUpload = $session->get('usernameId');

        $result = Storage::delete('public/pdfs/' . $userUpload . "_" . $fileName);


    }

    public function getPdf($filename)
    {

        $path = storage_path($filename);

        return Response::make(file_get_contents("/public/pdfs/" . $filename), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $filename . '"'
        ]);


    }


}
