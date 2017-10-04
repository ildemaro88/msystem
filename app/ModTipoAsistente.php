<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModTipoAsistente extends Model {

    protected $table = "tipo_asistente";
    protected $primaryKey = "id";
    protected $fillable = [
        'description'
    ];
}
