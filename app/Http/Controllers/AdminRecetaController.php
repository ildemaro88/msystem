<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ModReceta;
use Illuminate\Support\Facades\DB;

class AdminRecetaController extends Controller
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $receta = ModReceta::Where('id',$id)->orWhere('descripcion',$id)->first();
        return $receta;
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


    public function printPDF($id_consuta,$descripcion){
        
        $descripcion = str_replace("@","/",$descripcion);
         $descripcion = str_replace("<","\\n",$descripcion);
         //dd($descripcion);
        $receta = self::buscar($id_consuta,$descripcion);

        if(empty($receta)){
            $receta = new ModReceta;
            $receta->id_consulta =$id_consuta;
            $receta->descripcion = $descripcion;
            $receta->save();
          //Session::put('operation','guardado');

        }
        $receta->descripcion = str_replace("\\n","\n",$receta->descripcion );
        $receta->descripcion =nl2br($receta->descripcion, false );
       // dd($receta->descripcion);
       // dd(nl2br($receta->descripcion ));
        //$receta->descripcion = nl2br($receta->descripcion,false);
        //dd(nl2br( $descripcion),false);
        $pdf = \PDF::loadView('consulta.receta',['receta' => $receta]);
        $pdf->setPaper('A5');

        return $pdf->stream();
    }

    public function buscar($id_consuta,$descripcion){
        $receta = DB::table('recetas')->select('*')->where('id_consulta',$id_consuta)->where('descripcion',$descripcion)->first();
        //$receta = ModReceta::Where('id_consulta',$id_consuta)->where('descripcion',$descripcion)->first();
       // dd($id_consuta);
        //dd($receta);
        return $receta;

    }
}
