<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModOrdenExamenes extends Model
{
  protected $table= 'orden_examen';
  protected $primaryKey = 'id';
  protected $fillable = [
      'id_orden',
      'id_examen',
      'observacion',
      'id_estado'
  ];

  
public function examen() {
	  return $this->hasOne('\App\ModExamen','id','id_examen');
}


}
