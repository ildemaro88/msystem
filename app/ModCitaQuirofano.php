<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModCitaQuirofano extends Model {

    protected $table = "agenda_cirugia";
    protected $primaryKey = "id";
    protected $fillable = [
        "detalle_cita",
        "agenda_id",
        "estado_cita",
        "start",
        "end",
        "start_datetime",
        "end_datetime",
        "title",
        "color",
        "trash",
        "estado",
        "constraint",
        "id_medico",
        "id_paciente",
        "id_residente",
        "id_residente",
        "id_anesteciologo",
    ];

    public function paciente() {
        return $this->hasOne('\App\ModPaciente', "id_paciente", "id");
    }

    public function medico() {
        return $this->hasOne('\App\ModMedico', "id_medico", "id");
    }

    public function residente() {
        return $this->hasOne('\App\ModAsistenteCirugia', 'id_residente', "id");
    }

    public function anesteciologo() {
        return $this->hasOne('\App\ModAsistenteCirugia', 'id_residente', "id");
    }
    public function quirofano() {
        return $this->hasOne('\App\ModQuirofano', 'id_quirofano', "id");
    }
}
