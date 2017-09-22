<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModConvenios extends Model
{
    protected $table ="convenio";
    protected $primaryKey ="id";
    protected $fillable =[        
        "nombre"
    ];
    
       public function empresas(){
        return $this->hasMany('\App\ModEmpresa','id_convenio');
    }
}
