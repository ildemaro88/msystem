<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use crocodicstudio\crudbooster\helpers\CRUDBooster;
use App\ModOrdenExamenes;
use App\ModOrden;
use App\ModMedico;
use App\ModExamen;
use App\ModTipoExamen;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection as Collection;
use App\ModPaciente;
use Session;
use Carbon\Carbon;

class AdminPriceExamensConsultationController extends \crocodicstudio\crudbooster\controllers\CBController {

    //By the way, you can still create your own method in here... :)
    public function getAdd() {
        
        return view("price.index", compact('page_title', 'Pagos'));
    }

    /*
     *Traer todos los examenes de la base de datos....
     *  
     */

    public function getExamens() {

        $typeExamnens = ModTipoExamen::
            with("categorias")
            ->with("categorias.examenes")
            ->get();

        return response()->json([
                    "response" =>$typeExamnens
        ]);
    }

}
