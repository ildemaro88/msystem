<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModReceta extends Model
{
    protected $table ="receta";
    protected $primaryKey ="id";
    protected $fillable =[
        "id_consulta",
        "descripcion",
        "cod_vademecum"
    ];
}
