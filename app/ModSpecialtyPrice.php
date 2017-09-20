<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModSpecialtyPrice extends Model
{
    protected $table= 'precio_especialidad';
	protected $primaryKey = 'id';
	protected $fillable = [
	  'id_empresa',
	  'id_especialidad',
          'precio'
	];
}
