<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModCita extends Model
{
    protected $table ="cita_calendario";
    protected $primaryKey ="id";
    protected $fillable =[
        "paciente_id",
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
        "sel_convenio",
        "constraint"
    ];
    public function agenda(){
        return $this->belongsTo('\App\ModAgenda');
    }
    public function paciente(){
        return $this->belongsTo('\App\ModPaciente',"paciente_id","id");
    }
    public function convenio(){
        return $this->hasOne('\App\ModConvenio',"cita_calendario_id");
    }
}
