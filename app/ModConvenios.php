<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModConvenios extends Model
{
    protected $table ="convenios";
    protected $primaryKey ="id";
    protected $fillable =[        
        "nombre"
    ];
}
