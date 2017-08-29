<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModUsuarioEmpresa extends Model
{
    protected $table='usuario_empresa'; 
	protected $primaryKey='id';
	protected $fillable=[
		'id_empresa',
		'id_cms_users'
 	];
	 protected $guarded=[]; 

	
}
