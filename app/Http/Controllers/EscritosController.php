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
        //


        return redirect("escritos/index");
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
        $originalname = $request->file('archivo')->getClientOriginalName();

        //Recibimos el archivo y lo guardamos en la carpeta storage/app/public
        $request->file('archivo')->store('public/pdfs/' . $originalname);

        return "1";

    }


}
