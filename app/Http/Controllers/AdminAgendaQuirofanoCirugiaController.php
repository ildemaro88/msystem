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
use App\ModConvenios;
use App\Mail\EmailPaciente;
use App\Mail\EmailMedico;
use App\HorarioMedico;
use App\ModSpecialtyPrice;
use App\ModPayment;
use App\ModTypePayment;
use App\ModAsistenteCirugia;
use App\ModQuirofano;
use Mail;
use Carbon\Carbon;
use DateTime;



class AdminAgendaQuirofanoCirugiaController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $page_title = "Agendar Cirugías";

        return view('agenda_quirofano.create', compact('page_title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPatients(Request $request, $value) {

        $pacientes = ModPaciente::where(DB::raw('concat(cedula,nombre,apellido)'), 'LIKE', "%{$value}%")->get();
        $getPacientes = array();
        foreach ($pacientes as $paciente) {
            $getPaciente = array();
            $getPaciente["id"] = $paciente["id"];
            $getPaciente["ci"] = $paciente["cedula"];
            $getPaciente["name"] = $paciente["nombre"];
            $getPaciente["apellido"] = $paciente["apellido"];
            $getPaciente["empresa"] = $paciente["empresa"];
            $getPacientes[] = $getPaciente;
            //$response[] = $getPacientes;
        }
        return response()->json([
                    "response" =>  $getPacientes
        ]);
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDoctors(Request $request, $value) {

        $doctors = ModMedico::where(DB::raw('concat(nombre,apellido)'), 'LIKE', "%{$value}%")->get();
        $getDoctors = array();
        foreach ($doctors as $doctor) {
            $getDoctors = array();
            $getDoctor["id"] = $doctor["id"];
            $getDoctor["name"] = $doctor["nombre"];
            $getDoctor["apellido"] = $doctor["apellido"];
            $getDoctors[] = $getDoctor;
            //$response[] = $getPacientes;
        }
        return response()->json([
                    "response" =>  $getDoctors
        ]);
    }
    
    
        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAssistants(Request $request, $value,$type) {

        $assistants = ModAsistenteCirugia::where(DB::raw('concat(nombre,apellido)'), 'LIKE', "%{$value}%")
                 ->where('id_asistente_tipo','=', $type)->get();
        $getAssistants = array();
        foreach ($assistants as $assistant) {
            $getAssistant = array();
            $getAssistant["id"] = $assistant["id"];
            $getAssistant["name"] = $assistant["nombre"];
            $getAssistant["apellido"] = $assistant["apellido"];
            $getAssistants[] = $getAssistant;
            //$response[] = $getPacientes;
        }
        return response()->json([
                    "response" =>  $getAssistants
        ]);
    }
    
    
            /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSalles(Request $request, $value) {

        $salles = ModQuirofano::where('name', 'LIKE', "%{$value}%")->get();
        $getSalles = array();
        foreach ($salles as $salle) {
            $getSalle = array();
            $getSalle["id"] = $salle["id"];
            $getSalle["name"] = $salle["name"];
            $getSalles[] = $getSalle;
            //$response[] = $getPacientes;
        }
        return response()->json([
                    "response" =>  $getSalles
        ]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDataJson($id) {
        $medico_id = ModMedico::where("id", $id)->first();

        //   $medico = ModMedico::find($medico_id->id);
        $convenios = ModConvenios::all();
        foreach ($convenios as $convenio) {
            $getConvenio = array();
            $getConvenio['id'] = intval($convenio['id']);
            $getConvenio['name'] = $convenio['nombre'];
            $getConvenios[] = $getConvenio;
        }

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
        $medico["especialidad"] = $medico_id->especialidad;
        $response["medico"] = $medico;
        $response["convenios"] = $getConvenios;
        $response["horario_medico"] = $horarios;
        $response["agenda"] = $getAgenda;

        return response()->json([
                    "response" => $response
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateEventDrop(Request $request, $id) {
        $cita = ModCita::find($id);
        $cita->start = $request->get("start");
        $cita->end = $request->get("end");
        $cita->start_datetime = new DateTime($cita->start);
        $cita->end_datetime = new DateTime($cita->end);
        $cita->color = $request->get("color");
        $result = $cita->save();
        try {
            $response = true;
        } catch (\Error $x) {
            $response = false;
        }
        return response()->json([$response
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request) {
//        print_r( $request->all());

        $cita = new ModCitaQuirofano;
        $paciente = ModPaciente::find($request->get("idPatient"));
        $cita->estado = 5;
        $cita->color = $request->get("color");
        $cita->detalle_cita = $request->get("descripcion");
        $cita->estado_cita = 1;
        $cita->start = $request->get("start");
        $cita->end = $request->get("end");
        $cita->start_datetime = new DateTime($cita->start);
        $cita->end_datetime = new DateTime($cita->end);
        $cita->id_medico = $request->get("idDoctor");
        $cita->id_paciente = $request->get("idPatient");
        $cita->id_quirofano = $request->get("idSalle");
        $cita->id_residente = $request->get("idResident");
        $cita->id_anesteciologo = $request->get("idAnesthesiologist");

        $medico = ModMedico::find($request->get("idDoctor"));
        $cita->title = ($medico->titulo . " " . $medico->nombre . " " . $medico->apellido . ", Paciente:  " . $paciente->nombre . " " . $paciente->apellido);
        //var_dump($cita);
        $response = $cita->save();

        if ($response) {// si se guarda la cita
            /*
             * Envio de e-mail cuando se guarda la cita
             * */
            $email_medico = !is_null($medico->email) ? $medico->email : "felipe.vinoles@gmail.com";
            $email_paciente = !is_null($paciente->email) ? $paciente->email : "felipe.vinoles@gmail.com";
            try {
            $status = true;
//                Mail::to(trim($email_paciente))->send(new EmailPaciente($paciente, $medico, $cita));
//                Mail::to(trim($email_medico))->send(new EmailMedico($medico, $paciente, $cita));
            } catch (\Error $x) {
                $status = false;
                echo $x->getMessage();
            }
        }
        return response()->json([
                    "response" => $status
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {


        $cita = ModCita::find($id);
        $cita->paciente_id = $request->get("idpaciente");
        $cita->detalle_cita = $request->get("descripcion");
        $cita->agenda_id = $request->get("agenda_id");
        $sel_convenio = $request->get("sel_convenio");
        if (is_null($request->get("agenda_id"))) { //si es null viene por solicitud de usuario
            $a = ModAgenda::where("medico_id", "=", $request->get('medico_id'))->first();
            $agenda_id = $a->id;
            $cita->agenda_id = $agenda_id;
        } else { //si tiene valor viene por solicitud de call center
            $agenda_id = $request->get('agenda_id');
            $cita->agenda_id = $agenda_id;
        }//var_dump($cita);
        $response = $cita->save();
        $convenio = ModConvenio::where("cita_calendario_id", $cita->id)->first();
        if ($response) {// si se guarda la cita
            if ($sel_convenio > 1 && !is_null($request->get("fecha_autorizacion")) && !is_null($request->get("fecha_vence"))) { // si el convenio es I.E.S.S.
                $convenio->autorizacion = $request->get("autorizacion");
                $date1 = Carbon::createFromFormat("d/m/Y", $request->get("fecha_autorizacion"))->format("Y-m-d");
                $date2 = Carbon::createFromFormat("d/m/Y", $request->get("fecha_vence"))->format("Y-m-d");
                $convenio->fecha_autorizacion = $date1;
                $convenio->fecha_vence = $date2;
                $convenio->id_convenio = $sel_convenio;
                $convenio->save();
            } else {
                $convenio->autorizacion = $request->get("autorizacion");
                $convenio->fecha_autorizacion = "";
                $convenio->fecha_vence = "";
                $convenio->id_convenio = $sel_convenio;
                $convenio->save();
            }
           // $typePayment = ModTypePayment::find(1);
            $payment =  ModPayment::where("parent_id", $cita->id)->first();
            if($request->get("status_price") == "true"){
                $status = true;
            }else{
                $status = false; 
            }
            $payment->status =  $status;
            $payment->aumont = $request->get("price");
            $payment->save();
            /*
             * Envio de e-mail cuando se guarda la cita
             * */
            $email_medico = !is_null($medico->email) ? $medico->email : "pablodcd002@gmail.com";
            $email_paciente = !is_null($paciente->email) ? $paciente->email : "pabloddc002@gmail.com";
            try {
                Mail::to(trim($email_paciente))->send(new EmailPaciente($paciente, $medico, $cita));
                Mail::to(trim($email_medico))->send(new EmailMedico($medico, $paciente, $cita));
            } catch (\Error $x) {
                
            }
        }
        return response()->json([
                    "response" => $response,
                    "cita" => $cita
        ]);
    }

   /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cita = ModCitaQuirofano::findOrFail($id);
        $cita->trash = 1;
        $response = $cita->save();

        return response()->json([
            "response"=>$response
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getEvents(Request $request) {

        $citas = ModCitaQuirofano::where("estado_cita",1)
            ->where("trash",null)
            ->orWhere("trash","=",0) // los que no estan en papelera
            ->with("paciente")
            ->with("medico")
            ->with("residente")
            ->with("anesteciologo")
            ->with("quirofano")
            ->get();

        return ($citas);
    }

}
