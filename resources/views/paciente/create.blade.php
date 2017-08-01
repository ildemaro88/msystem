@extends("crudbooster::admin_template")
@section("content")

<style media="screen">
.center {
   z-index: 1000;
   margin-top: 200px;
   width: 130px;
   height: 130px;
   background-color: White;
   border-radius: 10px;
   filter: alpha(opacity=100);
   opacity: 1;
   -moz-opacity: 1;
  }
  .center img {
      z-index: 1001;
      height: 64px;
      width: 64px;
      margin-top: 33px;
  }
.sucursal{
  	background-color: #3c8dbc !important;
  }

</style>



<div class = "box" ng-app="MyApp" ng-controller="controllerPaciente">
	<div class = "box-body">
		<form id="form_paciente" method="POST" action="" name="form_paciente" >
			{{ csrf_field() }}
			<div class="form-group  row">
	            <div class="col-md-6 ">
	                <label for="name" class="control-label">
	                	Nombres
						<span class="text-danger" title="Este campo es obligatorio">*</span>
	                </label>                                
	                <input type="text" class="form-control" id="nombre" placeholder="Nombres del paciente" name="nombre" ng-model="nombre">
	                    
	            </div>
	            <div class="col-md-6 ">
	                <label for="name" class="control-label">
	                	Apellidos
						<span class="text-danger" title="Este campo es obligatorio">*</span>
	                </label>                                
	                <input type="text" class="form-control" id="apellido" placeholder="Apellidos del paciente" name="apellido" ng-model="apellido">
	                    
	            </div>	    
	                      
	        </div>	      
	        <div class="form-group row">
	        	<div class="col-md-4 div">
	                <label class="control-label" for="telefono_user">Cédula</label>
	                <span class="text-danger" title="Este campo es obligatorio">*</span>                                
	                <input onkeypress="return isNumberKey(this);" type="text" class="form-control" id="cedula" name="cedula" placeholder="Introduzca número de cédula " ng-model="cedula">
	            </div>
	           <div class="col-md-4 div">
	                <label class="control-label" for="telefono_user">Pasaporte</label>
	                <span class="text-danger" title="Este campo es obligatorio">*</span>                                
	                <input onkeypress="return isNumberKey(this);" type="text" class="form-control" id="pasaporte" name="pasaporte" placeholder="Introduzca número de cédula " ng-model="pasaporte">
	            </div>
	            <div class="col-md-4 div">
	                <label class="control-label" for="telefono_user">Otro</label>
	                <span class="text-danger" title="Este campo es obligatorio">*</span>                                
	                <input onkeypress="return isNumberKey(this);" type="text" class="form-control" id="otro" name="otro" placeholder="Introduzca número de cédula " ng-model="otro">
	            </div>
	            	    	           
	        </div>
	        <div class="form-group row ">
	            <div class="col-md-6 div">
	                <label class="control-label" for="fecha_nac">Fecha de nacimiento</label>  
					<div class="input-group">  								
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
						<input type="text" title="Fecha Nacimiento" class="form-control notfocus datepicker datepickerfecha_nac" name="fecha_nac" ng-model="fecha_nac" id="fecha_nac" value="">						
					</div>                	
	                                 
	            </div>
	            <div class="col-md-6 div">
	                <label class="control-label" for="lugar_nac">Lugar de nacimiento</label>    			                       
	                <input type="text" class="form-control" id="lugar_nac" name="lugar_nac" placeholder="Introduzca lugar de nacimiento" ng-model="lugar_nac">	                 
	            </div>
	        </div>
	        <div class="form-group row ">
	            <div class="col-md-6 div">
	                <label class="control-label" for="sexo">Sexo</label>  
	                <select class="form-control" id="sexo" name="sexo" ng-model="sexo">
	                	<option value="">** Seleccione el sexo</option> 
	                    <option value="FEMENINO">FEMENINO</option>   
	                    <option value="MASCULINO">MASCULINO</option>                                      
	                    <option value="OTRO">OTRO</option> 
	                </select>               		    
	                               
	            </div>
	            <div class="col-md-6 div">
	                <label class="control-label" for="raza">Raza</label>  
	                <select class="form-control" id="raza" name="raza" ng-model="raza">
	                	<option value="">** Seleccione la raza</option> 
	                	<option value="BLANCO">BLANCO</option> 
	                    <option value="NEGRO">NEGRO</option>   
	                    <option value="MESTIZO">MESTIZO</option>                                      
	                    <option value="OTRO">OTRO</option> 
	                </select>   
	                                 
	            </div>
	        </div>
	        <div class="form-group row ">
	            <div class="col-md-6 div">
	                <label class="control-label" for="estado_civil">Estado civil</label>  
	                <select class="form-control" id="estado_civil" data-value="" ng-model="estado_civil" name="estado_civil">
						<option value="">** Seleccione  Estado civil</option>
						<option value="SOLTERO">SOLTERO</option>
						<option value="CASADO">CASADO</option>
						<option value="DIVORCIADO">DIVORCIADO</option>
						<option value="VIUDO">VIUDO</option>
						<option value="UNION LIBRE">UNION LIBRE</option>
					</select>
	                                 
	            </div>
	            <div class="col-md-6 div">
	                <label class="control-label" for="lugar_nac">Instrucción</label>     			               
	                <select class="form-control" id="instruccion" data-value="" ng-model="instruccion" name="instruccion">
						<option value="">** Seleccione  Instrucción</option>
						<option value="PRIMARIA">PRIMARIA</option>
						<option value="SECUNDARIA">SECUNDARIA</option>
						<option value="SUPERIOR">SUPERIOR</option>		
					</select>
	                                 
	            </div>
	        </div>
	       
	        <div class="form-group row ">
	        	<div class="col-md-6 ">
			        <label for="email" class="control-label">
		            	Correo 
						<span class="text-danger" title="Este campo es obligatorio">*</span>
		            </label>  
					<div class="input-group">
	                	<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
	                	<input type="text" placeholder="Introduzca correo electrónico" title="Correo" required="" class="form-control" name="email" id="email" ng-model="email">
	              	</div>							
					<div class="text-danger"></div>
					<p class="help-block"></p>
				</div>
				<div class="col-md-6 ">
	                <label for="id_empresa" class="control-label">Empresa</label>
	                <select class="form-control" id="id_empresa" name="id_empresa" ng-model="id_empresa">
	                    <option value="">Particular</option>                                        
	                   @foreach($empresas as $empresa)
						<option value="{{$empresa->id}}">{{$empresa->nombre}}</option> 
	                   @endforeach
	                </select>
	            </div>

			</div>
			<div class="form-group row ">
	            <div class="col-md-6 div">
	                <label class="control-label" for="direccion">Dirección</label>  
	                                   
	                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Introduzca la dirección" ng-model="direccion">	                 
	            </div>
	            <div class="col-md-6 div">
	                <label class="control-label" for="telf_domicilio">Telf. Domicilio</label>  
	                                
	                <input type="text" class="form-control" id="telf_domicilio" name="telf_domicilio" placeholder="Introduzca teléfono de Domicilio" ng-model="telf_domicilio">	                 
	            </div>
	        </div>
	        <div class="form-group row ">
	            <div class="col-md-6 div">
	                <label class="control-label" for="telf_trabajo">Telf. Trabajao</label>  
	                       
	                <input type="text" class="form-control" id="telf_trabajo" name="telf_trabajo" placeholder="Introduzca teléfono de trabajo" ng-model="telf_trabajo">	                 
	            </div>
	            <div class="col-md-6 div">
	                <label class="control-label" for="celular">Celular</label>  
	               
	                <input type="text" class="form-control" id="celular" name="celular" placeholder="Introduzca teléfono celular" ng-model="celular">	                 
	            </div>
	        </div>
	        <div class="form-group row ">
	            <div class="col-md-6 div">
	                <label class="control-label" for="referencia">Familiar</label>  
	                
	                <input type="text" class="form-control" id="referencia" name="referencia" placeholder="Introduzca nombre de un familiar" ng-model="referencia">	                 
	            </div>
	            <div class="col-md-6 div">
	                <label class="control-label" for="telf_referencia">Telf. Referencia</label>  
	                
	                <input type="text" class="form-control" id="telf_referencia" name="telf_referencia" placeholder="Introduzca el teléono del familiar" ng-model="telf_referencia">	                 
	            </div>
	        </div>
			
		</form>
	</div>
	<div class = "panel-footer">
		<div>
			<input class = "btn btn-success" id="btnSave" type= "button" style= "margin-left: 10px;" value= "Guardar" ng-click= "toggle('{{$operation}}')">
		</div>
	</div>


<!-- HTML del Modal de Loading-->

<div class = "modal" style = "display: none" align = "center">
	<div class = "center">
		<img alt = "" src = "{{asset('img/loading_animation.gif')}}" />
	</div>
</div>

	        
<script type="text/javascript">

				
	$('.datepicker').datepicker({language:'es',autoclose:true,format:'yyyy-mm-dd'});
			
	//Declaracion de la aplicacion

	 var app = angular.module('MyApp', [], function ($interpolateProvider)
	{
		$interpolateProvider.startSymbol('[[');
		$interpolateProvider.endSymbol(']]');
	});

	//Declaracion de la url base del proyecto.
	// URL_BASE se declara en el archivo public/js/configServer.js

	app.constant('API_URL', URL_BASE);

	//Implementacion de la controladora de angular

	app.controller("controllerPaciente", function ($scope, $http, API_URL)
	{

	//Como inician los campos

	$scope.init = function ()
	{
		$scope.nombre = "{{($operation == 'update')?$paciente->nombre :''}}";
		$scope.apellido = "{{($operation == 'update')?$paciente->apellido :''}}";
		$scope.cedula = "{{($operation == 'update')?$paciente->cedula :''}}";
		$scope.pasaporte = "{{($operation == 'update')?$paciente->pasaporte :''}}";
		$scope.otro = "{{($operation == 'update')?$paciente->otro :''}}";
		$scope.fecha_nac = "{{($operation == 'update')?$paciente->fecha_nac :''}}";
		$scope.lugar_nac = "{{($operation == 'update')?$paciente->lugar_nac :''}}";
		$scope.sexo = "{{($operation == 'update')?$paciente->sexo :''}}";
		$scope.raza = "{{($operation == 'update')?$paciente->raza :''}}";
		$scope.estado_civil = "{{($operation == 'update')?$paciente->estado_civil :''}}";
		$scope.instruccion = "{{($operation == 'update')?$paciente->instruccion :''}}";
		$scope.email = "{{($operation == 'update')?$paciente->email :''}}";
		$scope.direccion = "{{($operation == 'update')?$paciente->direccion :''}}";
		$scope.telf_domicilio = "{{($operation == 'update')?$paciente->telf_domicilio :''}}";
		$scope.telf_trabajo = "{{($operation == 'update')?$paciente->telf_trabajo :''}}";
		$scope.celular = "{{($operation == 'update')?$paciente->celular :''}}";
		$scope.referencia = "{{($operation == 'update')?$paciente->referencia :''}}";
		$scope.telf_referencia = "{{($operation == 'update')?$paciente->telf_referencia :''}}";
		$scope.id_empresa = "{{($operation == 'update')?$paciente->id_empresa :''}}";
	};

	 //Ejecuto la funcion anterior init()

	$scope.init();

	//Implementacion de método para crear un JSON a partir de la serializacion del FORM

	$scope.serializeObject = function (obj)
	{
		var o = {};
		var a = obj.serializeArray();
		$.each(a, function ()
		{
			if (o[this.name] !== undefined) {
				if (!o[this.name].push) {
					o[this.name] = [o[this.name]];
				}
				o[this.name].push(this.value || '');
			} else {
				o[this.name] = this.value || '';
			}
		});

		o=JSON.stringify(o);
		o= o.replace(/\\r\\n/g, "\\\\n");
		o=JSON.parse(o);

		return o;
	};

	//Implementacion de método que crea un switsh que tiene 2 casos,
	// uno para AÑADIR y otro para ACTUALIZAR.
	// El parametro (operation) puede tomar valores de
	//add o update

	$scope.toggle = function (operation)
	{
		switch (operation) {
			case 'add':

				$(".modal").modal('show');
				console.log($scope.serializeObject($("#form_paciente")));
				$http({
					url    : API_URL + 'paciente',
					method : 'POST',
					params : $scope.serializeObject($("#form_paciente")),
					headers: {
						'Content-Type': 'application/x-www-form-urlencoded'
					}
				}).then(function (response)
				{
					$(".modal").modal('hide');
					if (response.data.response) {
						swal({
							title: "Buen trabajo!",
							text: "Se ha guardado exitosamente!",
							type: "success",
							showCancelButton: false,
							confirmButtonClass: "btn-succes",
							confirmButtonText: "OK",
							closeOnConfirm: true
						},
						function(){
							$(".modal").modal('show');
							window.location = "{{ url('/admin/paciente?m=11') }}";
						});
					} else {
						swal("Error", "¡No se guardó!", "error");
					}
				});

				break;

			case 'update':

				$(".modal").modal('show');

				$http({
					url    : API_URL + 'paciente/{{$paciente->id}}',
					method : 'PUT',
					params : $scope.serializeObject($("#form_paciente")),
					headers: {
						'Content-Type': 'application/x-www-form-urlencoded'
					}
				}).then(function (response)
				{
					$(".modal").modal('hide');
					if (response.data.response) {
						swal({
							title: "Buen trabajo!",
							text: "Actualización exitosa!",
							type: "success",
							showCancelButton: false,
							confirmButtonClass: "btn-succes",
							confirmButtonText: "OK",
							closeOnConfirm: true
						},
						function(){
							$(".modal").modal('show');
							window.location = "{{ url('/admin/paciente?m=11') }}";
						});
						} else {
							swal("Error", "No se actualizó", "error");
						}
					});
					break;
		}
	}
});



</script>


@endsection	        