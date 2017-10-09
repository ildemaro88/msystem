<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModAsistenteCirugia extends Model
{
    protected $table = "asistente_cirugia";
    protected $primaryKey = "id";
    
    protected $fillable = [
      "cedula",
      "nombre",
      "apellido",
      "telefono",
      "email",
      "id_asistente_tipo",
      "registro",
      'cms_user_id'
    ];
    
    public function tipoAsistente() {
        return $this->hasOne('\App\ModTipoAsistente ', 'id_asistente_tipo');
    }

}
