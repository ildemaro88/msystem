<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModOrdenExamenes extends Model
{
  protected $table= 'orden_examen';
  protected $primaryKey = 'id';
  protected $fillable = [
      'id_orden',
      'id_medico',
      'id_paciente',
      'observacion',
      'fecha'
  ];

  public function scopeExamenes($query, $id){
        return $query->where('id_orden',$id)->select('id_examen');
  }

}
