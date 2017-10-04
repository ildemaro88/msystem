<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModOptometria extends Model 
{
	protected $table='optometria'; 
	protected $primaryKey='id';
	protected $fillable=[
		'id_paciente',
		'id_medico',
		'cb_vacunas',
		'cb_alergica',
		'cb_neurologica',
		'cb_traumatologica',
		'cb_tendsexual',
		'cb_actsexual',
		'cb_perinatal',
		'cb_cardiaca',
		'cb_metabolica',
		'cb_quirurgica',
		'cb_riesgosocial',
		'cb_dietahabitos',
		'cb_infancia',
		'cb_respiratoria',
		'cb_hemolinf',
		'cb_mental',
		'cb_riesgolaboral',
		'cb_religioncultura',
		'cb_adolecente',
		'cb_digestiva',
		'cb_urinaria',
		'cb_tsexual',
		'cb_riesgofamiliar',
		'cb_otro',
		'cb_cardiopatia',
		'cb_diabetes',
		'cb_enfvasculares',
		'cb_hta',
		'cb_cancer',
		'cb_tuberculosis',
		'cb_enfenfmental',
		'cb_enfinfecciosa',
		'cb_malformacion',
		'cb_afotro',
		'txt_od_vl_sc',
		'txt_od_vp_sc',
		'txt_od_vl_cc',
		'txt_od_vp_cc',
		'txt_od_vp_ph',
		'txt_oi_vl_sc',
		'txt_oi_vp_sc',
		'txt_oi_vl_cc',
		'txt_oi_vp_cc',
		'txt_oi_vp_ph',
		'txt_ao_vl_sc',
		'txt_ao_vp_sc',
		'txt_ao_vl_cc',
		'txt_ao_vp_cc',
		'txt_ao_vp_ph',
		'ultimo_control_visual',
		'usa_rx',
		'txt_lensometria_od_esfera',
		'txt_lensometria_od_cilindro',
		'txt_lensometria_od_eje',
		'txt_lensometria_od_avl',
		'txt_lensometria_od_avc',
		'txt_lensometria_oi_esfera',
		'txt_lensometria_oi_cilindro',
		'txt_lensometria_oi_eje',
		'txt_lensometria_oi_avl',
		'txt_lensometria_oi_avc',
		'id_estado',
		'txt_retinoscopia_od_esfera',
		'txt_retinoscopia_od_cilindro',
		'txt_retinoscopia_od_eje',
		'txt_retinoscopia_od_avl',
		'txt_retinoscopia_od_avc',
		'txt_retinoscopia_oi_esfera',
		'txt_retinoscopia_oi_cilindro',
		'txt_retinoscopia_oi_eje',
		'txt_retinoscopia_oi_avl',
		'txt_retinoscopia_oi_avc',
		'txt_subjetivo_od_esfera',
		'txt_subjetivo_od_cilindro',
		'txt_subjetivo_od_eje',
		'txt_subjetivo_od_avl',
		'txt_subjetivo_od_avc',
		'txt_subjetivo_oi_esfera',
		'txt_subjetivo_oi_cilindro',
		'txt_subjetivo_oi_eje',
		'txt_subjetivo_oi_avl',
		'txt_subjetivo_oi_avc',
		'txt_distancia_od_esfera',
		'txt_distancia_od_cilindro',
		'txt_distancia_od_eje',
		'txt_distancia_od_dp',
		'txt_distancia_od_adicion',
		'txt_distancia_od_altura',
		'txt_distancia_oi_esfera',
		'txt_distancia_oi_cilindro',
		'txt_distancia_oi_eje',
		'txt_distancia_oi_dp',
		'txt_distancia_oi_adicion',
		'txt_distancia_oi_altura',
		'txt_cercano_od_esfera',
		'txt_cercano_od_cilindro',
		'txt_cercano_od_eje',
		'txt_cercano_od_dp',
		'txt_cercano_od_altura',
		'txt_cercano_oi_esfera',
		'txt_cercano_oi_cilindro',
		'txt_cercano_oi_eje',
		'txt_cercano_oi_dp',
		'txt_cercano_oi_altura',
		'rd_cover_test',
		'rd_test_ishihara',
		'rd_test_pupilar',
		'rd_fondo_de_ojo',
		'txtFechaAgendDoct',
		'nombremedico',
		'firmaDoc',
		'motivoConsulta',
		'txtAntePer',
		'txtNoRef',
		'txtProbActual',
		'txt_ojo_derecho',
		'txt_ojo_izquierdo',
		'txt_agudeza_visual',
		'txt_lensometria',
		'txt_retinoscopia',
		'txt_subjetivo',
		'txt_distancia',
		'txt_cercano',
		'txt_plan_diagnostico',
		'txt_disposiciones_finales'
 	];
	 protected $guarded=[]; 
}
