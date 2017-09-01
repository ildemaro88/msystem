<?php namespace App\Http\Controllers;

	use Session;
	
  	use Illuminate\Http\Request;
	use DB;
	use CRUDBooster;
	use App\ModEmpresa;
	use App\ModUsuarioEmpresa;
	use App\ModConvenios;	
	use App\CmsUser;
	use App\Mail\EmailEmpresa;	
	use Mail;
	use Storage;

	class AdminEmpresaController extends \crocodicstudio\crudbooster\controllers\CBController {

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
			$this->button_detail = false;
			$this->button_show = true;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "empresa";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"ID Empresa","name"=>"id"];
			$this->col[] = ["label"=>"Nombre","name"=>"nombre"];
			$this->col[] = ["label"=>"Ruc","name"=>"ruc"];
			$this->col[] = ["label"=>"Telefono","name"=>"telefono"];
			$this->col[] = ["label"=>"Direccion","name"=>"direccion"];
			$this->col[] = ["label"=>"Correo","name"=>"correo"];
			$this->col[] = ["label"=>"Convenio","name"=>"id_convenio","join"=>"convenio,nombre"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
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
  'label' => 'Ruc',
  'name' => 'ruc',
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
  'label' => 'Direccion',
  'name' => 'direccion',
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
  'label' => 'Correo',
  'name' => 'correo',
  'type' => 'text',
  'validation' => 'required|min:3|max:255',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'dataenum' => NULL,
  'datatable' => 'empresa,nombre',
  'style' => NULL,
  'help' => NULL,
  'datatable_where' => NULL,
  'datatable_format' => NULL,
  'datatable_exception' => NULL,
  'label' => 'Padre',
  'name' => 'id_padre',
  'type' => 'select2',
  'validation' => 'required|integer|min:0',
  'width' => 'col-sm-10',
);
			$this->form[] = array (
  'dataenum' => NULL,
  'datatable' => 'convenio,nombre',
  'style' => NULL,
  'help' => NULL,
  'datatable_where' => NULL,
  'datatable_format' => NULL,
  'datatable_exception' => NULL,
  'label' => 'Convenio',
  'name' => 'id_convenio',
  'type' => 'select2',
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
	        if(Session::get('admin_privileges') === 5 ){
	        $this->addaction =  array(['label'=>'','icon'=>'fa fa-plus','target'=>'_blank','color'=>'primary add_sucursales','url'=>CRUDBooster::mainpath($slug='').'/[id]/add/sucursal'],['label'=>'','icon'=>'fa fa-building-o','target'=>'_blank','color'=>'primary sucursales','url'=>CRUDBooster::mainpath($slug='').'/[id]/sucursales']);
	    	}

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
	        	
      $(".sucursales").attr("title","Ver sucursales");
      $(".add_sucursales").attr("title","Agregar sucursal");
      $(".eliminar").attr("title","Eliminar");
      $(".print").attr("target","_blank");
      $(".print_r").attr("target","_blank");
      $(".eliminar").click(function(e){
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
	    	//dd(Session::get('admin_privileges'));
	    	if(Session::get('admin_privileges') !== 5 ){
	    		$query->whereNotIn('empresa.id', function($q){
		          $q->select('id_padre')
		            ->from('empresa');
		        });
	    	}else{
	    		$query->where('empresa.id_padre',0);
	    	}
	      //
	        
	            
	    
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



	    public function getAdd(){

     	    //Título y tipo de operación a realizar.
	        $operation = 'add';
	        $page_title = 'Agregar Empresa';
	        //Buscamos todos los convenios creados
	        $convenios = ModConvenios::all();
	        return view("empresa.create",compact('page_title', 'operation','convenios')); 
	    }


		public function getEdit($id){

			//Título y tipo de operación a realizar.
			$operation = 'update';
			$page_title = 'Editar Empresa';

			//se busca la empresa a editar
			$empresa = ModEmpresa::where('id',$id)->firstOrFail();

			if($empresa->id_padre != 0){
				//se busca la empresa padre
				$empresa_padre = ModEmpresa::where('id',$empresa->id_padre)->firstOrFail();
				$page_title = 'Editar Surcursal de la empresa: '.$empresa_padre->nombre;
			}

			//Se toman todos los convenios creados
	        $convenios = ModConvenios::all();
	        return view("empresa.create",compact('page_title', 'operation','convenios','empresa')); 
		}

	    public function store(Request $request){
			$empresa =  new ModEmpresa;
			$empresa->nombre = $request->get('nombre');
			$empresa->ruc = $request->get('ruc');
			$empresa->telefono = $request->get('telefono');
			$empresa->correo = $request->get('correo');
			$empresa->direccion = $request->get('direccion');
			$empresa->id_convenio = $request->get('id_convenio');

			if($request->get('id_padre')){// validamos sí es una sucursal 
				$empresa->id_padre = $request->get('id_padre');	
				$response = $empresa->save();			
			}else{ // Sí no es una sucursal creamos el usuario para la empresa
				$empresa->id_padre = 0;
				//$mime = $request->file('logo')->getMimeType();				
				//if($mime == 'image/jpg'){
				$empresa->logo =($request->logo)?$request->logo->store('logos'):null;
				$photo=($request->logo)?$request->logo->store(date("Y") .'-'. date("m")):null;
		        $response = $empresa->save();
		       
				$title ="Buen trabajo!";
				$type = 'success';
				$mensaje = 'Se ha guardado exitosamente!';
				$close = false;
				$show = true;
			/*}else{
				$title ="Error";
				$type = 'error';
				$mensaje = 'La imagen debe ser jpg';
				$close = true;
				$show = false;
				
			}*/
			
				$this->createUser($empresa,$photo);
				
			}			
			
			return response()->json([
				"response" => $response,
				"title" => $title,
				"mensaje" => $mensaje,
				"type" => $type,
				"close"=> $close,
				"show" => $show,
				"empresa" =>$empresa]
			);
		}

		public function update(Request $request, $id){
		 	$empresa = ModEmpresa::findOrFail($id); 
		 	$correoEmpresa = $empresa->correo;
		 	$rucEmpresa = $empresa->ruc;
			$empresa->nombre = $request->get('nombre');
			$empresa->ruc = $request->get('ruc');
			$empresa->telefono = $request->get('telefono');
			$empresa->correo = $request->get('correo');
			$empresa->direccion = $request->get('direccion');
			$empresa->id_convenio = $request->get('id_convenio');
			$empresa->logo =($request->logo)?$request->logo->store('logos'):$empresa->logo;
			if($request->get('id_padre')){
				$empresa->id_padre = $request->get('id_padre');
			}else{
				$empresa->id_padre = 0;
				if($correoEmpresa != $empresa->correo || $rucEmpresa != $empresa->ruc){

					$relacion = ModUsuarioEmpresa::where('id_empresa',$id)->first(); 					
						$usuario = CmsUser::findOrFail($relacion->id_cms_users);
						$usuario->name = $empresa->nombre;
				        $usuario->email = $empresa->correo;
				        $usuario->password = bcrypt($empresa->ruc);
				        $usuario->save();
			         /*
			          * Envio de e-mail cuando se actualiza el usuario para la empresa
			          * 
			         */
			         Mail::to(trim($empresa->correo))->send(new EmailEmpresa($empresa,true));

					
				}
			}
			$sucursales = ModEmpresa::where('id_padre',$id)->get();
			foreach ($sucursales as $sucursal) {
				$sucursal_updated = ModEmpresa::findOrFail($sucursal->id);
				$sucursal_updated->id_convenio = $request->get('id_convenio');
				$sucursal_updated->save();
				
			}
			$response = $empresa->save();
			return response()->json([
				"response" => $response,				
				"empresa" =>$empresa]);
		}

		public function addSucursal($id){
			$empresa = ModEmpresa::findOrFail($id); 
			
			//Título y tipo de operación a realizar.
			$operation = 'add';
			$page_title = 'Agregar sucursal a la empresa: '.$empresa->nombre;
			return view("empresa.sucursal",compact('page_title', 'operation','empresa'));

		}

		public function getSucursales($id){
			Session::put('id_padre',$id);
			$empresa = ModEmpresa::findOrFail($id); 
			$page_title = 'Sucursales de la empresa: '.$empresa->nombre;
			return redirect('admin/sucursal?m=92')->with('page_title', ['hola']);
		}

		public function createUser(ModEmpresa $empresa,$photo){
	        $usuario = new CmsUser;
	        $usuario->name = $empresa->nombre;
	        $usuario->photo = ($photo !== null)?"uploads/".$photo:$photo;
	        $usuario->email = $empresa->correo;
	        $usuario->password = bcrypt($empresa->ruc);
	        $usuario->id_cms_privileges = 9;
	        $usuario->save();

	        $usuarioEmpresa = new ModUsuarioEmpresa;
	        $usuarioEmpresa->id_cms_users = $usuario->id;
	        $usuarioEmpresa->id_empresa = $empresa->id;
	        $usuarioEmpresa->save();

	         /*
	          * Envio de e-mail cuando se genera el usuario para la empresa
	          * 
	         */
	         Mail::to(trim($usuario->email))->send(new EmailEmpresa($empresa,false));

		}


	}