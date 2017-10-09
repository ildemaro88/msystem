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
use App\Mail\EmailPacienteCirugia;
use App\Mail\EmailMedicoCirugia;
use App\HorarioMedico;
use App\ModAsistenteCirugia;
use App\ModQuirofano;
use App\Mail\EmailMedicoResident;
use App\Mail\EmailMedicoAnesthesiologist;
use Mail;
use Carbon\Carbon;
use DateTime;
use App\ModNotifications;
use App\CmsUser;

class AdminAgendaQuirofanoCirugiaController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAgendaSalle($id) {
        $salle = ModQuirofano::find($id);

        $page_title = "Agendar Cirugías" . " Para El Qurifano: " . strtoupper($salle->name);

        return view('agenda_quirofano.create', compact('page_title'), ["idSalle" => $id]);
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
                    "response" => $getPacientes
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
                    "response" => $getDoctors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAssistants(Request $request, $value, $type) {

        $assistants = ModAsistenteCirugia::where(DB::raw('concat(nombre,apellido)'), 'LIKE', "%{$value}%")
                        ->where('id_asistente_tipo', '=', $type)->get();
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
                    "response" => $getAssistants
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSallesForIndex(Request $request) {

        $salles = ModQuirofano::all();
        $getSalles = array();
        foreach ($salles as $salle) {
            $getSalle = array();
            $getSalle["id"] = $salle["id"];
            $getSalle["name"] = $salle["name"];
            $getSalles[] = $getSalle;
            //$response[] = $getPacientes;
        }
        return response()->json([
                    "response" => $getSalles
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
                    "response" => $getSalles
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

        $cita = ModCitaQuirofano::find($id);
        $cita->start = $request->get("start");
        $cita->end = $request->get("end");
        $cita->start_datetime = new DateTime($cita->start);
        $cita->end_datetime = new DateTime($cita->end);
        $cita->color = $request->get("color");
        $result = $cita->save();

        $resident = ModAsistenteCirugia::find($cita->id_residente);
        $anesthesiologist = ModAsistenteCirugia::find($cita->id_anesteciologo);
        $medico = ModMedico::find($cita->id_medico);
        try {
            $notification = $this->sendNotifications("Cita Modificada", $cita->id, $medico, $resident, $anesthesiologist);
            $response = $notification;
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
        $cita->process = $request->get("process");

        $medico = ModMedico::find($request->get("idDoctor"));
        $cita->title = ($medico->titulo . " " . $medico->nombre . " " . $medico->apellido . ", Paciente:  " . $paciente->nombre . " " . $paciente->apellido);
        //var_dump($cita);
        $response = $cita->save();

        if ($response) {// si se guarda la cita
            /*
             * Envio de e-mail cuando se guarda la cita
             * */
            $resident = ModAsistenteCirugia::find($request->get("idResident"));
            $anesthesiologist = ModAsistenteCirugia::find($request->get("idAnesthesiologist"));
            $email_medico = !is_null($medico->email) ? $medico->email : "felipe.vinoles@gmail.com";
            $email_paciente = !is_null($paciente->email) ? $paciente->email : "felipe.vinoles@gmail.com";
            $email_resident = !is_null($resident->email) ? $resident->email : "felipe.vinoles@gmail.com";
            $email_anesthesiologist = !is_null($anesthesiologist->email) ? $anesthesiologist->email : "felipe.vinoles@gmail.com";
            try {
                $notification = $this->sendNotifications("Nueva Cita", $cita->id, $medico, $resident, $anesthesiologist);
                if ($notification) {
                    Mail::to(trim($email_paciente))->send(new EmailPacienteCirugia($paciente, $medico, $cita));
                    Mail::to(trim($email_medico))->send(new EmailMedicoCirugia($medico, $paciente, $cita));
                    Mail::to(trim($email_resident))->send(new EmailMedicoResident($resident, $medico, $cita));
                    Mail::to(trim($email_anesthesiologist))->send(new EmailMedicoAnesthesiologist($anesthesiologist, $medico, $cita));
                }
                $status = $notification;
            } catch (\Error $x) {
                $status = false;
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


        $cita = ModCitaQuirofano::find($id);
        $paciente = ModPaciente::find($request->get("idPatient"));
        $medico = ModMedico::find($request->get("idDoctor"));
        $cita->estado = 5;
        $cita->color = $request->get("color");
        $cita->detalle_cita = $request->get("descripcion");
        $cita->estado_cita = 1;
        $cita->start_datetime = new DateTime($cita->start);
        $cita->end_datetime = new DateTime($cita->end);
        $cita->id_medico = $request->get("idDoctor");
        $cita->id_paciente = $request->get("idPatient");
        $cita->id_quirofano = $request->get("idSalle");
        $cita->id_residente = $request->get("idResident");
        $cita->id_anesteciologo = $request->get("idAnesthesiologist");
        $cita->process = $request->get("process");

        $response = $cita->save();
        if ($response) {// si se guarda la cita
            /*
             * Envio de e-mail cuando se guarda la cita
             * */
            $resident = ModAsistenteCirugia::find($request->get("idResident"));
            $anesthesiologist = ModAsistenteCirugia::find($request->get("idAnesthesiologist"));
            try {
                $notification = $this->sendNotifications("Cita Modificada", $cita->id, $medico, $resident, $anesthesiologist);
                $response = $notification;
            } catch (\Error $x) {
                $response = false;
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
    public function destroy($id) {
        $cita = ModCitaQuirofano::findOrFail($id);
        $cita->trash = 1;
        $response = $cita->save();
        $resident = ModAsistenteCirugia::find($cita->id_residente);
        $anesthesiologist = ModAsistenteCirugia::find($cita->id_anesteciologo);
        $medico = ModMedico::find($cita->id_medico);
        try {
            $notification = $this->sendNotifications("Cita Cancelada", $cita->id, $medico, $resident, $anesthesiologist);
            $response = $notification;
        } catch (\Error $x) {
            $response = false;
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
    public function getEvents(Request $request, $idSalle) {

        $citas = ModCitaQuirofano::where("estado_cita", 1)
                ->where("id_quirofano", $idSalle)
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

    private function sendNotifications($content, $idCita, ModMedico $doctor, ModAsistenteCirugia $resident, ModAsistenteCirugia $anesthesiologist) {
        try {
            $userDoctor = CmsUser::where("id", $doctor->cms_user_id)->first();
            //Create notification
            $notificationDoctor = new ModNotifications();
            $notificationDoctor->id_cms_users = $userDoctor->id;
            $notificationDoctor->content = $content;
            $notificationDoctor->is_read = 0;

            $userResident = CmsUser::where("id", $resident->cms_user_id)->first();
            $notificationResident = new ModNotifications();
            $notificationResident->id_cms_users = $userResident->id;
            $notificationResident->content = $content;
            $notificationResident->is_read = 0;

            $userAnesthesiologist = CmsUser::where("id", $anesthesiologist->cms_user_id)->first();
            $notificationAnesthesiologist = new ModNotifications();
            $notificationAnesthesiologist->id_cms_users = $userAnesthesiologist->id;
            $notificationAnesthesiologist->content = $content;
            $notificationAnesthesiologist->is_read = 0;
            //salvar notificaciones 

            $notificationDoctor->save();
            $notificationResident->save();
            $notificationAnesthesiologist->save();

            $notificationDoctor->url = url('/admin/medico/agenda/cirugia/event/' . $idCita . '/' . $notificationDoctor->id);
            $notificationResident->url = url('/admin/medico/agenda/cirugia/event/' . $idCita . '/' . $notificationResident->id);
            $notificationAnesthesiologist->url = url('/admin/medico/agenda/cirugia/event/' . $idCita . '/' . $notificationAnesthesiologist->id);

            $notificationDoctor->save();
            $notificationResident->save();
            $notificationAnesthesiologist->save();
            $status = true;
        } catch (\Error $x) {

            $status = false;
        }
        return $status;
    }

}
