<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use crocodicstudio\crudbooster\helpers\CRUDBooster;
use App\ModTipoExamen;
use App\ModPriceExamen;
use Session;

class AdminPriceExamensConsultationController extends \crocodicstudio\crudbooster\controllers\CBController {

    //By the way, you can still create your own method in here... :)
    public function index($idEmpresa) {

        return view("price.index", compact('page_title', 'Pagos'), ["idEmpresa" => $idEmpresa]);
    }

    //By the way, you can still create your own method in here... :)
    public function savePrice(Request $request, $idEmpresa) {

        $priceExamen = new ModPriceExamen();
        $priceExamen->id_empresa = $idEmpresa;
        $priceExamen->id_examen = $request->get("idExamen");
        $priceExamen->precio = $request->get("price");

        $result = $priceExamen->save();
        try {
            $response = true;
        } catch (\Error $x) {
            $response = false;
        }
        return response()->json([$response
        ]);
    }

        //By the way, you can still create your own method in here... :)
    public function updatePrice(Request $request, $idEmpresa) {

        $priceExamen = ModPriceExamen::where("id_empresa", $idEmpresa)
                ->where("id_examen", $request->get("idExamen"))
                ->first();
        
        $priceExamen->precio = $request->get("price");

        $result = $priceExamen->save();
        try {
            $response = true;
        } catch (\Error $x) {
            $response = false;
        }
        return response()->json([$response
        ]);
    }
    
    //By the way, you can still create your own method in here... :)
    public function getPrices(Request $request, $idEmpresa) {

        $prices =  ModPriceExamen::where("id_empresa", $idEmpresa)->get();
        $newPrices = array();
        foreach ($prices  as $price) {
          
          $getPrice[$price["id_examen"]] = $price["precio"];
          
        }
        return response()->json([
                    "response" => $getPrice
        ]);
    }
    /*
     * Traer todos los examenes de la base de datos....
     *  
     */

    public function getExamens() {

        $typeExamnens = ModTipoExamen::
                with("categorias")
                ->with("categorias.examenes")
                ->get();

        return response()->json([
                    "response" => $typeExamnens
        ]);
    }

}
