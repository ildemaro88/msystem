<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModTipoExamen extends Model {

    protected $table = 'tipo_examen';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nombre'
    ];

    public function categorias() {
        return $this->hasMany('\App\ModCategoriaExamen', "id_tipo_examen");
    }

}
