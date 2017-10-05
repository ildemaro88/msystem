<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use crocodicstudio\crudbooster\helpers\CRUDBooster;
use App\ModTipoExamen;
use App\ModPriceExamen;
use App\ModPriceSpecialty;
use Session;
use App\ModEspecialidad;

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
    public function savePriceSpecialty(Request $request, $idEmpresa) {

        $priceSpecialty = new ModPriceSpecialty();
        $priceSpecialty->id_empresa = $idEmpresa;
        $priceSpecialty->id_especialidad = $request->get("idSpecialty");
        $priceSpecialty->precio = $request->get("price");

        $result = $priceSpecialty->save();
        try {
            $response = true;
        } catch (\Error $x) {
            $response = false;
        }
        return response()->json([$response
        ]);
    }

        //By the way, you can still create your own method in here... :)
    public function updatePriceSpecialty(Request $request, $idEmpresa) {

        $priceSpecialty = ModPriceSpecialty::where("id_empresa", $idEmpresa)
                ->where("id_especialidad", $request->get("idSpecialty"))
                ->first();
        
        $priceSpecialty->precio = $request->get("price");

        $result = $priceSpecialty->save();
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
        foreach ($prices  as $price) {
          
          $getPrice[$price["id_examen"]] = $price["precio"];
          
        }
        return response()->json([
                    "response" => $getPrice
        ]);
    }
    
        //By the way, you can still create your own method in here... :)
    public function getPricesSpecialties(Request $request, $idEmpresa) {

        $prices = ModPriceSpecialty::where("id_empresa", $idEmpresa)->get();
        foreach ($prices  as $price) {
          
          $getPrice[$price["id_especialidad"]] = $price["precio"];
          
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
    
        /*
     * Traer todos los examenes de la base de datos....
     *  
     */

    public function getSpecialties() {

        $specialties = ModEspecialidad::all();

        return response()->json([
                    "response" => $specialties
        ]);
    }

}
