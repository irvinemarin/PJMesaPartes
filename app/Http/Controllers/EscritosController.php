<?php

namespace App\Http\Controllers;

use App\Escritos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Promise\all;

class EscritosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //

        //$ActoProcesalList = DB::table('actoprocesal')->get();
        $InstanciaList = DB::table('instancia')->get();
        $AbogadoList = DB::table('abogado')->get();

        return view("escritos.index",
            [
                //'ActoProcesalList' => $ActoProcesalList,
                'InstanciaList' => $InstanciaList,
                'AbogadoList' => $AbogadoList
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $InstanciaList = DB::table('instancia')->get();
        $AbogadoList = DB::table('abogado')->get();

        return view("escritos.create",
            [
                //'ActoProcesalList' => $ActoProcesalList,
                'InstanciaList' => $InstanciaList,
                'AbogadoList' => $AbogadoList
            ]);
        //return view("escritos.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        //
        $c_tipo_persona = $request->input('sel_TipoPersona');
        $l_tipo_parte = $request->input('l_tipo_parte ');
        $c_tipo_doc = $request->input('l_tipo_parte ');
        $c_especialidad = $request->input('c_especialidad  ');
        $x_doc_id = $request->input('txt_nroducumento_parte');


        $x_ape_paterno = $request->input('txt_apellidopat_parte');
        $x_ape_materno = $request->input('txt_apellidomat_parte');
        $x_nombres = $request->input('txt_nombres_parte');


        $l_activo = 1;

        $n_abogado = (DB::table('abogado')->max('n_abogado')) + 1;


        //dd($n_abogado);

        $data = array(

            'c_tipo_persona' => $c_tipo_persona,
            "l_tipo_parte" => $l_tipo_parte,
            "c_tipo_doc" => $c_tipo_doc,
            "x_doc_id" => $c_especialidad,
            "c_especialidad" => $x_doc_id,
            "x_ape_paterno" => $x_ape_paterno,
            "x_ape_materno" => $x_ape_materno,
            "x_nombres" => $x_nombres,


            "l_activo" => $l_activo

        );

        //dd($data);

        DB::table('abogado')->insert($data);


        return redirect('/');
    }

    public function addParte(Request $request)
    {
        dd($request);
        //
//        $c_tipo_persona = $request->input('sel_TipoPersona');
//        $l_tipo_parte = $request->input('l_tipo_parte ');
//        $c_tipo_doc = $request->input('l_tipo_parte ');
//        $c_especialidad = $request->input('c_especialidad  ');
//        $x_doc_id = $request->input('txt_nroducumento_parte');
//
//
//        $x_ape_paterno = $request->input('txt_apellidopat_parte');
//        $x_ape_materno = $request->input('txt_apellidomat_parte');
//        $x_nombres = $request->input('txt_nombres_parte');
//
//
//        $l_activo = 1;
//
////        $n_abogado = (DB::table('abogado')->max('n_abogado')) + 1;
//
//
//        //dd($n_abogado);
//
//        $data = array(
//
//            'c_tipo_persona' => $c_tipo_persona,
//            "l_tipo_parte" => $l_tipo_parte,
//            "c_tipo_doc" => $c_tipo_doc,
//            "x_doc_id" => $c_especialidad,
//            "c_especialidad" => $x_doc_id,
//            "x_ape_paterno" => $x_ape_paterno,
//            "x_ape_materno" => $x_ape_materno,
//            "x_nombres" => $x_nombres,
//
//
//            "l_activo" => $l_activo
//
//        );
//
//        //dd($data);
//
//        DB::table('abogado')->insert($data);


        return redirect('expediente/create');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Escritos $escritos
     * @return \Illuminate\Http\Response
     */
    public function show(Escritos $escritos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Escritos $escritos
     * @return \Illuminate\Http\Response
     */
    public function edit(Escritos $escritos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Escritos $escritos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Escritos $escritos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Escritos $escritos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Escritos $escritos)
    {
        //
    }


    public function subirArchivo(Request $request)
    {

        //dd($request);


        return "1";

    }


}
