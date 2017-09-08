<?php

namespace App\Http\Controllers;

use App\ModConvenio;
use crocodicstudio\crudbooster\helpers\CRUDBooster;
use Illuminate\Http\Request;
//use App\Http\Requests;
use App\ModPaciente;
use App\ModMedico;
use App\ModAgenda;
use App\ModCita;
use App\ModConvenios;
use App\Mail\EmailPaciente;
use App\Mail\EmailMedico;
use App\HorarioMedico;
use Mail;
use Carbon\Carbon;

class AdminAgendaController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $medico_id = ModMedico::where("cms_user_id", CRUDBooster::myId())->first();
        //$paciente = ModPaciente::all();
        $medico = ModMedico::find($medico_id->id);
        $convenios = ModConvenios::all();
        $page_title = "Agendar Cita";
        $horario_medico = HorarioMedico::where("medico_id", $medico->id)->get();
        $agenda = ModAgenda::where("medico_id", $medico->id)->first();

        return view('agenda.create', compact('page_title'), ["convenios" => $convenios, "paciente" => $paciente, "agenda" => $agenda, "medico" => $medico, "horario_medico" => $horario_medico]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function testAgenda() {
        $medico_id = ModMedico::where("cms_user_id", CRUDBooster::myId())->first();
        $paciente = ModPaciente::all();
        $medico = ModMedico::find($medico_id->id);
        $convenios = ModConvenios::all();
        $page_title = "Agendar Cita";
        $horario_medico = HorarioMedico::where("medico_id", $medico->id)->get();
        $agenda = ModAgenda::where("medico_id", $medico->id)->first();

        return view('agenda.create_test', compact('page_title'), ["convenios" => $convenios, "paciente" => $paciente,
            "agenda" => $agenda, "medico" => $medico,
            "horario_medico" => $horario_medico]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPatients(Request $request, $value) {

        $pacientes = ModPaciente::where("nombre", "LIKE", "%{$value}%")->orWhere("cedula", "LIKE", "%{$value}%")->get();
        $getPacientes = array();
        foreach ($pacientes as $paciente) {
            $getPaciente = array();
            $getPaciente["id"] = $paciente["id"];
            $getPaciente["ci"] = $paciente["cedula"];
            $getPaciente["name"] = $paciente["nombre"];
            $getPacientes[] = $getPaciente;
            $response["patients"] = $getPacientes;
        }
        return response()->json([
                    "response" => $response
        ]);
    }
    
        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAgreements(Request $request, $value) {

        $agreements = ModConvenios::where("nombre", "LIKE", "%{$value}%")->get();
        $getAgreements = array();
        foreach ($agreements as $agreement) {
            $getAgreement = array();
            $getAgreement["id"] = $agreement["id"];
            $getAgreement["name"] = $agreement["nombre"];
            $getAgreements[] = $getAgreement;
            $response["agreements"] = $getAgreements;
        }
        return response()->json([
                    "response" => $response
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDataJson() {
        $medico_id = ModMedico::where("cms_user_id", CRUDBooster::myId())->first();
      
        //   $medico = ModMedico::find($medico_id->id);
        $convenios = ModConvenios::all();
        $horario_medicos = HorarioMedico::where("medico_id", $medico_id->id)->get();
        $horarios = array();

        foreach ($horario_medicos as $horario_medico) {
            $getHorario = array();
            $getHorario['dow'] = array($horario_medico['dow']);
            $getHorario['start'] = $horario_medico['start']; // 8am
            $getHorario['end'] = $horario_medico['end']; // 6pm);
            $horarios[] = $getHorario;
        }
        //  HORARIO_TRABAJO = HORARIO_TRABAJO.length > 0 ? HORARIO_TRABAJO :false;
        $agenda = ModAgenda::where("medico_id", $medico_id->id)->first();
        $getAgenda = array();
        $getAgenda["id"] = $agenda["id"];
        $getAgenda["nombre"] = $agenda["nombre"];
        $medico = array();
        $medico["id"] = $medico_id->id;
        $response["medico"] = $medico;
        $response["convenios"] = $convenios;
        $response["horario_medico"] = $horarios;
        $response["agenda"] = $getAgenda;
        
        return response()->json([
                    "response" => $response
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        if ($request->get("color") == "#7f8c8d") { // si se cumple el color, es la accion cancelar cita
            $cita = ModCita::findOrFail($request->get("cita_id"));
            $cita->color = $request->get("color");
            $response = $cita->save();
        } else {
            $cita = new ModCita;
            $paciente = ModPaciente::find($request->get("idpaciente"));
            $cita->paciente_id = $request->get("idpaciente");
            $cita->detalle_cita = $request->get("descripcion");
            $cita->agenda_id = $request->get("agenda_id");
            $cita->estado_cita = 1;
            $cita->start = $request->get("start");
            $cita->end = $request->get("end");
            $cita->constraint = $request->get("constraint");
            $sel_convenio = $request->get("sel_convenio");
            // $sel_convenio = $sel_convenio[1];
            $cita->sel_convenio = $sel_convenio;
            if (is_null($request->get("agenda_id"))) { //si es null viene por solicitud de usuario
                $a = ModAgenda::where("medico_id", "=", $request->get('medico_id'))->first();
                $agenda_id = $a->id;
                $cita->agenda_id = $agenda_id;
            } else { //si tiene valor viene por solicitud de call center
                $agenda_id = $request->get('agenda_id');
                $cita->agenda_id = $agenda_id;
            }
            $medico = ModMedico::find($request->get("medico_id"));
            $cita->title = ($medico->titulo . " " . $medico->nombre . " " . $medico->apellido . ", Paciente:  " . $paciente->nombre . " " . $paciente->apellido);
            //var_dump($cita);
            $response = $cita->save();

            if ($response) {// si se guarda la cita
                if ($sel_convenio != "PARTICULAR" && !is_null($request->get("fecha_autorizacion")) && !is_null($request->get("fecha_vence"))) { // si el convenio es I.E.S.S.
                    /*
                     * Insertar el convenio si se ingresa datos
                     * */
                    $convenio = new ModConvenio;
                    $convenio->cita_calendario_id = $cita->id;
                    $convenio->autorizacion = $request->get("autorizacion");
                    $date1 = Carbon::createFromFormat("d/m/Y", $request->get("fecha_autorizacion"))->format("Y-m-d");
                    $date2 = Carbon::createFromFormat("d/m/Y", $request->get("fecha_vence"))->format("Y-m-d");
                    $convenio->fecha_autorizacion = $date1;
                    $convenio->fecha_vence = $date2;
                    $convenio->save();
                }
                /*
                 * Envio de e-mail cuando se guarda la cita
                 * */
                $email_medico = !is_null($medico->email) ? $medico->email : "pablodc002@gmail.com";
                $email_paciente = !is_null($paciente->email) ? $paciente->email : "pablodc002@gmail.com";
                try {
                    Mail::to(trim($email_paciente))->send(new EmailPaciente($paciente, $medico, $cita));
                    Mail::to(trim($email_medico))->send(new EmailMedico($medico, $paciente, $cita));
                } catch (\Error $x) {
                    
                }
            }
        }
        return response()->json([
                    "response" => $response,
                    "cita" => $cita
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id) {
        $medico = ModMedico::find($id);
        //dd($medico);
        return view('agenda.index', ["medico" => $medico]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $agenda = ModAgenda::where("medico_id", $id)->first();
        $paciente = ModPaciente::all();
        $convenios = ModConvenios::all();
        $medico = ModMedico::find($id);
        $horario_medico = HorarioMedico::where("medico_id", $medico->id)->get();
        $page_title = "Agendar Cita";
        return view('agenda.create', compact('page_title'), ["convenios" => $convenios, "paciente" => $paciente, "agenda" => $agenda, "medico" => $medico, "horario_medico" => $horario_medico]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
