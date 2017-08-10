<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModOrden extends Model
{
    protected $table= 'orden';
	protected $primaryKey = 'id';
	protected $fillable = [
	  'id_paciente',
	  'id_medico',
	  'id_tipo_orden',
	  'fecha'
	];



    public function examenes(){
        return $this->hasMany('\App\ModOrdenExamenes','id_orden');
    }
}
