<?php namespace App\Http\Controllers;

	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller;
	use crocodicstudio\crudbooster\helpers\CRUDBooster;
	use App\ModOrdenExamenes;
	use App\ModOrden;
	use App\ModMedico;
	use App\ModExamen;
	use App\ModTipoExamen;
	use App\ModResultadoExamen;
	use Illuminate\Support\Facades\DB;
	use Illuminate\Support\Collection as Collection;
	use App\ModPaciente;
	use Session;
	use Carbon\Carbon;

	class AdminOrdenExamenesCargaController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "id";
			$this->limit = "20";
			$this->orderby = "id,desc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_action_style = "button_icon";
			$this->button_add = false;
			$this->button_edit = false;
			$this->button_delete = false;
			$this->button_detail = false;
			$this->button_show = true;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "orden_examenes_carga";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Tipo Orden","name"=>"tipo_orden"];
			$this->col[] = ["label"=>"Tipo Examen","name"=>"tipo"];
			$this->col[] = ["label"=>"C.I.","name"=>"ci"];
			$this->col[] = ["label"=>"Paciente","name"=>"paciente"];
			$this->col[] = ["label"=>"Empresa","name"=>"empresa"];
			$this->col[] = ["label"=>"Exámenes","name"=>"lista"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Lista',
  'name' => 'lista',
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
  'label' => 'Ci',
  'name' => 'ci',
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
  'label' => 'Nacimiento',
  'name' => 'nacimiento',
  'type' => 'date',
  'validation' => 'required|date',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'style' => NULL,
  'help' => NULL,
  'placeholder' => NULL,
  'readonly' => NULL,
  'disabled' => NULL,
  'label' => 'Telefono',
  'name' => 'telefono',
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
  'label' => 'Empresa',
  'name' => 'empresa',
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
  'label' => 'Telefonom',
  'name' => 'telefonom',
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
  'type' => 'textarea',
  'validation' => 'required|string|min:5|max:5000',
  'width' => 'col-sm-10',
);
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
  'label' => 'Tipo Orden',
  'name' => 'tipo_orden',
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
  'label' => 'Tipo',
  'name' => 'tipo',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'dataenum' => NULL,
  'datatable' => 'tipo,id',
  'style' => NULL,
  'help' => NULL,
  'datatable_where' => NULL,
  'datatable_format' => NULL,
  'datatable_exception' => NULL,
  'label' => 'Tipo Id',
  'name' => 'tipo_id',
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
  'label' => 'Categoria',
  'name' => 'categoria',
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
  'label' => 'Fecha',
  'name' => 'fecha',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'dataenum' => NULL,
  'datatable' => 'categoria,id',
  'style' => NULL,
  'help' => NULL,
  'datatable_where' => NULL,
  'datatable_format' => NULL,
  'datatable_exception' => NULL,
  'label' => 'Categoria',
  'name' => 'id_categoria',
  'type' => 'select2',
  'validation' => 'required|integer|min:0',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'dataenum' => NULL,
  'datatable' => 'examen,id',
  'style' => NULL,
  'help' => NULL,
  'datatable_where' => NULL,
  'datatable_format' => NULL,
  'datatable_exception' => NULL,
  'label' => 'Examen',
  'name' => 'id_examen',
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
  'label' => 'Slug',
  'name' => 'slug',
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
  'label' => 'Nombre Examen',
  'name' => 'nombre_examen',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'dataenum' => NULL,
  'datatable' => 'orden,id',
  'style' => NULL,
  'help' => NULL,
  'datatable_where' => NULL,
  'datatable_format' => NULL,
  'datatable_exception' => NULL,
  'label' => 'Orden Id',
  'name' => 'orden_id',
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
  'label' => 'Observacion',
  'name' => 'observacion',
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
  'label' => 'Pacienteid',
  'name' => 'pacienteid',
  'type' => 'number',
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
  'label' => 'Estado',
  'name' => 'estado',
  'type' => 'number',
  'validation' => 'required|integer|min:0',
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
	        $this->addaction = array(['label'=>'','icon'=>'fa fa-cloud-upload','target'=>'_blank','color'=>'success upload','url'=>CRUDBooster::mainpath($slug='').'/[id]/upload']);


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
			$(".upload").attr("title","Cargar Resultados");
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
	        //Your code here
	            
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
		* upload the specified resource in storage.
		*
		* @param  \Illuminate\Http\Request  $request
		* @param  int  $id
		* @return \Illuminate\Http\Response
		*/
		public function uploadResult($id)
		{
			$operation = 'add';
			$medico_id = ModMedico::where("cms_user_id",CRUDBooster::myId())->first();
			$medico = ModMedico::find($medico_id->id);			
			$medicos =  ModMedico::all();			
			$orden = ModOrden::find($id);
			$paciente = ModPaciente::find($orden->id_paciente);
			$page_title = 'Orden de Examen ('.$paciente->nombre.' '.$paciente->apellido.")";
			$examenes= $orden->examenes()->where('id_estado', '3')->get();		

			//dd($examenes);
			$tipos_ordenes = DB::table('tipo_orden')->select('*')->where('descripcion','!=','PARTICULAR')->get();
			return view("resultadoExamen.create", compact('page_title', 'operation','orden','examenes'));

		}

		/**
		* guarda un archivo en nuestro directorio local.
		*
		* @return Response
		*/
		public function saveResult(Request $request)
		{

			$examenes_realizados = $request->input('examenes');		
			$examenes_realizados = array_filter($examenes_realizados);
			
			foreach ($examenes_realizados as $examen_realizado) {
				$orden = ModOrdenExamenes::where('id_orden',$request->get('id_orden'))->where('id_examen',$examen_realizado)->first();
				$orden->id_estado = 4;
				$orden->save();				
			}
			
			$mime = $request->file('archivo')->getMimeType();
			if($mime == 'application/pdf'){
				$resultado = (new ModResultadoExamen)->fill($request->all());
				$resultado->archivo = $request->file('archivo')->store('public');

				$response = $resultado->save();
				$title ="Buen trabajo!";
				$type = 'success';
				$mensaje = 'Se ha guardado exitosamente!';
				$close = false;
				$show = true;
			}else{
				$title ="Error";
				$type = 'error';
				$mensaje = 'El archivo debe ser un PDF';
				$close = true;
				$show = false;
				
			}
			//dd($mime);
			$response=["response" => $response,
				"title" => $title,
				"mensaje" => $mensaje,
				"type" => $type,
				"close"=> $close,
				"show" => $show];
				//dd($response);
			return $response;
		      // $request->file('archivo')->store('public');
		}


	}