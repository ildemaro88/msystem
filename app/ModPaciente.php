<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModPaciente extends Model
{
    protected $table= 'paciente';
    protected $primaryKey = 'id';
    protected $fillable = [
        'cedula',
        'nombre',
        'apellido',
    ];
    //public $timestamps = false;
    public function cms_user(){
        return $this->belongsTo('\App\CmsUser');
    }

}
