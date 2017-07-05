<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModEspecialidad extends Model
{
    protected $table ="especialidad";
    protected $primaryKey ="id";
    protected $fillable =[        
        "descripcion"
    ];
}
