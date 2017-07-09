<?php namespace App\Http\Controllers;

  use Illuminate\Support\Facades\Session;
  use Illuminate\Http\Request;
  use CRUDBooster;
  use App\ModMedico;
  use Illuminate\Support\Facades\DB;
  use App\Http\Controllers\AdminCieController as Cie;
  use App\Http\Controllers\AdminRecetaController as Receta;
  use App\Http\Controllers\AdminVademecumController as vademecum;
  use App\ModPaciente;
  use App\ModConsulta;
  use Carbon\Carbon;
  use App\ModReceta;

	class AdminConsultasController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "id";
			$this->limit = "20";
			$this->orderby = "id,desc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_action_style = "button_icon";
			$this->button_add = true;
			$this->button_edit = true;
			$this->button_delete = true;
			$this->button_detail = true;
			$this->button_show = true;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "consultas";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Paciente","name"=>"paciente"];
			$this->col[] = ["label"=>"Medico","name"=>"medico"];
			$this->col[] = ["label"=>"Motivo Consulta","name"=>"motivoConsA"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Paciente',
  'name' => 'paciente',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Medico',
  'name' => 'medico',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'dataenum' => NULL,
  'datatable' => 'medico,id',
  'style' => NULL,
  'help' => NULL,
  'datatable_where' => NULL,
  'datatable_format' => NULL,
  'datatable_exception' => NULL,
  'label' => 'Medico',
  'name' => 'id_medico',
  'type' => 'select2',
  'validation' => 'required|integer|min:0',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'dataenum' => NULL,
  'datatable' => 'paciente,id',
  'style' => NULL,
  'help' => NULL,
  'datatable_where' => NULL,
  'datatable_format' => NULL,
  'datatable_exception' => NULL,
  'label' => 'Paciente',
  'name' => 'id_paciente',
  'type' => 'select2',
  'validation' => 'required|integer|min:0',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'motivoConsA',
  'name' => 'motivoConsA',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'motivoConsC',
  'name' => 'motivoConsC',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'motivoConsB',
  'name' => 'motivoConsB',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'motivoConsD',
  'name' => 'motivoConsD',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb Vacunas',
  'name' => 'cb_vacunas',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb Alergica',
  'name' => 'cb_alergica',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb Neurologica',
  'name' => 'cb_neurologica',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb Traumatologica',
  'name' => 'cb_traumatologica',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb Tendsexual',
  'name' => 'cb_tendsexual',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb Actsexual',
  'name' => 'cb_actsexual',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb Perinatal',
  'name' => 'cb_perinatal',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb Cardiaca',
  'name' => 'cb_cardiaca',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb Metabolica',
  'name' => 'cb_metabolica',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb Quirurgica',
  'name' => 'cb_quirurgica',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb Riesgosocial',
  'name' => 'cb_riesgosocial',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb Dietahabitos',
  'name' => 'cb_dietahabitos',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb Infancia',
  'name' => 'cb_infancia',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb Respiratoria',
  'name' => 'cb_respiratoria',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb Hemolinf',
  'name' => 'cb_hemolinf',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb Mental',
  'name' => 'cb_mental',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb Riesgolaboral',
  'name' => 'cb_riesgolaboral',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb Religioncultura',
  'name' => 'cb_religioncultura',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb Adolecente',
  'name' => 'cb_adolecente',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb Digestiva',
  'name' => 'cb_digestiva',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb Urinaria',
  'name' => 'cb_urinaria',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb Tsexual',
  'name' => 'cb_tsexual',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb Riesgofamiliar',
  'name' => 'cb_riesgofamiliar',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb Otro',
  'name' => 'cb_otro',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb Cardiopatia',
  'name' => 'cb_cardiopatia',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb Diabetes',
  'name' => 'cb_diabetes',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb Enfvasculares',
  'name' => 'cb_enfvasculares',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb Hta',
  'name' => 'cb_hta',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb Cancer',
  'name' => 'cb_cancer',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb Tuberculosis',
  'name' => 'cb_tuberculosis',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb Enfenfmental',
  'name' => 'cb_enfenfmental',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb Enfinfecciosa',
  'name' => 'cb_enfinfecciosa',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb Malformacion',
  'name' => 'cb_malformacion',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb Afotro',
  'name' => 'cb_afotro',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb 1CP',
  'name' => 'cb_1CP',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb 1SP',
  'name' => 'cb_1SP',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb 3CP',
  'name' => 'cb_3CP',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb 3SP',
  'name' => 'cb_3SP',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb 5CP',
  'name' => 'cb_5CP',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb 5SP',
  'name' => 'cb_5SP',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb 7CP',
  'name' => 'cb_7CP',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb 7SP',
  'name' => 'cb_7SP',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb 9CP',
  'name' => 'cb_9CP',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb 9SP',
  'name' => 'cb_9SP',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb 2CP',
  'name' => 'cb_2CP',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb 2SP',
  'name' => 'cb_2SP',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb 4CP',
  'name' => 'cb_4CP',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb 4SP',
  'name' => 'cb_4SP',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb 6CP',
  'name' => 'cb_6CP',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb 6SP',
  'name' => 'cb_6SP',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb 8CP',
  'name' => 'cb_8CP',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb 8SP',
  'name' => 'cb_8SP',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb 10CP',
  'name' => 'cb_10CP',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb 10SP',
  'name' => 'cb_10SP',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Ta',
  'name' => 'ta',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Fc',
  'name' => 'fc',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Fr',
  'name' => 'fr',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Sato2',
  'name' => 'sato2',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Tempbuc',
  'name' => 'tempbuc',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Peso',
  'name' => 'peso',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Glucem',
  'name' => 'glucem',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Talla',
  'name' => 'talla',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Gm',
  'name' => 'gm',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Go',
  'name' => 'go',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Gv',
  'name' => 'gv',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb 1RCP',
  'name' => 'cb_1RCP',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb 1RSP',
  'name' => 'cb_1RSP',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb 6RCP',
  'name' => 'cb_6RCP',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb 6RSP',
  'name' => 'cb_6RSP',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb 11RCP',
  'name' => 'cb_11RCP',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb 11RSP',
  'name' => 'cb_11RSP',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb 1SCP',
  'name' => 'cb_1SCP',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb 1SSP',
  'name' => 'cb_1SSP',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb 6SCP',
  'name' => 'cb_6SCP',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb 6SSP',
  'name' => 'cb_6SSP',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb 2RCP',
  'name' => 'cb_2RCP',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb 2RSP',
  'name' => 'cb_2RSP',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb 7RCP',
  'name' => 'cb_7RCP',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb 7RSP',
  'name' => 'cb_7RSP',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb 12RCP',
  'name' => 'cb_12RCP',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb 12RSP',
  'name' => 'cb_12RSP',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb 2SCP',
  'name' => 'cb_2SCP',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb 2SSP',
  'name' => 'cb_2SSP',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb 7SCP',
  'name' => 'cb_7SCP',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb 7SSP',
  'name' => 'cb_7SSP',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb 3RCP',
  'name' => 'cb_3RCP',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb 3RSP',
  'name' => 'cb_3RSP',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb 8RCP',
  'name' => 'cb_8RCP',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb 8RSP',
  'name' => 'cb_8RSP',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb 13RCP',
  'name' => 'cb_13RCP',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Cb 13RSP',
  'name' => 'cb_13RSP',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'label' => 'Cb 3SCP',
  'name' => 'cb_3SCP',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			# END FORM DO NOT REMOVE THIS LINE

			/* 
	        | ---------------------------------------------------------------------- 
	        | Sub Module
	        | ----------------------------------------------------------------------     
			| @label          = Label of action 
			| @path           = Path of sub module
			| @button_color   = Bootstrap Class (primary,success,warning,danger)
			| @button_icon    = Font Awesome Class  
			| @parent_columns = Sparate with comma, e.g : name,created_at
	        | 
	        */
	        $this->sub_module = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Action Button / Menu
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @url         = Target URL, you can use field alias. e.g : [id], [name], [title], etc
	        | @icon        = Font awesome class icon. e.g : fa fa-bars
	        | @color 	   = Default is primary. (primary, warning, succecss, info)     
	        | @showIf 	   = If condition when action show. Use field alias. e.g : [id] == 1
	        | 
	        */
	        $this->addaction = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Button Selected
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @icon 	   = Icon from fontawesome
	        | @name 	   = Name of button 
	        | Then about the action, you should code at actionButtonSelected method 
	        | 
	        */
	        $this->button_selected = array();

	                
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add alert message to this module at overheader
	        | ----------------------------------------------------------------------     
	        | @message = Text of message 
	        | @type    = warning,success,danger,info        
	        | 
	        */
	        $this->alert        = array();
	                

	        
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add more button to header button 
	        | ----------------------------------------------------------------------     
	        | @label = Name of button 
	        | @url   = URL Target
	        | @icon  = Icon from Awesome.
	        | 
	        */
	        $this->index_button = array();



	        /* 
	        | ---------------------------------------------------------------------- 
	        | Customize Table Row Color
	        | ----------------------------------------------------------------------     
	        | @condition = If condition. You may use field alias. E.g : [id] == 1
	        | @color = Default is none. You can use bootstrap success,info,warning,danger,primary.        
	        | 
	        */
	        $this->table_row_color = array();     	          

	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | You may use this bellow array to add statistic at dashboard 
	        | ---------------------------------------------------------------------- 
	        | @label, @count, @icon, @color 
	        |
	        */
	        $this->index_statistic = array();



	        /*
	        | ---------------------------------------------------------------------- 
	        | Add javascript at body 
	        | ---------------------------------------------------------------------- 
	        | javascript code in the variable 
	        | $this->script_js = "function() { ... }";
	        |
	        */
	        $this->script_js = NULL;



	        /*
	        | ---------------------------------------------------------------------- 
	        | Include Javascript File 
	        | ---------------------------------------------------------------------- 
	        | URL of your javascript each array 
	        | $this->load_js[] = asset("myfile.js");
	        |
	        */
	        $this->load_js = array();
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for button selected
	    | ---------------------------------------------------------------------- 
	    | @id_selected = the id selected
	    | @button_name = the name of button
	    |
	    */
	    public function actionButtonSelected($id_selected,$button_name) {
	        //Your code here
	            
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate query of index result 
	    | ---------------------------------------------------------------------- 
	    | @query = current sql query 
	    |
	    */
	    public function hook_query_index(&$query) {
	        $medico_id = ModMedico::where("cms_user_id",CRUDBooster::myId())->first();
          $query->where('id_medico',$medico_id->id);
	            
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate row of index table html 
	    | ---------------------------------------------------------------------- 
	    |
	    */    
	    public function hook_row_index($column_index,&$column_value) {	        
	    	//Your code here
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before add data is execute
	    | ---------------------------------------------------------------------- 
	    | @arr
	    |
	    */
	    public function hook_before_add(&$postdata) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after add public static function called 
	    | ---------------------------------------------------------------------- 
	    | @id = last insert id
	    | 
	    */
	    public function hook_after_add($id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before update data is execute
	    | ---------------------------------------------------------------------- 
	    | @postdata = input post data 
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_edit(&$postdata,$id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after edit public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_edit($id) {
	        //Your code here 

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command before delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_delete($id) {
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_delete($id) {
	        //Your code here

	    }



	    //By the way, you can still create your own method in here... :)
      public function getAdd(){

        //Título y tipo de operación a realizar.
        $operation = 'add';
        $page_title = 'Consulta';

        //Sí se ha ingresado un paciente, se toma el Id del mismo.
        if(Session::has('paciente_ingresao')){
          $paciente_ingresado = Session::get('paciente_ingresao');
          
        }else{
          $paciente_ingresado = 0;
         
          return redirect('admin/medico/dashboard');
        }

        //Buscamos si el el paciente tiene alguna consulta sin finalizar
        $consulta = ModConsulta::where('id_paciente',$paciente_ingresado)->where('id_estado',1)->first();
        if($consulta){
           $operation = 'update';
        }

        //Buscamos los datos del médico
        $medico = DB::table('medico')->select('*')->where('cms_user_id',CRUDBooster::myId())->first();
      
        //Todos los vademecums activos
        $vademecum = new vademecum();
        $allVademecum = $vademecum->allVademecum();

        //Todos los codigos Cie disponibles
        $codigosCie = new Cie();
        $allCie = $codigosCie->allCie();                
        //dd($allCie);
        //Buscamos al paciente que está ingresado.
        $paciente = DB::table('pacientes')->select('*')->where('id',$paciente_ingresado)->first(); 
        
        return view("Consulta.consulta",compact('page_title','operation','paciente','medico','allCie','allVademecum','consulta'));
      }

      public function getEdit($id){

        //Título y tipo de operación a realizar.
        $operation = 'update';
        $page_title = 'Editar Consulta';

        //Todos los vademecums activos
        $vademecum = new vademecum();
        $allVademecum = $vademecum->allVademecum();

        //Todas las recetas hecha en estas consulta
        $recetas = ModReceta::Where('id_consulta',$id)->get();
       
        //Todos los codigos Cie disponibles
        $codigosCie = new Cie();
        $allCie = $codigosCie->allCie(); 

        //Buscamos al paciente que está ingresado buscando por el id de la consulta.
        $consulta = ModConsulta::where('id',$id)->firstOrFail();
        $paciente = DB::table('pacientes')->select('*')->where('id',$consulta->id_paciente)->first(); 
        $medico = DB::table('medico')->select('*')->where('id',$consulta->id_medico)->first();
       
        return view("consulta.consulta",compact('page_title','operation','consulta','medico','paciente','allCie','allVademecum','recetas'));

      }

      public function ingresar($id){
        Session::put('paciente_ingresao',$id);
        return self::getAdd();
        //dd($id);
      }

      public function store(Request $request){

        

        $consulta =  new ModConsulta;
        //dd($request->get('id_medico'));
        $consulta->id_medico = $request->get('id_medico');
        $consulta->id_paciente = $request->get('id_paciente');
        $consulta->motivoConsA = $request->get('motivoConsA');
        $consulta->motivoConsC = $request->get('motivoConsC');
        $consulta->motivoConsB = $request->get('motivoConsB');
        $consulta->motivoConsD = $request->get('motivoConsD');
        $consulta->cb_vacunas = $request->get('cb_vacunas');
        $consulta->cb_alergica = $request->get('cb_alergica');
        $consulta->cb_neurologica = $request->get('cb_neurologica');
        $consulta->cb_traumatologica = $request->get('cb_traumatologica');
        $consulta->cb_tendsexual = $request->get('cb_tendsexual');
        $consulta->cb_actsexual = $request->get('cb_actsexual');
        $consulta->cb_perinatal = $request->get('cb_perinatal');
        $consulta->cb_cardiaca = $request->get('cb_cardiaca');
        $consulta->cb_metabolica = $request->get('cb_metabolica');
        $consulta->cb_quirurgica = $request->get('cb_quirurgica');
        $consulta->cb_riesgosocial = $request->get('cb_riesgosocial');
        $consulta->cb_dietahabitos = $request->get('cb_dietahabitos');
        $consulta->cb_infancia = $request->get('cb_infancia');
        $consulta->cb_respiratoria = $request->get('cb_respiratoria');
        $consulta->cb_hemolinf = $request->get('cb_hemolinf');
        $consulta->cb_mental = $request->get('cb_mental');
        $consulta->cb_riesgolaboral = $request->get('cb_riesgolaboral');
        $consulta->cb_religioncultura = $request->get('cb_religioncultura');
        $consulta->cb_adolecente = $request->get('cb_adolecente');
        $consulta->cb_digestiva = $request->get('cb_digestiva');
        $consulta->cb_urinaria = $request->get('cb_urinaria');
        $consulta->cb_tsexual = $request->get('cb_tsexual');
        $consulta->cb_riesgofamiliar = $request->get('cb_riesgofamiliar');
        $consulta->cb_otro = $request->get('cb_otro');
        $consulta->cb_cardiopatia = $request->get('cb_cardiopatia');
        $consulta->cb_diabetes = $request->get('cb_diabetes');
        $consulta->cb_enfvasculares = $request->get('cb_enfvasculares');
        $consulta->cb_hta = $request->get('cb_hta');
        $consulta->cb_cancer = $request->get('cb_cancer');
        $consulta->cb_tuberculosis = $request->get('cb_tuberculosis');
        $consulta->cb_enfenfmental = $request->get('cb_enfenfmental');
        $consulta->cb_enfinfecciosa = $request->get('cb_enfinfecciosa');
        $consulta->cb_malformacion = $request->get('cb_malformacion');
        $consulta->cb_afotro = $request->get('cb_afotro');
        $consulta->cb_1CP = $request->get('cb_1CP');
        $consulta->cb_1SP = $request->get('cb_1SP');
        $consulta->cb_3CP = $request->get('cb_3CP');
        $consulta->cb_3SP = $request->get('cb_3SP');
        $consulta->cb_5CP = $request->get('cb_5CP');
        $consulta->cb_5SP = $request->get('cb_5SP');
        $consulta->cb_7CP = $request->get('cb_7CP');
        $consulta->cb_7SP = $request->get('cb_7SP');
        $consulta->cb_9CP = $request->get('cb_9CP');
        $consulta->cb_9SP = $request->get('cb_9SP');
        $consulta->cb_2CP = $request->get('cb_2CP');
        $consulta->cb_2SP = $request->get('cb_2SP');
        $consulta->cb_4CP = $request->get('cb_4CP');
        $consulta->cb_4SP = $request->get('cb_4SP');
        $consulta->cb_6CP = $request->get('cb_6CP');
        $consulta->cb_6SP = $request->get('cb_6SP');
        $consulta->cb_8CP = $request->get('cb_8CP');
        $consulta->cb_8SP = $request->get('cb_8SP');
        $consulta->cb_10CP = $request->get('cb_10CP');
        $consulta->cb_10SP = $request->get('cb_10SP');
        $consulta->ta = $request->get('ta');
        $consulta->fc = $request->get('fc');
        $consulta->fr = $request->get('fr');
        $consulta->sato2 = $request->get('sato2');
        $consulta->tempbuc = $request->get('tempbuc');
        $consulta->peso = $request->get('peso');
        $consulta->glucem = $request->get('glucem');
        $consulta->talla = $request->get('talla');
        $consulta->gm = $request->get('gm');
        $consulta->go = $request->get('go');
        $consulta->gv = $request->get('gv');
        $consulta->cb_1RCP = $request->get('cb_1RCP');
        $consulta->cb_1RSP = $request->get('cb_1RSP');
        $consulta->cb_6RCP = $request->get('cb_6RCP');
        $consulta->cb_6RSP = $request->get('cb_6RSP');
        $consulta->cb_11RCP = $request->get('cb_11RCP');
        $consulta->cb_11RSP = $request->get('cb_11RSP');
        $consulta->cb_1SCP = $request->get('cb_1SCP');
        $consulta->cb_1SSP = $request->get('cb_1SSP');
        $consulta->cb_6SCP = $request->get('cb_6SCP');
        $consulta->cb_6SSP = $request->get('cb_6SSP');
        $consulta->cb_2RCP = $request->get('cb_2RCP');
        $consulta->cb_2RSP = $request->get('cb_2RSP');
        $consulta->cb_7RCP = $request->get('cb_7RCP');
        $consulta->cb_7RSP = $request->get('cb_7RSP');
        $consulta->cb_12RCP = $request->get('cb_12RCP');
        $consulta->cb_12RSP = $request->get('cb_12RSP');
        $consulta->cb_2SCP = $request->get('cb_2SCP');
        $consulta->cb_2SSP = $request->get('cb_2SSP');
        $consulta->cb_7SCP = $request->get('cb_7SCP');
        $consulta->cb_7SSP = $request->get('cb_7SSP');
        $consulta->cb_3RCP = $request->get('cb_3RCP');
        $consulta->cb_3RSP = $request->get('cb_3RSP');
        $consulta->cb_8RCP = $request->get('cb_8RCP');
        $consulta->cb_8RSP = $request->get('cb_8RSP');
        $consulta->cb_13RCP = $request->get('cb_13RCP');
        $consulta->cb_13RSP = $request->get('cb_13RSP');
        $consulta->cb_3SCP = $request->get('cb_3SCP');
        $consulta->cb_3SSP = $request->get('cb_3SSP');
        $consulta->cb_8SCP = $request->get('cb_8SCP');
        $consulta->cb_8SSP = $request->get('cb_8SSP');
        $consulta->cb_4RCP = $request->get('cb_4RCP');
        $consulta->cb_4RSP = $request->get('cb_4RSP');
        $consulta->cb_9RCP = $request->get('cb_9RCP');
        $consulta->cb_9RSP = $request->get('cb_9RSP');
        $consulta->cb_14RCP = $request->get('cb_14RCP');
        $consulta->cb_14RSP = $request->get('cb_14RSP');
        $consulta->cb_4SCP = $request->get('cb_4SCP');
        $consulta->cb_4SSP = $request->get('cb_4SSP');
        $consulta->cb_9SCP = $request->get('cb_9SCP');
        $consulta->cb_9SSP = $request->get('cb_9SSP');
        $consulta->cb_5RCP = $request->get('cb_5RCP');
        $consulta->cb_5RSP = $request->get('cb_5RSP');
        $consulta->cb_10RCP = $request->get('cb_10RCP');
        $consulta->cb_10RSP = $request->get('cb_10RSP');
        $consulta->cb_15RCP = $request->get('cb_15RCP');
        $consulta->cb_15RSP = $request->get('cb_15RSP');
        $consulta->cb_5sCP = $request->get('cb_5sCP');
        $consulta->cb_5sSP = $request->get('cb_5sSP');
        $consulta->cb_10sCP = $request->get('cb_10sCP');
        $consulta->cb_10sSP = $request->get('cb_10sSP');
        $consulta->txtCie1 = $request->get('txtCie1');
        $consulta->txtCod1 = $request->get('txtCod1');
        $consulta->cb_1PRE = $request->get('cb_1PRE');
        $consulta->cb_1DEF = $request->get('cb_1DEF');
        $consulta->txtCie4 = $request->get('txtCie4');
        $consulta->txtCod4 = $request->get('txtCod4');
        $consulta->cb_4PRE = $request->get('cb_4PRE');
        $consulta->cb_4DEF = $request->get('cb_4DEF');
        $consulta->txtCie2 = $request->get('txtCie2');
        $consulta->txtCod2 = $request->get('txtCod2');
        $consulta->cb_2PRE = $request->get('cb_2PRE');
        $consulta->cb_2DEF = $request->get('cb_2DEF');
        $consulta->txtCie5 = $request->get('txtCie5');
        $consulta->txtCod5 = $request->get('txtCod5');
        $consulta->cb_5PRE = $request->get('cb_5PRE');
        $consulta->cb_5DEF = $request->get('cb_5DEF');
        $consulta->txtCie3 = $request->get('txtCie3');
        $consulta->txtCod3 = $request->get('txtCod3');
        $consulta->cb_3PRE = $request->get('cb_3PRE');
        $consulta->cb_3DEF = $request->get('cb_3DEF');
        $consulta->txti3 = $request->get('txti3');
        $consulta->txtic3 = $request->get('txtic3');
        $consulta->cb_6PRE = $request->get('cb_6PRE');
        $consulta->cb_6DEF = $request->get('cb_6DEF');
        $consulta->txtFechaAgendDoct = $request->get('txtFechaAgendDoct');
        $consulta->nombremedico = $request->get('nombremedico');
        $consulta->firmaDoc = $request->get('firmaDoc');
        $consulta->txtAntePer = $request->get('txtAntePer');
        $consulta->txtNoRef = $request->get('txtNoRef');
        $consulta->txtProbActual = $request->get('txtProbActual');
        $consulta->txtRevisOrgs = $request->get('txtRevisOrgs');
        $consulta->txtExaFisico = $request->get('txtExaFisico');
        $consulta->txtPlanTrat = $request->get('txtPlanTrat');
        $consulta->txtPlanDiagnostico = $request->get('txtPlanDiagnostico');
        
        $response = $consulta->save();
        try {
         // dd($request->get('txtPlanDiagnostico'));
          if($request->get('txtPlanDiagnostico')){

          $receta = new ModReceta;
          $receta->id_consulta = $consulta->id;
          $receta->descripcion = $request->get('txtPlanDiagnostico');
          $receta->save();
          Session::put('operation','guardado');
        }
          
        } catch (\Exception $e) {
          return $e;
        }
        
        



        return response()->json([
          "response" => $response,          
          "consulta" =>$consulta]);
      }


      public function update(Request $request, $id){
        $consulta = ModConsulta::findOrFail($id); 
        $consulta->id_medico = $request->get('id_medico');
        $consulta->id_paciente = $request->get('id_paciente');
        $consulta->motivoConsA = $request->get('motivoConsA');
        $consulta->motivoConsC = $request->get('motivoConsC');
        $consulta->motivoConsB = $request->get('motivoConsB');
        $consulta->motivoConsD = $request->get('motivoConsD');
        $consulta->cb_vacunas = $request->get('cb_vacunas');
        $consulta->cb_alergica = $request->get('cb_alergica');
        $consulta->cb_neurologica = $request->get('cb_neurologica');
        $consulta->cb_traumatologica = $request->get('cb_traumatologica');
        $consulta->cb_tendsexual = $request->get('cb_tendsexual');
        $consulta->cb_actsexual = $request->get('cb_actsexual');
        $consulta->cb_perinatal = $request->get('cb_perinatal');
        $consulta->cb_cardiaca = $request->get('cb_cardiaca');
        $consulta->cb_metabolica = $request->get('cb_metabolica');
        $consulta->cb_quirurgica = $request->get('cb_quirurgica');
        $consulta->cb_riesgosocial = $request->get('cb_riesgosocial');
        $consulta->cb_dietahabitos = $request->get('cb_dietahabitos');
        $consulta->cb_infancia = $request->get('cb_infancia');
        $consulta->cb_respiratoria = $request->get('cb_respiratoria');
        $consulta->cb_hemolinf = $request->get('cb_hemolinf');
        $consulta->cb_mental = $request->get('cb_mental');
        $consulta->cb_riesgolaboral = $request->get('cb_riesgolaboral');
        $consulta->cb_religioncultura = $request->get('cb_religioncultura');
        $consulta->cb_adolecente = $request->get('cb_adolecente');
        $consulta->cb_digestiva = $request->get('cb_digestiva');
        $consulta->cb_urinaria = $request->get('cb_urinaria');
        $consulta->cb_tsexual = $request->get('cb_tsexual');
        $consulta->cb_riesgofamiliar = $request->get('cb_riesgofamiliar');
        $consulta->cb_otro = $request->get('cb_otro');
        $consulta->cb_cardiopatia = $request->get('cb_cardiopatia');
        $consulta->cb_diabetes = $request->get('cb_diabetes');
        $consulta->cb_enfvasculares = $request->get('cb_enfvasculares');
        $consulta->cb_hta = $request->get('cb_hta');
        $consulta->cb_cancer = $request->get('cb_cancer');
        $consulta->cb_tuberculosis = $request->get('cb_tuberculosis');
        $consulta->cb_enfenfmental = $request->get('cb_enfenfmental');
        $consulta->cb_enfinfecciosa = $request->get('cb_enfinfecciosa');
        $consulta->cb_malformacion = $request->get('cb_malformacion');
        $consulta->cb_afotro = $request->get('cb_afotro');
        $consulta->cb_1CP = $request->get('cb_1CP');
        $consulta->cb_1SP = $request->get('cb_1SP');
        $consulta->cb_3CP = $request->get('cb_3CP');
        $consulta->cb_3SP = $request->get('cb_3SP');
        $consulta->cb_5CP = $request->get('cb_5CP');
        $consulta->cb_5SP = $request->get('cb_5SP');
        $consulta->cb_7CP = $request->get('cb_7CP');
        $consulta->cb_7SP = $request->get('cb_7SP');
        $consulta->cb_9CP = $request->get('cb_9CP');
        $consulta->cb_9SP = $request->get('cb_9SP');
        $consulta->cb_2CP = $request->get('cb_2CP');
        $consulta->cb_2SP = $request->get('cb_2SP');
        $consulta->cb_4CP = $request->get('cb_4CP');
        $consulta->cb_4SP = $request->get('cb_4SP');
        $consulta->cb_6CP = $request->get('cb_6CP');
        $consulta->cb_6SP = $request->get('cb_6SP');
        $consulta->cb_8CP = $request->get('cb_8CP');
        $consulta->cb_8SP = $request->get('cb_8SP');
        $consulta->cb_10CP = $request->get('cb_10CP');
        $consulta->cb_10SP = $request->get('cb_10SP');
        $consulta->ta = $request->get('ta');
        $consulta->fc = $request->get('fc');
        $consulta->fr = $request->get('fr');
        $consulta->sato2 = $request->get('sato2');
        $consulta->tempbuc = $request->get('tempbuc');
        $consulta->peso = $request->get('peso');
        $consulta->glucem = $request->get('glucem');
        $consulta->talla = $request->get('talla');
        $consulta->gm = $request->get('gm');
        $consulta->go = $request->get('go');
        $consulta->gv = $request->get('gv');
        $consulta->cb_1RCP = $request->get('cb_1RCP');
        $consulta->cb_1RSP = $request->get('cb_1RSP');
        $consulta->cb_6RCP = $request->get('cb_6RCP');
        $consulta->cb_6RSP = $request->get('cb_6RSP');
        $consulta->cb_11RCP = $request->get('cb_11RCP');
        $consulta->cb_11RSP = $request->get('cb_11RSP');
        $consulta->cb_1SCP = $request->get('cb_1SCP');
        $consulta->cb_1SSP = $request->get('cb_1SSP');
        $consulta->cb_6SCP = $request->get('cb_6SCP');
        $consulta->cb_6SSP = $request->get('cb_6SSP');
        $consulta->cb_2RCP = $request->get('cb_2RCP');
        $consulta->cb_2RSP = $request->get('cb_2RSP');
        $consulta->cb_7RCP = $request->get('cb_7RCP');
        $consulta->cb_7RSP = $request->get('cb_7RSP');
        $consulta->cb_12RCP = $request->get('cb_12RCP');
        $consulta->cb_12RSP = $request->get('cb_12RSP');
        $consulta->cb_2SCP = $request->get('cb_2SCP');
        $consulta->cb_2SSP = $request->get('cb_2SSP');
        $consulta->cb_7SCP = $request->get('cb_7SCP');
        $consulta->cb_7SSP = $request->get('cb_7SSP');
        $consulta->cb_3RCP = $request->get('cb_3RCP');
        $consulta->cb_3RSP = $request->get('cb_3RSP');
        $consulta->cb_8RCP = $request->get('cb_8RCP');
        $consulta->cb_8RSP = $request->get('cb_8RSP');
        $consulta->cb_13RCP = $request->get('cb_13RCP');
        $consulta->cb_13RSP = $request->get('cb_13RSP');
        $consulta->cb_3SCP = $request->get('cb_3SCP');
        $consulta->cb_3SSP = $request->get('cb_3SSP');
        $consulta->cb_8SCP = $request->get('cb_8SCP');
        $consulta->cb_8SSP = $request->get('cb_8SSP');
        $consulta->cb_4RCP = $request->get('cb_4RCP');
        $consulta->cb_4RSP = $request->get('cb_4RSP');
        $consulta->cb_9RCP = $request->get('cb_9RCP');
        $consulta->cb_9RSP = $request->get('cb_9RSP');
        $consulta->cb_14RCP = $request->get('cb_14RCP');
        $consulta->cb_14RSP = $request->get('cb_14RSP');
        $consulta->cb_4SCP = $request->get('cb_4SCP');
        $consulta->cb_4SSP = $request->get('cb_4SSP');
        $consulta->cb_9SCP = $request->get('cb_9SCP');
        $consulta->cb_9SSP = $request->get('cb_9SSP');
        $consulta->cb_5RCP = $request->get('cb_5RCP');
        $consulta->cb_5RSP = $request->get('cb_5RSP');
        $consulta->cb_10RCP = $request->get('cb_10RCP');
        $consulta->cb_10RSP = $request->get('cb_10RSP');
        $consulta->cb_15RCP = $request->get('cb_15RCP');
        $consulta->cb_15RSP = $request->get('cb_15RSP');
        $consulta->cb_5sCP = $request->get('cb_5sCP');
        $consulta->cb_5sSP = $request->get('cb_5sSP');
        $consulta->cb_10sCP = $request->get('cb_10sCP');
        $consulta->cb_10sSP = $request->get('cb_10sSP');
        $consulta->txtCie1 = $request->get('txtCie1');
        $consulta->txtCod1 = $request->get('txtCod1');
        $consulta->cb_1PRE = $request->get('cb_1PRE');
        $consulta->cb_1DEF = $request->get('cb_1DEF');
        $consulta->txtCie4 = $request->get('txtCie4');
        $consulta->txtCod4 = $request->get('txtCod4');
        $consulta->cb_4PRE = $request->get('cb_4PRE');
        $consulta->cb_4DEF = $request->get('cb_4DEF');
        $consulta->txtCie2 = $request->get('txtCie2');
        $consulta->txtCod2 = $request->get('txtCod2');
        $consulta->cb_2PRE = $request->get('cb_2PRE');
        $consulta->cb_2DEF = $request->get('cb_2DEF');
        $consulta->txtCie5 = $request->get('txtCie5');
        $consulta->txtCod5 = $request->get('txtCod5');
        $consulta->cb_5PRE = $request->get('cb_5PRE');
        $consulta->cb_5DEF = $request->get('cb_5DEF');
        $consulta->txtCie3 = $request->get('txtCie3');
        $consulta->txtCod3 = $request->get('txtCod3');
        $consulta->cb_3PRE = $request->get('cb_3PRE');
        $consulta->cb_3DEF = $request->get('cb_3DEF');
        $consulta->txti3 = $request->get('txti3');
        $consulta->txtic3 = $request->get('txtic3');
        $consulta->cb_6PRE = $request->get('cb_6PRE');
        $consulta->cb_6DEF = $request->get('cb_6DEF');
        $consulta->txtFechaAgendDoct = $request->get('txtFechaAgendDoct');
        $consulta->nombremedico = $request->get('nombremedico');
        $consulta->firmaDoc = $request->get('firmaDoc');
        $consulta->txtAntePer = $request->get('txtAntePer');
        $consulta->txtNoRef = $request->get('txtNoRef');
        $consulta->txtProbActual = $request->get('txtProbActual');
        $consulta->txtRevisOrgs = $request->get('txtRevisOrgs');
        $consulta->txtExaFisico = $request->get('txtExaFisico');
        $consulta->txtPlanTrat = $request->get('txtPlanTrat');
        $consulta->txtPlanDiagnostico = $request->get('txtPlanDiagnostico');


        $response = $consulta->save();

       if(!empty($request->get('txtPlanDiagnostico'))){
          $receta = new Receta();
          $receta = $receta->buscar($consulta->id,$request->get('txtPlanDiagnostico'));
          if(!$receta){
          $receta = new ModReceta;
          $receta->id_consulta = $consulta->id;
          $receta->descripcion = $request->get('txtPlanDiagnostico');
          $receta->save();
          }
          Session::put('operation','guardado');
        }

        return response()->json([
          "response" => $response,
          "consulta" =>$consulta]);
      }

	}