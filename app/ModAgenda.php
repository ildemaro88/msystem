<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModAgenda extends Model
{
    protected $table="agenda";
    protected $primaryKey="id";
    protected $fillable=[
        "nombre",
        "medico_id"
    ];

    public function medico(){
        return $this->belongsTo('\App\ModMedico');
    }
    public function cita(){
        return $this->hasMany('\App\ModCita','agenda_id');
    }
}
