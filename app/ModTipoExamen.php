<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModTipoExamen extends Model
{
    protected $table= 'tipo_examen';
	protected $primaryKey = 'id';
	protected $fillable = [
	  'nombre'	  
	];
}
