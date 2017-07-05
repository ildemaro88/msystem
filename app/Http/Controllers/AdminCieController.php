<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ModCie;


class AdminCieController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
    * Busca todos los codigos CIE10 en la base de datos.
    */
    public function allCie(){
        $all = ModCie::all();
        //dd($all);
        return $all;
        
    }

    /**
    * Buscar cie por descripción
    */
    public function getCieByDescription(Request $request){
        $cie = ModCie::select('cod_cie')->where('descripcion',$request->input('query'))->first();

        return $cie;
    }

     /**
    * Buscar descripción por cie
    */
    public function getDescriptionByCie(Request $request){
        $descripcion = ModCie::select('descripcion')->where('cod_cie',$request->input('query'))->first();

        return $descripcion;
    }

}
