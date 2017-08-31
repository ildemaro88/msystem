@extends("crudbooster::admin_template")
@section("content")
<style type="text/css">
        .panel-group{
            max-height: auto;
        }
        #fecha { z-index : 900; }
        .has-error .select2-selection {
            border: 1px solid #a94442;
            border-radius: 4px;
        }
        #message{
          color:#fff;
          background-color: #d73925;
        }

       .modal {
           position: fixed;
           z-index: 999;
           height: 100%;
           width: 100%;
           top: 0;
           left: 0;
           background-color: Black;
           filter: alpha(opacity=40);
           opacity: 0.4;
           -moz-opacity: 0.8;
       }
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
       #accordion{
         padding-left: 0px;
       }
       td label{
         font-size: 12px;

       }
        td{
          padding-left:6px;
          padding-bottom: 3px;
       }

      .chb{
        margin-left: 15px !important;
      }
       .panel-collapse{
         padding-left: 3px;
       }
       </style>

    <p><a title="Volver" id = "volver" href="{{ url()->previous() }}"><i class="fa fa-chevron-circle-left"></i>&nbsp; Volver a la Lista de Órdenes</a><div id="message">
    </div></p>
     
    <div class = "box" ng-app="MyApp" ng-controller="controllerResultado">
      <form id="form_resultado" method="POST" action="" name="form_resultado" accept-charset="UTF-8" enctype="multipart/form-data">
      	<div class = "box-body">
    			{{ csrf_field() }}

          <div class = "panel-footer col-md-12">                                
            <label class="col-md-3 control-label">Subir resultados</label>                  
            <div class="col-md-6">
              <input type="file" class="form-control" name="archivo" ng-model='file' >
              <input type="hidden" class="form-control" name="id_orden" value="{{$orden->id}}" >  
            </div>  
            <div class="pull-right">
              <input class = "btn btn-success" id="btnSave" type = "button" style = "margin-left: 10px" value = "Guardar"ng-click = "toggle('{{$operation}}')">
            </div>                             
          </div> 
          <br>
          <div class="form-group col-md-12">
              <div class="">
              <div>
              <label class="col-md-6 "> Marque los exámenes que fueron realizados:</label>    
                  </div>
                  <br><br>
                  <div>
                  <input type="checkbox" class="checkbox inline chb" id="checkAll">  Todos. <br/>
                  @foreach($examenes as $examen)
                  <input type="checkbox" class="checkbox checkecs inline chb" name="examenes[]" value="{{$examen->examen->id}}"> {{$examen->examen->nombre}}.<br/>
                  @endforeach
                </div>
              </div>
          </div>       
        </div>
       
    	</form>
    </div>      
    
   

    <!-- HTML del Modal de Loading-->

    <div class = "modal" style = "display: none" align = "center">
    	<div class = "center">
    		<img alt = "" src = "{{asset('img/loading_animation.gif')}}" />
    	</div>
    </div>

<script type="text/javascript">

 $(document).ready(function() {
          $.validator.setDefaults( {
            submitHandler: function () {
              alert( "submitted!" );
            }
          } );

$("#checkAll").change(function () {
            $(".checkecs").prop('checked', $(this).prop("checked"));
          });
 $( "#form_resultado" ).validate( {
            rules: {
              archivo: {
                required:true,
                 accept: "application/pdf"
              },
              "examenes[]": {required: true}

            },
            messages: {
              archivo:{
                required:"Seleccione el archivo",
               accept: "El archivo debe ser un PDF",
              },
              "examenes[]": "Debe marcar al menos un examen.",


            },
            errorElement: "em",
            errorPlacement: function ( error, element ) {
               if (element.attr("type") == "checkbox") {
                //$("#consolaerror").append(error);
                 error.insertAfter(element.parent());
              }else{
              error.addClass( "help-block" );
              // Add the `help-block` class to the error element
              if (element.hasClass('select2-hidden-accessible')) {
                  error.insertAfter(element.closest('.has-error').find('.select2'));
              } else if (element.parent('.input-group').length) {
                  error.insertAfter(element.parent());
              } else {
                  error.insertAfter(element);
              }
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
          } );
          $('.select2-hidden-accessible').on('change', function() {
              if($(this).valid()) {
                  $(this).next('span').removeClass('error').addClass('valid');
              }
          });
          
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

      app.controller("controllerResultado", function ($scope, $http, API_URL)
      {

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

             var allchecked = $("#form_laboratorio input:checked").length;
             var textall = 0;
              //Se itera sobre todos los textarea para ver si alguno tiene valor.
              $('#form_laboratorio .textarea').each(function(){
                if($.trim($(this).val())){
                 textall = 1;//si al menos uno tiene algun valor diferente a espacios en blanco, existe será igual a 1
                console.log($(this).attr("id"));
              }
             });

               if($("#form_resultado").valid()){
               
                  $(".modal").modal('show');
                switch (operation) {
                  case 'add':

                    
                    console.log($scope.serializeObject($("#form_resultado")));
                    $.ajax({
                      url:API_URL + 'orden_examenes_carga/uploadSave/{{$orden->id}}',
                      data:
                        new FormData($("#form_resultado")[0]),
                        
                      dataType:'json',
                      async:false,
                      type:'post',
                      processData: false,
                      contentType: false,
                      success:function(response){
                         $(".modal").modal('hide');
                        swal({
                          title: response.title,
                          text: response.mensaje,
                          type: response.type,
                          showCancelButton: false,
                          confirmButtonClass: "btn-succes",
                          confirmButtonText: "OK",
                          closeOnConfirm: response.close,
                          showLoaderOnConfirm: response.show
                        },
                        function(){
                          if(response.type == 'success'){
                            window.location = "{{ url()->previous() }}";

                          }
                        });
                      } ,
                      error: function (xhr, ajaxOptions, thrownError) {
                        $(".modal").modal('hide');
                          swal("Error", "¡No se guardó!", "error");
                          
                        }
                      
                      }
                    );

                    break;

                  case 'update':

                    $(".modal").modal('show');

                    $http({
                      url    : API_URL + 'orden_examenes/{{$orden->id}}',
                      method : 'PUT',
                      params : $scope.serializeObject($("#form_laboratorio")),
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
                          closeOnConfirm: false,
                          showLoaderOnConfirm: true
                        },
                        function(){
                          window.location = "{{ url('/admin/orden_examenes?m=33') }}";
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