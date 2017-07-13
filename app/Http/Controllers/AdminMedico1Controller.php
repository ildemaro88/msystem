<?php namespace App\Http\Controllers;

use Session;
//use Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use CRUDBooster;
use App\ModAgenda;
use App\ModEspecialidad;
use App\ModMedico;
use App\CmsUser;
use App\HorarioMedico;

class AdminMedico1Controller extends \crocodicstudio\crudbooster\controllers\CBController
{
  public function cbInit()
  {

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
			$this->table = "medico";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Titulo","name"=>"titulo"];
			$this->col[] = ["label"=>"Nombre","name"=>"nombre"];
			$this->col[] = ["label"=>"Apellido","name"=>"apellido"];
			$this->col[] = ["label"=>"Especialidad","name"=>"especialidad","join"=>"especialidad,descripcion"];
			$this->col[] = ["label"=>"Telefono","name"=>"telefono"];
			$this->col[] = ["label"=>"Email","name"=>"email"];
			$this->col[] = ["label"=>"Institucion","name"=>"id_institucion","join"=>"institucion,nombre"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => 'Ejem: Traumatología',
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Especialidad',
  'name' => 'especialidad',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'dataenum' => 'Dr.;Dra.',
  'datatable' => NULL,
  'dataquery' => NULL,
  'style' => NULL,
  'help' => NULL,
  'datatable_where' => NULL,
  'datatable_format' => NULL,
  'parent_select' => NULL,
  'label' => 'Titulo',
  'name' => 'titulo',
  'type' => 'select',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Nombre',
  'name' => 'nombre',
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
  'label' => 'Apellido',
  'name' => 'apellido',
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
  'label' => 'Teléfono',
  'name' => 'telefono',
  'type' => 'text',
  'validation' => 'min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Email',
  'name' => 'email',
  'type' => 'email',
  'validation' => NULL,
  'width' => 'col-sm-9',
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
        $this->addaction = array(['label' => 'Agenda',
          'icon' => 'fa fa-list-alt',
          'color' => 'danger',
          'url' => CRUDBooster::mainpath($slug = 'agenda') . '/[id]/edit'
          ]);


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
        $this->alert = array();


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

      public function getAdd(){
        $instituciones = DB::table('institucion')->select('*')->get();
        $operation = 'add';
        $especialidades = ModEspecialidad::all();
        //dd($instituciones);
        $page_title = "Agregar nuevo médico";
        return view('medico.create',compact('page_title','instituciones','operation','especialidades'));
      }
      public function getEdit($id){
        $data=[];
        $data['instituciones'] = DB::table('institucion')->select('*')->get();
        $especialidades = ModEspecialidad::all();
        $data['especialidades'] = $especialidades;
        $data['page_title'] ="Editar médico";
        $data['medico'] = ModMedico::find($id);
        $data['horario_medico'] = HorarioMedico::where("medico_id",$id)->get();
        $this->cbView('medico.edit',$data);
      }
      public function postAddSave(){
        $medico = new ModMedico;
        $medico->titulo= Input::get("titulo");
        $medico->especialidad= Input::get("especialidad");

        $medico->id_institucion = Input::get("id_institucion");
        $medico->nombre= Input::get("nombre");
        $medico->apellido= Input::get("apellido");
        $medico->telefono= Input::get("telefono");
        $medico->email= Input::get("email");
        $medico->save();
        if(Input::get("lunes") == "on"){
          $horario_medico = new HorarioMedico;
          $horario_medico->medico_id=$medico->id;
          $horario_medico->dow=1;
          $horario_medico->start=Input::get("lunes_start");
          $horario_medico->end=Input::get("lunes_end");
          $horario_medico->start_t=Input::get("lunes_start_t");
          $horario_medico->end_t=Input::get("lunes_end_t");
          $horario_medico->save();

        }if(Input::get("martes") == "on"){
          $horario_medico = new HorarioMedico;
          $horario_medico->medico_id=$medico->id;
          $horario_medico->dow=2;
          $horario_medico->start=Input::get("martes_start");
          $horario_medico->end=Input::get("martes_end");
          $horario_medico->start_t=Input::get("martes_start_t");
          $horario_medico->end_t=Input::get("martes_end_t");
          $horario_medico->save();
        }if(Input::get("miercoles") == "on"){
          $horario_medico = new HorarioMedico;
          $horario_medico->medico_id=$medico->id;
          $horario_medico->dow=3;
          $horario_medico->start=Input::get("miercoles_start");
          $horario_medico->end=Input::get("miercoles_end");
          $horario_medico->start_t=Input::get("miercoles_start_t");
          $horario_medico->end_t=Input::get("miercoles_end_t");
          $horario_medico->save();
        }if(Input::get("jueves") == "on"){
          $horario_medico = new HorarioMedico;
          $horario_medico->medico_id=$medico->id;
          $horario_medico->dow=4;
          $horario_medico->start=Input::get("jueves_start");
          $horario_medico->end=Input::get("jueves_end");
          $horario_medico->start_t=Input::get("jueves_start_t");
          $horario_medico->end_t=Input::get("jueves_end_t");
          $horario_medico->save();
        }if(Input::get("viernes") == "on"){
          $horario_medico = new HorarioMedico;
          $horario_medico->medico_id=$medico->id;
          $horario_medico->dow=5;
          $horario_medico->start=Input::get("viernes_start");
          $horario_medico->end=Input::get("viernes_end");
          $horario_medico->start_t=Input::get("viernes_start_t");
          $horario_medico->end_t=Input::get("viernes_end_t");
          $horario_medico->save();

        }if(Input::get("sabado") == "on"){
          $horario_medico = new HorarioMedico;
          $horario_medico->medico_id=$medico->id;
          $horario_medico->dow=6;
          $horario_medico->start=Input::get("sabado_start");
          $horario_medico->end=Input::get("sabado_end");
          $horario_medico->start_t=Input::get("sabado_startt");
          $horario_medico->end_t=Input::get("sabado_end_t");
          $horario_medico->save();
        }if(Input::get("domingo") == "on"){
          $horario_medico = new HorarioMedico;
          $horario_medico->medico_id=$medico->id;
          $horario_medico->dow=7;
          $horario_medico->start=Input::get("domingo_start");
          $horario_medico->end=Input::get("domingo_end");
          $horario_medico->start_t=Input::get("domingo_start_t");
          $horario_medico->end_t=Input::get("domingo_end_t");
          $horario_medico->save();
        }
        $agenda = new ModAgenda;
        $agenda->nombre = "Agenda de " . $medico->titulo . " " . $medico->nombre . " " . $medico->apellido;
        $agenda->medico_id = $medico->id;
        $agenda->save();
        return redirect('admin/medico');
      }
      public function postEditSave($id){
        $medico = ModMedico::findOrFail($id);
        $medico->titulo= Input::get("titulo");
        $medico->especialidad= Input::get("especialidad");
        $user = CmsUser::find($medico->cms_user_id);
        if($user){
          if($medico->especialidad == 1){
            
            $user->id_cms_privileges = 7;
          }else{
            $user->id_cms_privileges = 4;
          }
          $user->save();
        }

        
        
        $medico->nombre= Input::get("nombre");
        $medico->apellido= Input::get("apellido");
        $medico->telefono= Input::get("telefono");
        $medico->email= Input::get("email");
        $medico->id_institucion = Input::get("id_institucion");
        $medico->save();
        
        if(Input::get("lunes") == "on"){
          $horario_medico = count(HorarioMedico::where(["medico_id"=>$medico->id,"dow"=>1])->first()) > 0 ? HorarioMedico::where(["medico_id"=>$medico->id,"dow"=>1])->first(): new HorarioMedico;
          $horario_medico->medico_id=$medico->id;
          $horario_medico->dow=1;
          $horario_medico->start=Input::get("lunes_start");
          $horario_medico->end=Input::get("lunes_end");
          $horario_medico->start_t=Input::get("lunes_start_t");
          $horario_medico->end_t=Input::get("lunes_end_t");
          $horario_medico->save();
        }elseif(is_null(Input::get("lunes"))){
          $horario_medico = HorarioMedico::where(["medico_id"=>$medico->id,"dow"=>1])->first();
          if(count($horario_medico) > 0){
            $horario_medico->delete();
          }
        }


        if(Input::get("martes") == "on"){
          $horario_medico = count(HorarioMedico::where(["medico_id"=>$medico->id,"dow"=>2])->first()) > 0 ? HorarioMedico::where(["medico_id"=>$medico->id,"dow"=>2])->first(): new HorarioMedico;
          $horario_medico->medico_id=$medico->id;
          $horario_medico->dow=2;
          $horario_medico->start=Input::get("martes_start");
          $horario_medico->end=Input::get("martes_end");
          $horario_medico->start_t=Input::get("martes_start_t");
          $horario_medico->end_t=Input::get("martes_end_t");
          $horario_medico->save();
        }elseif(is_null(Input::get("martes"))){
          $horario_medico = HorarioMedico::where(["medico_id"=>$medico->id,"dow"=>2])->first();
          if(count($horario_medico) > 0){
            $horario_medico->delete();
          }
        }

        if(Input::get("miercoles") == "on"){
          $horario_medico = count(HorarioMedico::where(["medico_id"=>$medico->id,"dow"=>3])->first()) > 0 ? HorarioMedico::where(["medico_id"=>$medico->id,"dow"=>3])->first(): new HorarioMedico;
          $horario_medico->medico_id=$medico->id;
          $horario_medico->dow=3;
          $horario_medico->start=Input::get("miercoles_start");
          $horario_medico->end=Input::get("miercoles_end");
          $horario_medico->start_t=Input::get("miercoles_start_t");
          $horario_medico->end_t=Input::get("miercoles_end_t");
          $horario_medico->save();
        }elseif(is_null(Input::get("miercoles"))){
          $horario_medico = HorarioMedico::where(["medico_id"=>$medico->id,"dow"=>3])->first();
          if(count($horario_medico) > 0){
            $horario_medico->delete();
          }
        }

        if(Input::get("jueves") == "on"){
          $horario_medico = count(HorarioMedico::where(["medico_id"=>$medico->id,"dow"=>4])->first()) > 0 ? HorarioMedico::where(["medico_id"=>$medico->id,"dow"=>4])->first(): new HorarioMedico;
          $horario_medico->medico_id=$medico->id;
          $horario_medico->dow=4;
          $horario_medico->start=Input::get("jueves_start");
          $horario_medico->end=Input::get("jueves_end");
          $horario_medico->start_t=Input::get("jueves_start_t");
          $horario_medico->end_t=Input::get("jueves_end_t");
          $horario_medico->save();
        }elseif(is_null(Input::get("jueves"))){
          $horario_medico = HorarioMedico::where(["medico_id"=>$medico->id,"dow"=>4])->first();
          if(count($horario_medico) > 0){
            $horario_medico->delete();
          }
        }


        if(Input::get("viernes") == "on"){
          $horario_medico = count(HorarioMedico::where(["medico_id"=>$medico->id,"dow"=>5])->first()) > 0 ? HorarioMedico::where(["medico_id"=>$medico->id,"dow"=>5])->first(): new HorarioMedico;
          $horario_medico->medico_id=$medico->id;
          $horario_medico->dow=5;
          $horario_medico->start=Input::get("viernes_start");
          $horario_medico->end=Input::get("viernes_end");
          $horario_medico->start_t=Input::get("viernes_start_t");
          $horario_medico->end_t=Input::get("viernes_end_t");
          $horario_medico->save();
        }elseif(is_null(Input::get("viernes"))){
          $horario_medico = HorarioMedico::where(["medico_id"=>$medico->id,"dow"=>5])->first();
          if(count($horario_medico) > 0){
            $horario_medico->delete();
          }
        }


        if(Input::get("sabado") == "on"){
          $horario_medico = count(HorarioMedico::where(["medico_id"=>$medico->id,"dow"=>6])->first()) > 0 ? HorarioMedico::where(["medico_id"=>$medico->id,"dow"=>6])->first(): new HorarioMedico;
          $horario_medico->medico_id=$medico->id;
          $horario_medico->dow=6;
          $horario_medico->start=Input::get("sabado_start");
          $horario_medico->end=Input::get("sabado_end");
          $horario_medico->start_t=Input::get("sabado_start_t");
          $horario_medico->end_t=Input::get("sabado_end_t");
          $horario_medico->save();
          //dd($horario_medico);
        }elseif(is_null(Input::get("sabado"))){
          $horario_medico = HorarioMedico::where(["medico_id"=>$medico->id,"dow"=>6])->first();
          if(count($horario_medico) > 0){
            $horario_medico->delete();
          }
        }


        if(Input::get("domingo") == "on"){
          $horario_medico = count(HorarioMedico::where(["medico_id"=>$medico->id,"dow"=>7])->first()) > 0 ? HorarioMedico::where(["medico_id"=>$medico->id,"dow"=>7])->first(): new HorarioMedico;
          $horario_medico->medico_id=$medico->id;
          $horario_medico->dow=7;
          $horario_medico->start=Input::get("domingo_start");
          $horario_medico->end=Input::get("domingo_end");
          $horario_medico->start_t=Input::get("domingo_start_t");
          $horario_medico->end_t=Input::get("domingo_end_t");
          $horario_medico->save();
        }elseif(is_null(Input::get("domingo"))){
          $horario_medico = HorarioMedico::where(["medico_id"=>$medico->id,"dow"=>7])->first();
          if(count($horario_medico) > 0){
            $horario_medico->delete();
          }
        }
        $agenda = ModAgenda::where("medico_id",$id)->first();
        $agenda->nombre = "Agenda de " . $medico->titulo . " " . $medico->nombre . " " . $medico->apellido;
        $agenda->medico_id = $id;
        $agenda->save();
        return redirect('admin/medico');
      }
    /*
    | ----------------------------------------------------------------------
    | Hook for button selected
    | ----------------------------------------------------------------------
    | @id_selected = the id selected
    | @button_name = the name of button
    |
    */
    public function actionButtonSelected($id_selected, $button_name)
    {
        //Your code here
    }


    /*
    | ----------------------------------------------------------------------
    | Hook for manipulate query of index result
    | ----------------------------------------------------------------------
    | @query = current sql query
    |
    */
    public function hook_query_index(&$query)
    {
       $privilegio = Session::get("admin_privileges");
        $sucursal = Session::get("sucursal");
        if($privilegio != 5){
          $query->where('id_institucion',$sucursal);
        }

    }

    /*
    | ----------------------------------------------------------------------
    | Hook for manipulate row of index table html
    | ----------------------------------------------------------------------
    |
    */
    public function hook_row_index($column_index, &$column_value)
    {
        
        
    }

    /*
    | ----------------------------------------------------------------------
    | Hook for manipulate data input before add data is execute
    | ----------------------------------------------------------------------
    | @arr
    |
    */
    public function hook_before_add(&$postdata)
    {
        //Your code here

    }

    /*
    | ----------------------------------------------------------------------
    | Hook for execute command after add public static function called
    | ----------------------------------------------------------------------
    | @id = last insert id
    |
    */
    public function hook_after_add($id)
    {

    }

    /*
    | ----------------------------------------------------------------------
    | Hook for manipulate data input before update data is execute
    | ----------------------------------------------------------------------
    | @postdata = input post data
    | @id       = current id
    |
    */
    public function hook_before_edit(&$postdata, $id)
    {
        //Your code here

    }

    /*
    | ----------------------------------------------------------------------
    | Hook for execute command after edit public static function called
    | ----------------------------------------------------------------------
    | @id       = current id
    |
    */
    public function hook_after_edit($id)
    {
        //Your code here
    }

    /*
    | ----------------------------------------------------------------------
    | Hook for execute command before delete public static function called
    | ----------------------------------------------------------------------
    | @id       = current id
    |
    */
    public function hook_before_delete($id)
    {
        //Your code here

    }

    /*
    | ----------------------------------------------------------------------
    | Hook for execute command after delete public static function called
    | ----------------------------------------------------------------------
    | @id       = current id
    |
    */
    public function hook_after_delete($id)
    {
        //Your code here

    }

    //By the way, you can still create your own method in here... :)
    public function update(Request $req){
      $user = CmsUser::orderBy('id','desc')->first();      
      $medico = ModMedico::findOrFail($req->get("medico_id"));

      $medico->cms_user_id = $user->id;
      $medico->save();
    }
    /*
     * @$id : id de usuario logueado
     *
     * */
    public function dashboard(){
      $id = CRUDBooster::myId();
      $user = CmsUser::find($id);
      $medico = ModMedico::where("cms_user_id",$user->id)->first();

      return view("medico.dashboard",["medico"=>$medico]);
    }
  }