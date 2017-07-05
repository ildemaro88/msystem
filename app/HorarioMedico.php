<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HorarioMedico extends Model
{
    protected $table = "horario_medico";
    protected $primaryKey = "id";
    protected $fillable = [
    	"medico_id",
    	"dow",
    	"start",
    	"end",
    	"start_t",
    	"end_t"
    ];
    public $timestamps=false;
}
