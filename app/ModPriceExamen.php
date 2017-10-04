<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModPriceExamen extends Model {

    protected $table = "precio_examen";
    protected $primaryKey = "id";
    protected $fillable = [
        'id_empresa',
        'id_examen',
        'precio',
    ];
}
