<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModCategoriaExamen extends Model
{
    protected $table= 'categoria_examen';
	protected $primaryKey = 'id';
	protected $fillable = [
	  'nombre',
	  'id_tipo_examen'
	];

	public function tipo() {
	  return $this->hasOne('\App\ModTipoExamen','id','id_tipo_examen');
	}
}
