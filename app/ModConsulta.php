<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModConsulta extends Model
{
    protected $table='consulta';
	protected $primaryKey='id';
	protected $fillable=[
		'id_medico',
		'id_paciente',
		'motivoConsA',
		'motivoConsC',
		'motivoConsB',
		'motivoConsD',
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
		'cb_1CP',
		'cb_1SP',
		'cb_3CP',
		'cb_3SP',
		'cb_5CP',
		'cb_5SP',
		'cb_7CP',
		'cb_7SP',
		'cb_9CP',
		'cb_9SP',
		'cb_2CP',
		'cb_2SP',
		'cb_4CP',
		'cb_4SP',
		'cb_6CP',
		'cb_6SP',
		'cb_8CP',
		'cb_8SP',
		'cb_10CP',
		'cb_10SP',
		'ta',
		'fc',
		'fr',
		'sato2',
		'tempbuc',
		'peso',
		'glucem',
		'talla',
		'gm',
		'go',
		'gv',
		'cb_1RCP',
		'cb_1RSP',
		'cb_6RCP',
		'cb_6RSP',
		'cb_11RCP',
		'cb_11RSP',
		'cb_1SCP',
		'cb_1SSP',
		'cb_6SCP',
		'cb_6SSP',
		'cb_2RCP',
		'cb_2RSP',
		'cb_7RCP',
		'cb_7RSP',
		'cb_12RCP',
		'cb_12RSP',
		'cb_2SCP',
		'cb_2SSP',
		'cb_7SCP',
		'cb_7SSP',
		'cb_3RCP',
		'cb_3RSP',
		'cb_8RCP',
		'cb_8RSP',
		'cb_13RCP',
		'cb_13RSP',
		'cb_3SCP',
		'cb_3SSP',
		'cb_8SCP',
		'cb_8SSP',
		'cb_4RCP',
		'cb_4RSP',
		'cb_9RCP',
		'cb_9RSP',
		'cb_14RCP',
		'cb_14RSP',
		'cb_4SCP',
		'cb_4SSP',
		'cb_9SCP',
		'cb_9SSP',
		'cb_5RCP',
		'cb_5RSP',
		'cb_10RCP',
		'cb_10RSP',
		'cb_15RCP',
		'cb_15RSP',
		'cb_5sCP',
		'cb_5sSP',
		'cb_10sCP',
		'cb_10sSP',
		'txtCie1',
		'txtCod1',
		'cb_1PRE',
		'cb_1DEF',
		'txtCie4',
		'txtCod4',
		'cb_4PRE',
		'cb_4DEF',
		'txtCie2',
		'txtCod2',
		'cb_2PRE',
		'cb_2DEF',
		'txtCie5',
		'txtCod5',
		'cb_5PRE',
		'cb_5DEF',
		'txtCie3',
		'txtCod3',
		'cb_3PRE',
		'cb_3DEF',
		'txti3',
		'txtic3',
		'cb_6PRE',
		'cb_6DEF',
		'txtFechaAgendDoct',
		'nombremedico',
		'firmaDoc',
		'txtAntePer',
		'txtNoRef',
		'txtProbActual',
		'txtRevisOrgs',
		'txtExaFisico',
		'txtPlanTrat',
		'txtPlanDiagnostico',
		'id_estado'

 	];
	 protected $guarded=[];

	 public function recetas(){
        return $this->hasMany('\App\ModReceta','id_consulta');
    }
}

