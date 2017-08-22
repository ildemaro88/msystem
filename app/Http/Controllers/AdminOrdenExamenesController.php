<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use crocodicstudio\crudbooster\helpers\CRUDBooster;
use App\ModOrdenExamenes;
use App\ModOrden;
use App\ModMedico;
use App\ModExamen;
use App\ModTipoExamen;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection as Collection;
use App\ModPaciente;
use Session;
use Carbon\Carbon;


class AdminOrdenExamenesController extends \crocodicstudio\crudbooster\controllers\CBController {

	public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "id";
			$this->limit = "20";
			$this->orderby = "id,desc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_action_style = "button_icon";
			$this->button_add = true;
			$this->button_edit = false;
			$this->button_delete = false;
			$this->button_detail = false;
			$this->button_show = false;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "orden_examenes";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Tipo de Examen","name"=>"tipo"];
			$this->col[] = ["label"=>"Cedúla","name"=>"ci"];
			$this->col[] = ["label"=>"Paciente","name"=>"paciente"];
			$this->col[] = ["label"=>"Fecha","name"=>"fecha"];
			$this->col[] = ["label"=>"Examenes","name"=>"lista"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
		$this->form = array();

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
		|boton eliminar = ,['label'=>'','icon'=>'fa fa-trash','color'=>'warning','id'=>'[id]','url'=>'[id]']
		*/
		$this->addaction = array(['label'=>'','icon'=>'fa fa-pencil','url'=>CRUDBooster::mainpath('edit').'/[id]','color'=>'success'],['label'=>'','icon'=>'fa fa-print','target'=>'_blank','color'=>'primary print','url'=>CRUDBooster::mainpath($slug='').'/[id]/print']);


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
			$(".print").attr("target","_blank");
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
		$query->where('id_medico',$medico_id->id)->where('tipo_orden','PARTICULAR');


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
		$medico_id = ModMedico::where("cms_user_id",CRUDBooster::myId())->first();
		$medico = ModMedico::find($medico_id->id);
		$operation = 'add';
		$examenes = DB::table('examen')->select('examen.id','examen.slug','examen.nombre','examen.id_categoria_examen','categoria_examen.nombre as categoria','tipo_examen.nombre as tipo','tipo_examen.id as id_tipo_examen')->join('categoria_examen','categoria_examen.id','=','examen.id_categoria_examen')->join('tipo_examen','tipo_examen.id','=','categoria_examen.id_tipo_examen')->get();
		if(Session::has('paciente_ingresao')){
          $paciente_ingresado = Session::get('paciente_ingresao');
        }else{
          $paciente_ingresado = 0;
        }
		$tipos =DB::table('tipo_examen')->select('nombre','id')->get();
		$categorias =DB::table('categoria_examen')->select('nombre','id','id_tipo_examen')->get();

		foreach ($tipos as $tipo) {
			foreach ($examenes as $examen) {
				if($tipo->id == $examen->id_tipo_examen){
					$pruebas[$tipo->id][] =$examen;
				}														
			}
		}

		$pruebas = Collection::make($pruebas);
		
		$medicos =  ModMedico::all();
		$pacientes = ModPaciente::all();
		//$medicos = $medico->all();
		$page_title = 'Orden Examen ('.$medico->titulo.$medico->nombre.' '.$medico->apellido.")";
		return view("ordenExamenes.index",compact('page_title', 'categorias','operation','medico','pacientes','pruebas','tipos','paciente_ingresado'));
	}

	public function getEdit($id){
		$operation = 'update';
		$medico_id = ModMedico::where("cms_user_id",CRUDBooster::myId())->first();
		$medico = ModMedico::find($medico_id->id);
		$page_title = 'Orden Examen ('.$medico->titulo.$medico->nombre.' '.$medico->apellido.")";
		$medicos =  ModMedico::all();
		$pacientes = ModPaciente::all();
		$orden = ModOrden::find($id);
		$examenes= $orden->examenes;		
		$examenes = json_decode($examenes,true);		
		$txt = 'txt';
		
		foreach ($examenes as $examen) {
			$exa = ModExamen::find($examen['id_examen']);

			$examen['slug'] = $exa->slug;
			
			$pos = strpos($examen['slug'], $txt);
			if($pos === false){
				$a[$examen['slug']]="on";
			}else{
				$a[$examen['slug']]=$examen['observacion'];
			}
		}

		$a = json_encode($a);


		return view("ordenExamenes.index", ["orden"=>$orden,"examenes"=>$a],compact('page_title', 'operation','medicos','pacientes'));

	}

	public function printPDF($id){
		$medico = ModMedico::where("cms_user_id",CRUDBooster::myId())->first();
		$orden = ModOrdenExamenes::where('id_orden',$id)->firstOrFail();
		$tipos =DB::table('orden_pdf')->select('tipo_id')->where(['id' => $id])->groupBy('tipo_id')->get();
		$examenes= DB::table('orden_pdf')->select('*')->where(['id' => $id])->get();
		$pdf = \PDF::loadView('ordenExamenes.pdf',['examenes' => $examenes,'tipos' => $tipos]);
		$pdf->setPaper('A5');

		return $pdf->stream();
	}


	/**
	* Store a newly created resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @return \Illuminate\Http\Response
	*/
	public function store(Request $request){

		$hoy= Carbon::now();
		$hoy = $hoy->format('Y-m-d');
		$medico_id = ModMedico::where("cms_user_id",CRUDBooster::myId())->first();
		$tipos = ModTipoExamen::all();
		$examenes = $request->input('examenes');
		$examenes = array_filter($examenes);
		$examen = ModExamen::find(key($examenes));
		
		foreach ($tipos as $tipo) {
			$orden = new ModOrden;
			$orden->id_medico   = $medico_id->id;
			$orden->id_tipo_orden = 4;
			$orden->id_paciente = $request->get('id_paciente');
			$orden->fecha = $hoy;
			foreach ($examenes as $key => $value) {
			
				$tipo_examen = ModExamen::find($key)->categoria->tipo->id;
				if($tipo_examen == $tipo->id){
					$orden->save();
					$orden_examen =  new ModOrdenExamenes;
					$orden_examen->id_orden  = $orden->id;						
					$orden_examen->id_examen = $key;
					($value != "on")?$orden_examen->observacion =$value:$orden_examen->observacion =" ";
					$response = $orden_examen->save();
				}

			}		
			
		}
		
		

		return response()->json([
			"response" => $response,
			"orden_examen" =>$orden_examen]
		);
	}

	/**
	* Update the specified resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function update(Request $request, $id)
	{
		$hoy = Carbon::now();
		$hoy = $hoy->format('Y-m-d');
		$orden = ModOrden::findOrFail($id);		
		$id_medico = $orden->id_medico;
		$orden->delete();
		$examenes = $request->input('examenes');
		$examenes = array_filter($examenes);
		$delete = ModOrdenExamenes::where('id_orden', $id)->delete();
		$tipos = ModTipoExamen::all();

		foreach ($tipos as $tipo) {
			$orden = new ModOrden;
			$orden->id_medico   = $id_medico;
			$orden->id_tipo_orden = 4;
			$orden->id_paciente = $request->get('id_paciente');
			$orden->fecha = $hoy;
			foreach ($examenes as $key => $value) {
			
				$tipo_examen = ModExamen::find($key)->categoria->tipo->id;
				if($tipo_examen == $tipo->id){
					$orden->save();
					$orden_examen =  new ModOrdenExamenes;
					$orden_examen->id_orden  = $orden->id;						
					$orden_examen->id_examen = $key;
					($value != "on")?$orden_examen->observacion =$value:$orden_examen->observacion =" ";
					$response = $orden_examen->save();
				}

			}		
			
		}
		

		return response()->json([
			"response" => $response,
			"laboratorio" =>$orden]
		);

	}


	/**
	* Remove the specified resource from storage.
	*
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function getDelete($id)
	{
		$medico_id = ModMedico::where("cms_user_id",CRUDBooster::myId())->first();
		$delete= ModOrden::find($id)->delete();

		return $delete;
	}



	}