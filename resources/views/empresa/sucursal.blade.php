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


</style>

<p><a title="Volver" id = "volver" href=""><i class="fa fa-chevron-circle-left"></i>&nbsp; Volver a la  Empresa</a><div id="message">
</div></p>
<div class = "box" ng-app="MyApp" ng-controller="controllerEmpresa">
	<div class = "box-body">
		<form id="form_empresa" method="POST" action="" name="form_empresa" >
			{{ csrf_field() }}
			<div class="form-group  row">
	            <div class="col-md-6 ">
	                <label for="name" class="control-label">
	                	Nombre
						<span class="text-danger" title="Este campo es obligatorio">*</span>
	                </label>                                
	                <input type="text" class="form-control" id="nombre" placeholder="Nombre de la empresa" name="nombre" ng-model="nombre">
	                    
	            </div>	    
	            <div class="col-md-6 ">
	                <label class="control-label" for="password">RUC</label>	               
	                <span class="text-danger" title="Este campo es obligatorio">*</span>	               
	                <input onkeypress ="return isNumberKey(this);" type="text" id="ruc" placeholder="Introduzca RUC de la empresa" title="Contraseña" required="" class="form-control" name="ruc" ng-model="ruc">
	           </div>	             
	        </div>	      
	        <div class="form-group row">
	        	<div class="col-md-6 div">
	                <label class="control-label" for="telefono_user">Teléfono</label>
	                <span class="text-danger" title="Este campo es obligatorio">*</span>                                
	                <input onkeypress ="return isNumberKey(this);" type="text" class="form-control" id="telefono" name="telefono" placeholder="Introduzca número de teléfono " ng-model="telefono">
	            </div>
	           
	            <div class="col-md-6 ">
			        <label for="correo" class="control-label">
		            	Correo 
						<span class="text-danger" title="Este campo es obligatorio">*</span>
		            </label>  
					<div class="input-group">
	                	<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
	                	<input type="text" placeholder="Introduzca correo electrónico" title="Correo" required="" class="form-control" name="correo" id="correo" ng-model="correo">
	              	</div>							
					<div class="text-danger"></div>
					<p class="help-block"></p>
				</div>  	    	           
	        </div>
	        <div class="form-group row ">	            
	            <div class="col-md-6 div">
	                <label class="control-label" for="direccion">Dirección</label>  
	                <span class="text-danger" title="Este campo es obligatorio">*</span>       			                       
	                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Introduzca la dirección" ng-model="direccion">
	                 <input type="hidden"  id="id_padre" name="id_padre"  ng-model="id_padre">
	                 <input type="hidden"  id="id_convenio"  name="id_convenio"  ng-model="id_convenio">
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

	function isNumberKey(evt)
    {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57)){
            
            return false;
        }else{
           /* if (evt.value[0] == "0") {
        //  return false;
            // se eliminan los ceros delanteros
            evt.value = evt.value.replace(/^0+/, '');
            }*/
            return true;
        }
    }

	$(document).ready(function(){
		$("#id_padre").val("{{$empresa->id}}");
		$("#id_convenio").val("{{$empresa->id_convenio}}");
		$("#volver").attr("href",URL_BASE+"empresa/edit/{{$empresa->id}}");
		//$("#volver").attr("href","{{ url('/admin//empresa/') }}");
		
	});

	$( "#form_empresa" ).validate( {
		rules: {
			nombre: "required",
			ruc:"required",
			correo: "required",
			telefono:"required",
			id_convenio: "required",
			direccion:"required",
		},
		messages: {
			nombre: "Este campo es obligatorio",
			ruc:"Este campo es obligatorio",
			correo: "Este campo es obligatorio",
			telefono:"Este campo es obligatorio",
			id_convenio: "Este campo es obligatorio",
			direccion:"Este campo es obligatorio",

		},
		errorElement: "em",
		errorPlacement: function ( error, element ) {

		error.addClass( "help-block" );
		// Add the `help-block` class to the error element
		if (element.hasClass('select2-hidden-accessible')) {
			error.insertAfter(element.closest('.has-error').find('.select2'));
		} else if (element.parent('.input-group').length) {
			error.insertAfter(element.parent());
		} else {
			error.insertAfter(element);
		}

		},
		highlight: function ( element, errorClass, validClass ) {
			$( element ).parents( ".col-md-6" ).addClass( "has-error" ).removeClass( "has-success" );
            $( element ).parents( ".col-md-12" ).addClass( "has-error" ).removeClass( "has-success" );
			$( element ).parents( ".col-md-3" ).addClass( "has-error" ).removeClass( "has-success" );
            $( element ).parents( ".col-md-12" ).addClass( "has-error" ).removeClass( "has-success" );
		},
		unhighlight: function (element, errorClass, validClass) {
			$( element ).parents( ".col-md-6" ).addClass( "has-success" ).removeClass( "has-error" );
            $( element ).parents( ".col-md-12" ).addClass( "has-success" ).removeClass( "has-error" );
			$( element ).parents( ".col-md-3" ).addClass( "has-success" ).removeClass( "has-error" );
            $( element ).parents( ".col-md-12" ).addClass( "has-success" ).removeClass( "has-error" );
		}
	});

	$('.select2-hidden-accessible').on('change', function() {
		if($(this).valid()) {
			$(this).next('span').removeClass('error').addClass('valid');
		}
	});

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

	app.controller("controllerEmpresa", function ($scope, $http, API_URL)
	{

	//Como inician los campos

	$scope.init = function ()
	{
		$scope.nombre = "{{($operation == 'update')?$empresa->nombre :''}}";
		$scope.ruc = "{{($operation == 'update')?$empresa->ruc :''}}";
		$scope.telefono = "{{($operation == 'update')?$empresa->telefono :''}}";
		$scope.correo = "{{($operation == 'update')?$empresa->correo :''}}";
		$scope.direccion = "{{($operation == 'update')?$empresa->direccion :''}}";
		$scope.id_convenio = "{{($operation == 'update')?$empresa->id_convenio :''}}";
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
		if($("#form_empresa").valid()){
			switch (operation) {
				case 'add':

					$(".modal").modal('show');
					console.log($scope.serializeObject($("#form_empresa")));
					$http({
						url    : API_URL + 'empresa',
						method : 'POST',
						params : $scope.serializeObject($("#form_empresa")),
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
								location.reload();
								//window.location = "{{ url('/admin/empresa?m=89') }}";
							});
						} else {
							swal("Error", "¡No se guardó!", "error");
						}
					});

					break;

				case 'update':

					$(".modal").modal('show');

					$http({
						url    : API_URL + 'empresa/{{$empresa->id}}',
						method : 'PUT',
						params : $scope.serializeObject($("#form_empresa")),
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
								window.location = "{{ url('/admin/empresa?m=89') }}";
							});
							} else {
								swal("Error", "No se actualizó", "error");
							}
						});
						break;
			}
		}
	}
});

</script>
	
		
		
	
@endsection