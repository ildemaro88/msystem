<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModEmpresa extends Model {

    protected $table = 'empresa';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nombre',
        'ruc',
        'logo',
        'telefono',
        'correo',
        'direccion',
        'id_convenio',
        'id_padre'
    ];
    protected $guarded = [];

    public function convenio() {
        return $this->hasOne('\App\ModConvenios', 'id', 'id_convenio');
    }

}
