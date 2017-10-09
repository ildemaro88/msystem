<?php

namespace App\Http\Controllers;

use App\ModConvenio;
use crocodicstudio\crudbooster\helpers\CRUDBooster;
use Illuminate\Http\Request;
//use App\Http\Requests;
use App\ModPaciente;
use App\ModMedico;
use DB;
use App\ModCitaQuirofano;
use App\ModNotifications;

class AdminAgendaMedicoCirugiaController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAgenda() {
        $medicoId = ModMedico::where("cms_user_id", CRUDBooster::myId())->first();

        $medico = ModMedico::find($medicoId->id);

        $page_title = "Agendar Cirugías";

        return view('agenda_quirofano.medico_index', compact('page_title'));
        
    }

    /**
     * Show the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Show($id, ModNotifications $idNotification) {
        $cita =  ModCitaQuirofano::where("id", $id)
                ->with("paciente")
                ->with("residente")
                ->with("anesteciologo")
                ->with("quirofano")
                ->first();
        $idNotification->is_read = 1;
        $idNotification->save();
        $page_title = "Cirugía";
        return view('agenda_quirofano.show_event', compact('page_title'), ["cita" => $cita]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getEvents(Request $request) {
        $medicoId = ModMedico::where("cms_user_id", CRUDBooster::myId())->first();

        $citas = ModCitaQuirofano::where("estado_cita", 1)
                ->where("id_medico", $medicoId->id)
                ->where("trash", null)
                ->orWhere("trash", "=", 0) // los que no estan en papelera
                ->with("paciente")
                ->with("medico")
                ->with("residente")
                ->with("anesteciologo")
                ->with("quirofano")
                ->get();

        return ($citas);
    }

}
