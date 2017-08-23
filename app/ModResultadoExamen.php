<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModResultadoExamen extends Model
{
    protected $table= 'resultado_examen';
	protected $primaryKey = 'id';
	protected $fillable = [
	  'id_orden',
	  'archivo'	  
	];
}
