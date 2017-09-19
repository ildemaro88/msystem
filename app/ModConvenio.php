<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModConvenio extends Model
{
    protected $table ="convenio_paciente";
    protected $primaryKey = "id";
    protected $fillable = [
        "cita_calendario_id",
        "autorizacion",
        "fecha_autorizacion",
        "fecha_vence",
        "id_convenio",
    ];
    public $timestamps = false;
}
