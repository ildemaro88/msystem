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
        'pasaporte',
        'otro',
        'fecha_nac',
        'lugar_nac',
        'raza',
        'instruccion',
        'sexo',
        'estado_civil',
        'email',
        'direccion',
        'telf_domicilio',
        'telf_trabajo',
        'celular',
        'referencia',
        'telf_referencia',
        'id_empresa'
    ];
    //public $timestamps = false;
    public function cms_user(){
        return $this->belongsTo('\App\CmsUser','id_paciente');
    }

    public function ordenes(){
        return $this->hasMany('\App\ModOrden','id_paciente');
    }

    public function consultas(){
        return $this->hasMany('\App\ModConsulta','id_paciente');
    }

}
