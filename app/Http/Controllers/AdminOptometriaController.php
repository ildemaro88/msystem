<?php namespace App\Http\Controllers;

	  use Illuminate\Support\Facades\Session;
  use Illuminate\Http\Request;

	use CRUDBooster;
   use App\ModMedico;
  use Illuminate\Support\Facades\DB;
  use App\Http\Controllers\AdminCieController as Cie;
  use App\Http\Controllers\AdminVademecumController as vademecum;
  use App\ModPaciente;
  use App\ModConsulta;
  use Carbon\Carbon;
  use App\ModReceta;
  use App\ModOptometria;

	class AdminOptometriaController extends \crocodicstudio\crudbooster\controllers\CBController {

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
			$this->button_delete = false;
			$this->button_detail = true;
			$this->button_show = true;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "optometria";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Paciente","name"=>"id_paciente","join"=>"pacientes,nombre"];
			$this->col[] = ["label"=>"Medico","name"=>"id_medico","join"=>"medico,nombre"];
			$this->col[] = ["label"=>"Observaciones","name"=>"txt_disposiciones_finales"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
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
  'label' => 'Txt Od Vl Sc',
  'name' => 'txt_od_vl_sc',
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
  'label' => 'Txt Od Vp Sc',
  'name' => 'txt_od_vp_sc',
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
  'label' => 'Txt Od Vl Cc',
  'name' => 'txt_od_vl_cc',
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
  'label' => 'Txt Od Vp Cc',
  'name' => 'txt_od_vp_cc',
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
  'label' => 'Txt Od Vp Ph',
  'name' => 'txt_od_vp_ph',
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
  'label' => 'Txt Oi Vl Sc',
  'name' => 'txt_oi_vl_sc',
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
  'label' => 'Txt Oi Vp Sc',
  'name' => 'txt_oi_vp_sc',
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
  'label' => 'Txt Oi Vl Cc',
  'name' => 'txt_oi_vl_cc',
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
  'label' => 'Txt Oi Vp Cc',
  'name' => 'txt_oi_vp_cc',
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
  'label' => 'Txt Oi Vp Ph',
  'name' => 'txt_oi_vp_ph',
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
  'label' => 'Txt Ao Vl Sc',
  'name' => 'txt_ao_vl_sc',
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
  'label' => 'Txt Ao Vp Sc',
  'name' => 'txt_ao_vp_sc',
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
  'label' => 'Txt Ao Vl Cc',
  'name' => 'txt_ao_vl_cc',
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
  'label' => 'Txt Ao Vp Cc',
  'name' => 'txt_ao_vp_cc',
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
  'label' => 'Txt Ao Vp Ph',
  'name' => 'txt_ao_vp_ph',
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
  'label' => 'Txt Retinoscopia Od Esfera',
  'name' => 'txt_retinoscopia_od_esfera',
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
  'label' => 'Txt Retinoscopia Od Cilindro',
  'name' => 'txt_retinoscopia_od_cilindro',
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
  'label' => 'Txt Retinoscopia Od Eje',
  'name' => 'txt_retinoscopia_od_eje',
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
  'label' => 'Txt Retinoscopia Od Avl',
  'name' => 'txt_retinoscopia_od_avl',
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
  'label' => 'Txt Retinoscopia Od Avc',
  'name' => 'txt_retinoscopia_od_avc',
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
  'label' => 'Txt Retinoscopia Oi Esfera',
  'name' => 'txt_retinoscopia_oi_esfera',
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
  'label' => 'Txt Retinoscopia Oi Cilindro',
  'name' => 'txt_retinoscopia_oi_cilindro',
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
  'label' => 'Txt Retinoscopia Oi Eje',
  'name' => 'txt_retinoscopia_oi_eje',
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
  'label' => 'Txt Retinoscopia Oi Avl',
  'name' => 'txt_retinoscopia_oi_avl',
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
  'label' => 'Txt Retinoscopia Oi Avc',
  'name' => 'txt_retinoscopia_oi_avc',
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
  'label' => 'Txt Subjetivo Od Esfera',
  'name' => 'txt_subjetivo_od_esfera',
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
  'label' => 'Txt Subjetivo Od Cilindro',
  'name' => 'txt_subjetivo_od_cilindro',
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
  'label' => 'Txt Subjetivo Od Eje',
  'name' => 'txt_subjetivo_od_eje',
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
  'label' => 'Txt Subjetivo Od Avl',
  'name' => 'txt_subjetivo_od_avl',
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
  'label' => 'Txt Subjetivo Od Avc',
  'name' => 'txt_subjetivo_od_avc',
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
  'label' => 'Txt Subjetivo Oi Esfera',
  'name' => 'txt_subjetivo_oi_esfera',
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
  'label' => 'Txt Subjetivo Oi Cilindro',
  'name' => 'txt_subjetivo_oi_cilindro',
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
  'label' => 'Txt Subjetivo Oi Eje',
  'name' => 'txt_subjetivo_oi_eje',
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
  'label' => 'Txt Subjetivo Oi Avl',
  'name' => 'txt_subjetivo_oi_avl',
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
  'label' => 'Txt Subjetivo Oi Avc',
  'name' => 'txt_subjetivo_oi_avc',
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
  'label' => 'Txt Distancia Od Esfera',
  'name' => 'txt_distancia_od_esfera',
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
  'label' => 'Txt Distancia Od Cilindro',
  'name' => 'txt_distancia_od_cilindro',
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
  'label' => 'Txt Distancia Od Eje',
  'name' => 'txt_distancia_od_eje',
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
  'label' => 'Txt Distancia Od Dp',
  'name' => 'txt_distancia_od_dp',
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
  'label' => 'Txt Distancia Od Altura',
  'name' => 'txt_distancia_od_altura',
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
  'label' => 'Txt Distancia Oi Esfera',
  'name' => 'txt_distancia_oi_esfera',
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
  'label' => 'Txt Distancia Oi Cilindro',
  'name' => 'txt_distancia_oi_cilindro',
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
  'label' => 'Txt Distancia Oi Eje',
  'name' => 'txt_distancia_oi_eje',
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
  'label' => 'Txt Distancia Oi Dp',
  'name' => 'txt_distancia_oi_dp',
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
  'label' => 'Txt Distancia Oi Altura',
  'name' => 'txt_distancia_oi_altura',
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
  'label' => 'Txt Cercano Od Esfera',
  'name' => 'txt_cercano_od_esfera',
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
  'label' => 'Txt Cercano Od Cilindro',
  'name' => 'txt_cercano_od_cilindro',
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
  'label' => 'Txt Cercano Od Eje',
  'name' => 'txt_cercano_od_eje',
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
  'label' => 'Txt Cercano Od Dp',
  'name' => 'txt_cercano_od_dp',
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
  'label' => 'Txt Cercano Od Altura',
  'name' => 'txt_cercano_od_altura',
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
  'label' => 'Txt Cercano Oi Esfera',
  'name' => 'txt_cercano_oi_esfera',
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
  'label' => 'Txt Cercano Oi Cilindro',
  'name' => 'txt_cercano_oi_cilindro',
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
  'label' => 'Txt Cercano Oi Eje',
  'name' => 'txt_cercano_oi_eje',
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
  'label' => 'Txt Cercano Oi Dp',
  'name' => 'txt_cercano_oi_dp',
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
  'label' => 'Txt Cercano Oi Altura',
  'name' => 'txt_cercano_oi_altura',
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
  'label' => 'Rd Cover Test',
  'name' => 'rd_cover_test',
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
  'label' => 'Rd Test Ishihara',
  'name' => 'rd_test_ishihara',
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
  'label' => 'Rd Test Pupilar',
  'name' => 'rd_test_pupilar',
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
  'label' => 'Rd Fondo De Ojo',
  'name' => 'rd_fondo_de_ojo',
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
  'label' => 'TxtFechaAgendDoct',
  'name' => 'txtFechaAgendDoct',
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
  'label' => 'Nombremedico',
  'name' => 'nombremedico',
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
  'label' => 'FirmaDoc',
  'name' => 'firmaDoc',
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
  'label' => 'motivoConsulta',
  'name' => 'motivoConsulta',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'label' => 'TxtAntePer',
  'name' => 'txtAntePer',
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
	        $this->addaction = array(['label'=>'','icon'=>'fa fa-print','target'=>'_blank','color'=>'primary print','url'=>CRUDBooster::mainpath($slug='').'/print/[id]'],['label'=>'','icon'=>'fa fa-file-text','target'=>'_blank','color'=>'primary print_r','url'=>CRUDBooster::mainpath($slug='').'/print_r/[id]']);


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
	        $this->script_js = '$(function() {
      // corregir error de doble calendario
      //alert("hola");
      $(".print").attr("title","Imprimir Optometría");
      $(".print_r").attr("title","Imprimir Receta");
      $(".print").attr("target","_blank");
      $(".print_r").attr("target","_blank");
      $(".btn-xs.btn-warning").click(function(e){
        e.preventDefault();
        var $this = $(this);
        var id = $this.attr("href");
        swal({
          title: "Estás seguro ?",
          text: "No podrá recuperar estos datos de registro!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#dd6b55",
          confirmButtonText: "OK",
          closeOnConfirm: false,
          showLoaderOnConfirm: true
        },
        function(){
          var url1 ="admin/orden_examenes/"+id;
          $this.attr("href",url1);
          $.ajax({
            url: "orden_examenes/delete/"+id,
            type: "GET",
            success: function(){
              document.location.reload();
            },

          });


        });
      });
    });
    ';



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

      /**
      * Funcion para generar los PDF's de la optometría
      *
      ***/
      public function printPDF($id){
        $medico = ModMedico::where("cms_user_id",CRUDBooster::myId())->first();
        $optometria =DB::table('optometrias')->select('*')->where(['id' => $id])->first();
        //tipos =DB::table('orden_pdf')->select('tipo_id')->where(['id' => $id])->groupBy('tipo_id')->get();
        //$examenes= DB::table('orden_pdf')->select('*')->where(['id' => $id])->get();
        $pdf = \PDF::loadView('optometria.pdf',['optometria' => $optometria,'medico' => $medico]);
        $pdf->setPaper('A4');

        return $pdf->stream();
      }

       /**
      * Funcion para generar los PDF's de la optometría
      *
      ***/
      public function print_rPDF($id){
        $medico = ModMedico::where("cms_user_id",CRUDBooster::myId())->first();
        $optometria =DB::table('optometrias')->select('*')->where(['id' => $id])->first();
        //tipos =DB::table('orden_pdf')->select('tipo_id')->where(['id' => $id])->groupBy('tipo_id')->get();
        //$examenes= DB::table('orden_pdf')->select('*')->where(['id' => $id])->get();
        $pdf = \PDF::loadView('optometria.recetapdf',['optometria' => $optometria,'medico' => $medico]);
        $pdf->setPaper('A5');

        return $pdf->stream();
      }


      public function ingresar($id){
        Session::put('paciente_ingresao',$id);
        return self::getAdd();
        //dd($id);
      }


      public function finalizar($id){
        $optometria = ModOptometria::where('id',$id)->firstOrFail();
        $optometria->id_estado = "2";
        try {
          $response = $optometria->save();
          return response()->json([
          "response" => $response,          
          "consulta" =>$optometria]);
          
        } catch (Exception $e) {
          return $e;
          
        }
        
      }


      public function getAdd(){

        //Título y tipo de operación a realizar.
        $operation = 'add';
        $page_title = 'Optometria';
        //return view("optometria_",compact('page_title', 'operation')); 

        //Sí se ha ingresado un paciente, se toma el Id del mismo.
        if(Session::has('paciente_ingresao')){
          $paciente_ingresado = Session::get('paciente_ingresao');
          
        }else{
          $paciente_ingresado = 0;
          return redirect('admin/medico/dashboard');
        }

       


        //Buscamos los datos del médico
        $medico = DB::table('medico')->select('*')->where('cms_user_id',CRUDBooster::myId())->first();

         //Buscamos si el el paciente tiene alguna consulta sin finalizar
        $optometria = ModOptometria::where('id_paciente',$paciente_ingresado)->where('id_estado',"1")->where('id_medico',$medico->id)->first();
        if($optometria){
           $operation = 'update';
        }

        //Todos los vademecums activos
        $vademecum = new vademecum();
        $allVademecum = $vademecum->allVademecum();

        //Todos los codigos Cie disponibles
        $codigosCie = new Cie();
        $allCie = $codigosCie->allCie();                
        //dd($allCie);
        //Buscamos al paciente que está ingresado.
        $paciente = DB::table('pacientes')->select('*')->where('id',$paciente_ingresado)->first(); 
        
        return view("optometria.create",compact('page_title','operation','paciente','medico','allCie','allVademecum','optometria'));
      }

      public function getEdit($id){

        //Título y tipo de operación a realizar.
        $operation = 'update';
        $page_title = 'Editar';

        //Todos los vademecums activos
        $vademecum = new vademecum();
        $allVademecum = $vademecum->allVademecum();

        //Todas las recetas hecha en estas consulta
        //$recetas = ModReceta::Where('id_consulta',$id)->get();
       
        //Todos los codigos Cie disponibles
        $codigosCie = new Cie();
        $allCie = $codigosCie->allCie(); 

        //Buscamos al paciente que está ingresado buscando por el id de la consulta.
        $optometria = ModOptometria::where('id',$id)->firstOrFail();
        $paciente = DB::table('pacientes')->select('*')->where('id',$optometria->id_paciente)->first(); 
        $medico = DB::table('medico')->select('*')->where('id',$optometria->id_medico)->first();
       
        return view("optometria.create",compact('page_title','operation','optometria','medico','paciente','allCie','allVademecum'));

      }

      public function store(Request $request)
      {
        $optometria =  new ModOptometria;
        $optometria->id_paciente = $request->get('id_paciente');
        $optometria->id_medico = $request->get('id_medico');
        $optometria->cb_vacunas = $request->get('cb_vacunas');
        $optometria->cb_alergica = $request->get('cb_alergica');
        $optometria->cb_neurologica = $request->get('cb_neurologica');
        $optometria->cb_traumatologica = $request->get('cb_traumatologica');
        $optometria->cb_tendsexual = $request->get('cb_tendsexual');
        $optometria->cb_actsexual = $request->get('cb_actsexual');
        $optometria->cb_perinatal = $request->get('cb_perinatal');
        $optometria->cb_cardiaca = $request->get('cb_cardiaca');
        $optometria->cb_metabolica = $request->get('cb_metabolica');
        $optometria->cb_quirurgica = $request->get('cb_quirurgica');
        $optometria->cb_riesgosocial = $request->get('cb_riesgosocial');
        $optometria->cb_dietahabitos = $request->get('cb_dietahabitos');
        $optometria->cb_infancia = $request->get('cb_infancia');
        $optometria->cb_respiratoria = $request->get('cb_respiratoria');
        $optometria->cb_hemolinf = $request->get('cb_hemolinf');
        $optometria->cb_mental = $request->get('cb_mental');
        $optometria->cb_riesgolaboral = $request->get('cb_riesgolaboral');
        $optometria->cb_religioncultura = $request->get('cb_religioncultura');
        $optometria->cb_adolecente = $request->get('cb_adolecente');
        $optometria->cb_digestiva = $request->get('cb_digestiva');
        $optometria->cb_urinaria = $request->get('cb_urinaria');
        $optometria->cb_tsexual = $request->get('cb_tsexual');
        $optometria->cb_riesgofamiliar = $request->get('cb_riesgofamiliar');
        $optometria->cb_otro = $request->get('cb_otro');
        $optometria->cb_cardiopatia = $request->get('cb_cardiopatia');
        $optometria->cb_diabetes = $request->get('cb_diabetes');
        $optometria->cb_enfvasculares = $request->get('cb_enfvasculares');
        $optometria->cb_hta = $request->get('cb_hta');
        $optometria->cb_cancer = $request->get('cb_cancer');
        $optometria->cb_tuberculosis = $request->get('cb_tuberculosis');
        $optometria->cb_enfenfmental = $request->get('cb_enfenfmental');
        $optometria->cb_enfinfecciosa = $request->get('cb_enfinfecciosa');
        $optometria->cb_malformacion = $request->get('cb_malformacion');
        $optometria->cb_afotro = $request->get('cb_afotro');
        $optometria->txt_od_vl_sc = $request->get('txt_od_vl_sc');
        $optometria->txt_od_vp_sc = $request->get('txt_od_vp_sc');
        $optometria->txt_od_vl_cc = $request->get('txt_od_vl_cc');
        $optometria->txt_od_vp_cc = $request->get('txt_od_vp_cc');
        $optometria->txt_od_vp_ph = $request->get('txt_od_vp_ph');
        $optometria->txt_oi_vl_sc = $request->get('txt_oi_vl_sc');
        $optometria->txt_oi_vp_sc = $request->get('txt_oi_vp_sc');
        $optometria->txt_oi_vl_cc = $request->get('txt_oi_vl_cc');
        $optometria->txt_oi_vp_cc = $request->get('txt_oi_vp_cc');
        $optometria->txt_oi_vp_ph = $request->get('txt_oi_vp_ph');
        $optometria->txt_ao_vl_sc = $request->get('txt_ao_vl_sc');
        $optometria->txt_ao_vp_sc = $request->get('txt_ao_vp_sc');
        $optometria->txt_ao_vl_cc = $request->get('txt_ao_vl_cc');
        $optometria->txt_ao_vp_cc = $request->get('txt_ao_vp_cc');
        $optometria->txt_ao_vp_ph = $request->get('txt_ao_vp_ph');
        $optometria->txt_retinoscopia_od_esfera = $request->get('txt_retinoscopia_od_esfera');
        $optometria->txt_retinoscopia_od_cilindro = $request->get('txt_retinoscopia_od_cilindro');
        $optometria->txt_retinoscopia_od_eje = $request->get('txt_retinoscopia_od_eje');
        $optometria->txt_retinoscopia_od_avl = $request->get('txt_retinoscopia_od_avl');
        $optometria->txt_retinoscopia_od_avc = $request->get('txt_retinoscopia_od_avc');
        $optometria->txt_retinoscopia_oi_esfera = $request->get('txt_retinoscopia_oi_esfera');
        $optometria->txt_retinoscopia_oi_cilindro = $request->get('txt_retinoscopia_oi_cilindro');
        $optometria->txt_retinoscopia_oi_eje = $request->get('txt_retinoscopia_oi_eje');
        $optometria->txt_retinoscopia_oi_avl = $request->get('txt_retinoscopia_oi_avl');
        $optometria->txt_retinoscopia_oi_avc = $request->get('txt_retinoscopia_oi_avc');
        $optometria->txt_subjetivo_od_esfera = $request->get('txt_subjetivo_od_esfera');
        $optometria->txt_subjetivo_od_cilindro = $request->get('txt_subjetivo_od_cilindro');
        $optometria->txt_subjetivo_od_eje = $request->get('txt_subjetivo_od_eje');
        $optometria->txt_subjetivo_od_avl = $request->get('txt_subjetivo_od_avl');
        $optometria->txt_subjetivo_od_avc = $request->get('txt_subjetivo_od_avc');
        $optometria->txt_subjetivo_oi_esfera = $request->get('txt_subjetivo_oi_esfera');
        $optometria->txt_subjetivo_oi_cilindro = $request->get('txt_subjetivo_oi_cilindro');
        $optometria->txt_subjetivo_oi_eje = $request->get('txt_subjetivo_oi_eje');
        $optometria->txt_subjetivo_oi_avl = $request->get('txt_subjetivo_oi_avl');
        $optometria->txt_subjetivo_oi_avc = $request->get('txt_subjetivo_oi_avc');
        $optometria->txt_distancia_od_esfera = $request->get('txt_distancia_od_esfera');
        $optometria->txt_distancia_od_cilindro = $request->get('txt_distancia_od_cilindro');
        $optometria->txt_distancia_od_eje = $request->get('txt_distancia_od_eje');
        $optometria->txt_distancia_od_dp = $request->get('txt_distancia_od_dp');
        $optometria->txt_distancia_od_adicion = $request->get('txt_distancia_od_adicion');
        $optometria->txt_distancia_od_altura = $request->get('txt_distancia_od_altura');
        $optometria->txt_distancia_oi_esfera = $request->get('txt_distancia_oi_esfera');
        $optometria->txt_distancia_oi_cilindro = $request->get('txt_distancia_oi_cilindro');
        $optometria->txt_distancia_oi_eje = $request->get('txt_distancia_oi_eje');
        $optometria->txt_distancia_oi_dp = $request->get('txt_distancia_oi_dp');
        $optometria->txt_distancia_oi_adicion = $request->get('txt_distancia_oi_adicion');
        $optometria->txt_distancia_oi_altura = $request->get('txt_distancia_oi_altura');
        $optometria->txt_cercano_od_esfera = $request->get('txt_cercano_od_esfera');
        $optometria->txt_cercano_od_cilindro = $request->get('txt_cercano_od_cilindro');
        $optometria->txt_cercano_od_eje = $request->get('txt_cercano_od_eje');
        $optometria->txt_cercano_od_dp = $request->get('txt_cercano_od_dp');
        $optometria->txt_cercano_od_altura = $request->get('txt_cercano_od_altura');
        $optometria->txt_cercano_oi_esfera = $request->get('txt_cercano_oi_esfera');
        $optometria->txt_cercano_oi_cilindro = $request->get('txt_cercano_oi_cilindro');
        $optometria->txt_cercano_oi_eje = $request->get('txt_cercano_oi_eje');
        $optometria->txt_cercano_oi_dp = $request->get('txt_cercano_oi_dp');
        $optometria->txt_cercano_oi_altura = $request->get('txt_cercano_oi_altura');
        $optometria->rd_cover_test = $request->get('rd_cover_test');
        $optometria->rd_test_ishihara = $request->get('rd_test_ishihara');
        $optometria->rd_test_pupilar = $request->get('rd_test_pupilar');
        $optometria->rd_fondo_de_ojo = $request->get('rd_fondo_de_ojo');
        $optometria->txtFechaAgendDoct = $request->get('txtFechaAgendDoct');
        $optometria->nombremedico = $request->get('nombremedico');
        $optometria->firmaDoc = $request->get('firmaDoc');
        $optometria->motivoConsulta = $request->get('motivoConsulta');
        $optometria->txtAntePer = $request->get('txtAntePer');
        $optometria->txtNoRef = $request->get('txtNoRef');
        $optometria->txtProbActual = $request->get('txtProbActual');
        $optometria->txt_ojo_derecho = $request->get('txt_ojo_derecho');
        $optometria->txt_ojo_izquierdo = $request->get('txt_ojo_izquierdo');
        $optometria->txt_agudeza_visual = $request->get('txt_agudeza_visual');
        $optometria->txt_lensometria_od = $request->get('txt_lensometria_od');
        $optometria->txt_lensometria_oi = $request->get('txt_lensometria_oi');
        $optometria->txt_retinoscopia = $request->get('txt_retinoscopia');
        $optometria->txt_subjetivo = $request->get('txt_subjetivo');
        $optometria->txt_distancia = $request->get('txt_distancia');
        $optometria->txt_cercano = $request->get('txt_cercano');
        $optometria->txt_plan_diagnostico = $request->get('txt_plan_diagnostico');
        $optometria->txt_disposiciones_finales = $request->get('txt_disposiciones_finales');

        $response = $optometria->save();
        return response()->json([
          "response" => $response,
          "optometria" =>$optometria]);
      }

      public function update(Request $request, $id)
{
  $optometria = ModOptometria::findOrFail($id); 
  $optometria->id_paciente = $request->get('id_paciente');
  $optometria->id_medico = $request->get('id_medico');
  $optometria->cb_vacunas = $request->get('cb_vacunas');
  $optometria->cb_alergica = $request->get('cb_alergica');
  $optometria->cb_neurologica = $request->get('cb_neurologica');
  $optometria->cb_traumatologica = $request->get('cb_traumatologica');
  $optometria->cb_tendsexual = $request->get('cb_tendsexual');
  $optometria->cb_actsexual = $request->get('cb_actsexual');
  $optometria->cb_perinatal = $request->get('cb_perinatal');
  $optometria->cb_cardiaca = $request->get('cb_cardiaca');
  $optometria->cb_metabolica = $request->get('cb_metabolica');
  $optometria->cb_quirurgica = $request->get('cb_quirurgica');
  $optometria->cb_riesgosocial = $request->get('cb_riesgosocial');
  $optometria->cb_dietahabitos = $request->get('cb_dietahabitos');
  $optometria->cb_infancia = $request->get('cb_infancia');
  $optometria->cb_respiratoria = $request->get('cb_respiratoria');
  $optometria->cb_hemolinf = $request->get('cb_hemolinf');
  $optometria->cb_mental = $request->get('cb_mental');
  $optometria->cb_riesgolaboral = $request->get('cb_riesgolaboral');
  $optometria->cb_religioncultura = $request->get('cb_religioncultura');
  $optometria->cb_adolecente = $request->get('cb_adolecente');
  $optometria->cb_digestiva = $request->get('cb_digestiva');
  $optometria->cb_urinaria = $request->get('cb_urinaria');
  $optometria->cb_tsexual = $request->get('cb_tsexual');
  $optometria->cb_riesgofamiliar = $request->get('cb_riesgofamiliar');
  $optometria->cb_otro = $request->get('cb_otro');
  $optometria->cb_cardiopatia = $request->get('cb_cardiopatia');
  $optometria->cb_diabetes = $request->get('cb_diabetes');
  $optometria->cb_enfvasculares = $request->get('cb_enfvasculares');
  $optometria->cb_hta = $request->get('cb_hta');
  $optometria->cb_cancer = $request->get('cb_cancer');
  $optometria->cb_tuberculosis = $request->get('cb_tuberculosis');
  $optometria->cb_enfenfmental = $request->get('cb_enfenfmental');
  $optometria->cb_enfinfecciosa = $request->get('cb_enfinfecciosa');
  $optometria->cb_malformacion = $request->get('cb_malformacion');
  $optometria->cb_afotro = $request->get('cb_afotro');
  $optometria->txt_od_vl_sc = $request->get('txt_od_vl_sc');
  $optometria->txt_od_vp_sc = $request->get('txt_od_vp_sc');
  $optometria->txt_od_vl_cc = $request->get('txt_od_vl_cc');
  $optometria->txt_od_vp_cc = $request->get('txt_od_vp_cc');
  $optometria->txt_od_vp_ph = $request->get('txt_od_vp_ph');
  $optometria->txt_oi_vl_sc = $request->get('txt_oi_vl_sc');
  $optometria->txt_oi_vp_sc = $request->get('txt_oi_vp_sc');
  $optometria->txt_oi_vl_cc = $request->get('txt_oi_vl_cc');
  $optometria->txt_oi_vp_cc = $request->get('txt_oi_vp_cc');
  $optometria->txt_oi_vp_ph = $request->get('txt_oi_vp_ph');
  $optometria->txt_ao_vl_sc = $request->get('txt_ao_vl_sc');
  $optometria->txt_ao_vp_sc = $request->get('txt_ao_vp_sc');
  $optometria->txt_ao_vl_cc = $request->get('txt_ao_vl_cc');
  $optometria->txt_ao_vp_cc = $request->get('txt_ao_vp_cc');
  $optometria->txt_ao_vp_ph = $request->get('txt_ao_vp_ph');
  $optometria->txt_retinoscopia_od_esfera = $request->get('txt_retinoscopia_od_esfera');
  $optometria->txt_retinoscopia_od_cilindro = $request->get('txt_retinoscopia_od_cilindro');
  $optometria->txt_retinoscopia_od_eje = $request->get('txt_retinoscopia_od_eje');
  $optometria->txt_retinoscopia_od_avl = $request->get('txt_retinoscopia_od_avl');
  $optometria->txt_retinoscopia_od_avc = $request->get('txt_retinoscopia_od_avc');
  $optometria->txt_retinoscopia_oi_esfera = $request->get('txt_retinoscopia_oi_esfera');
  $optometria->txt_retinoscopia_oi_cilindro = $request->get('txt_retinoscopia_oi_cilindro');
  $optometria->txt_retinoscopia_oi_eje = $request->get('txt_retinoscopia_oi_eje');
  $optometria->txt_retinoscopia_oi_avl = $request->get('txt_retinoscopia_oi_avl');
  $optometria->txt_retinoscopia_oi_avc = $request->get('txt_retinoscopia_oi_avc');
  $optometria->txt_subjetivo_od_esfera = $request->get('txt_subjetivo_od_esfera');
  $optometria->txt_subjetivo_od_cilindro = $request->get('txt_subjetivo_od_cilindro');
  $optometria->txt_subjetivo_od_eje = $request->get('txt_subjetivo_od_eje');
  $optometria->txt_subjetivo_od_avl = $request->get('txt_subjetivo_od_avl');
  $optometria->txt_subjetivo_od_avc = $request->get('txt_subjetivo_od_avc');
  $optometria->txt_subjetivo_oi_esfera = $request->get('txt_subjetivo_oi_esfera');
  $optometria->txt_subjetivo_oi_cilindro = $request->get('txt_subjetivo_oi_cilindro');
  $optometria->txt_subjetivo_oi_eje = $request->get('txt_subjetivo_oi_eje');
  $optometria->txt_subjetivo_oi_avl = $request->get('txt_subjetivo_oi_avl');
  $optometria->txt_subjetivo_oi_avc = $request->get('txt_subjetivo_oi_avc');
  $optometria->txt_distancia_od_esfera = $request->get('txt_distancia_od_esfera');
  $optometria->txt_distancia_od_cilindro = $request->get('txt_distancia_od_cilindro');
  $optometria->txt_distancia_od_eje = $request->get('txt_distancia_od_eje');
  $optometria->txt_distancia_od_dp = $request->get('txt_distancia_od_dp');
  $optometria->txt_distancia_od_adicion = $request->get('txt_distancia_od_dp');
  $optometria->txt_distancia_od_altura = $request->get('txt_distancia_od_altura');
  $optometria->txt_distancia_oi_esfera = $request->get('txt_distancia_oi_esfera');
  $optometria->txt_distancia_oi_cilindro = $request->get('txt_distancia_oi_cilindro');
  $optometria->txt_distancia_oi_eje = $request->get('txt_distancia_oi_eje');
  $optometria->txt_distancia_oi_dp = $request->get('txt_distancia_oi_dp');
  $optometria->txt_distancia_oi_adicion = $request->get('txt_distancia_oi_dp');
  $optometria->txt_distancia_oi_altura = $request->get('txt_distancia_oi_altura');
  $optometria->txt_cercano_od_esfera = $request->get('txt_cercano_od_esfera');
  $optometria->txt_cercano_od_cilindro = $request->get('txt_cercano_od_cilindro');
  $optometria->txt_cercano_od_eje = $request->get('txt_cercano_od_eje');
  $optometria->txt_cercano_od_dp = $request->get('txt_cercano_od_dp');
  $optometria->txt_cercano_od_altura = $request->get('txt_cercano_od_altura');
  $optometria->txt_cercano_oi_esfera = $request->get('txt_cercano_oi_esfera');
  $optometria->txt_cercano_oi_cilindro = $request->get('txt_cercano_oi_cilindro');
  $optometria->txt_cercano_oi_eje = $request->get('txt_cercano_oi_eje');
  $optometria->txt_cercano_oi_dp = $request->get('txt_cercano_oi_dp');
  $optometria->txt_cercano_oi_altura = $request->get('txt_cercano_oi_altura');
  $optometria->rd_cover_test = $request->get('rd_cover_test');
  $optometria->rd_test_ishihara = $request->get('rd_test_ishihara');
  $optometria->rd_test_pupilar = $request->get('rd_test_pupilar');
  $optometria->rd_fondo_de_ojo = $request->get('rd_fondo_de_ojo');
  $optometria->txtFechaAgendDoct = $request->get('txtFechaAgendDoct');
  $optometria->nombremedico = $request->get('nombremedico');
  $optometria->firmaDoc = $request->get('firmaDoc');
  $optometria->motivoConsulta = $request->get('motivoConsulta');
  $optometria->txtAntePer = $request->get('txtAntePer');
  $optometria->txtNoRef = $request->get('txtNoRef');
  $optometria->txtProbActual = $request->get('txtProbActual');
  $optometria->txt_ojo_derecho = $request->get('txt_ojo_derecho');
  $optometria->txt_ojo_izquierdo = $request->get('txt_ojo_izquierdo');
  $optometria->txt_agudeza_visual = $request->get('txt_agudeza_visual');
  $optometria->txt_lensometria_od = $request->get('txt_lensometria_od');
  $optometria->txt_lensometria_oi = $request->get('txt_lensometria_oi');
  $optometria->txt_retinoscopia = $request->get('txt_retinoscopia');
  $optometria->txt_subjetivo = $request->get('txt_subjetivo');
  $optometria->txt_distancia = $request->get('txt_distancia');
  $optometria->txt_cercano = $request->get('txt_cercano');
  $optometria->txt_plan_diagnostico = $request->get('txt_plan_diagnostico');
  $optometria->txt_disposiciones_finales = $request->get('txt_disposiciones_finales');

  $response = $optometria->save();
  return response()->json([
    "response" => $response,
    "optometria" =>$optometria]);
}

	}