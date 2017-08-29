<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModExamen extends Model
{
    protected $table= 'examen';
	protected $primaryKey = 'id';
	protected $fillable = [
	  'slug',
	  'nombre',
	  'descripcion',
	  'id_categoria_examen'
	];

	public function categoria() {
	  return $this->hasOne('\App\ModCategoriaExamen','id','id_categoria_examen');
	}
}
