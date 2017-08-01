<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModEmpresa extends Model
{
    protected $table='empresa'; 
	protected $primaryKey='id';
	protected $fillable=[
		'nombre',
		'ruc',
		'telefono',
		'correo',
		'direccion',
		'id_convenio',
		'id_padre'
 	];
	 protected $guarded=[]; 
}
