<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ModCie;
use App\ModEspecialidad;
class SearchController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function autocomplete(Request $request)
    {
        $data = ModCie::select("descripcion as name")->where("descripcion","LIKE","%{$request->input('query')}%")->get();
        return response()->json($data);
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function autocompleteCodigo(Request $request)
    {
        $data = ModCie::select("cod_cie as name")->where("cod_cie","LIKE","%{$request->input('query')}%")->get();
        return response()->json($data);
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function autocompleteEspecialidad(Request $request)
    {
        $data = ModEspecialidad::select("descripcion as name")->where("descripcion","LIKE","%{$request->input('query')}%")->get();
        return response()->json($data);
    }
}
