<?php

namespace App\Http\Controllers;

use App\Abogado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbogadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $colegios=DB::table('colegioabogados')->get();
        $tipoDocumentos=DB::table('tipodocumentoidentidad')->get();
        $TipoPersona = DB::table('tipopersona')->get();

        return view("abogado.create", ['colegios' => $colegios,'TipoPersona' => $TipoPersona ,'tipoDocumentos'=>$tipoDocumentos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd($request);

        $x_login = $request->input('txt_username');
        $x_clave = $request->input('txt_clave');
        $c_tipo_persona = $request->input('sel_tipoPersona');
        $c_colegio = $request->input('sel_colegioAbogado');
        $x_colegiatura = $request->input('txt_nroColegiatura');
        $c_tipo_doc = $request->input('sel_tipoDocumento');
        $x_doc_id = $request->input('txt_nroDocumento');
        $x_ape_paterno = $request->input('txt_apePaterno');
        $x_ape_materno = $request->input('txt_apeMaterno');
        $x_nombres = $request->input('txt_nombres');
        $f_nacimiento = $request->input('txt_fNacimiento');
        $x_num_telefono = $request->input('txt_NroTelefono');

        $x_casilla_sinoe = $request->input('txt_sinoe');
        $x_correo = $request->input('txt_correo');
        $f_registro = date("Y-m-d");
        $l_activo = 1;

        $n_abogado = (DB::table('abogado')->max('n_abogado')) + 1;


        //dd($n_abogado);

        $data = array(

            'n_abogado' => $n_abogado,
            'x_login' => $x_login,
            'x_clave' => $x_clave,
            "c_tipo_persona" => $c_tipo_persona,
            "c_colegio" => $c_colegio,
            "x_colegiatura" => $x_colegiatura,
            "c_tipo_doc" => $c_tipo_doc,
            "x_doc_id" => $x_doc_id,
            "x_ape_paterno" => $x_ape_paterno,
            "x_ape_materno" => $x_ape_materno,
            "x_nombres" => $x_nombres,
            "f_nacimiento" => $f_nacimiento,
            "x_num_telefono" => $x_num_telefono,
            "x_casilla_sinoe" => $x_casilla_sinoe,
            "x_correo" => $x_correo,
            "f_registro" => $f_registro,
            "l_activo" => $l_activo

        );

        //dd($data);

        DB::table('abogado')->insert($data);


        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Abogado $abogado
     * @return \Illuminate\Http\Response
     */
    public function show(Abogado $abogado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Abogado $abogado
     * @return \Illuminate\Http\Response
     */
    public function edit(Abogado $abogado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Abogado $abogado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Abogado $abogado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Abogado $abogado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Abogado $abogado)
    {
        //
    }
}
