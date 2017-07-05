<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModCie extends Model
{
    protected $table ="cie";
    protected $primaryKey ="id";
    protected $fillable =[
        "cod_cie",
        "descripcion",
        "estado"
    ];
}
