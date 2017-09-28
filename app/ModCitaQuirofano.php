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
        "process",
        "constraint",
        "id_medico",
        "id_paciente",
        "id_quirofano",
        "id_residente",
        "id_anesteciologo",
    ];

    public function paciente() {
        return $this->belongsTo('\App\ModPaciente',"id_paciente", "id");
    }

    public function medico() {
        return $this->belongsTo('\App\ModMedico',"id_medico", "id");
    }

    public function residente() {
        return $this->belongsTo('\App\ModAsistenteCirugia',"id_residente", "id");
    }

    public function anesteciologo() {
        return $this->belongsTo('\App\ModAsistenteCirugia',"id_anesteciologo", "id");
    }
    public function quirofano() {
        return $this->belongsTo('\App\ModQuirofano', "id_quirofano", "id");
    }
}
