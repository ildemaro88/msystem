
<?php
$page_title = $agenda->nombre ?: "Agendar Cita";
?>
@extends("crudbooster::admin_template")
@section("content")

<link rel="stylesheet" href="{{asset('bower_resources/angularjs-slider/dist/rzslider.css')}}">
<script src="{{asset('bower_resources/angularjs-slider/dist/rzslider.min.js')}}"></script>
<style>

#search{
  position: relative;
  right:0;
  margin:0 1em;
  width:350px;
}
#search{
  top:0;
  z-index:10;
}

#search > a{
  position: absolute;
  right:0;
  top:0;
  bottom:0;
  padding:0 10px;
  background-color: #ec9507;
}
#search > a i{
  color:#fff;
}
#search_results{
  position: absolute;
  z-index: 45;
  top:100%;
  left: 0;
  right:0;
  max-height: 200px;
  overflow: auto;
}
#search_results ul{
  width: 100%;
  margin:0;
  padding-right: 15px;
    padding-left: 15px;
}
#search_results li{
    outline: none;
  width: 100%;
  list-style-type: none;
  box-sizing: border-box;
  margin:0;
  padding:10px 15px;
  background-color: #fff;
  transition:all 0.5s;
  -moz-transition:all 0.5s;
  -webkit-transition:all 0.5s;
  cursor:pointer;
  word-wrap:break-word;
}
#search_results li:hover, #search_results li:focus{
  color:#fff;
  background-color: #7BB4D5;
}
#search_results li i{
  padding-right:5px;
}
#search_results li.active { background:#7BB4D5; color:#fff; }


    .col-center{
    float: none;
    margin: 0 auto;
}
    .fontfamilyAutocomplet{
        padding: 5px;
        width: 250px;
        letter-spacing: 1px;
        font-family: helvetica Neue Regular;
    }
    .fc-time-grid .fc-slats td {
        height: 40px !important;
    }
    .container-full {
        margin: 0 auto;
        width: 100%;
    }
    div.fc-time span{
        font-family: "Century Schoolbook", sans-serif;
        color: white;
        font-weight: bolder;
        font-size: 13px;


    }
    .fc-time-grid-event .fc-time{
        padding: 3px;
    }
    div.fc-time{
        text-align: center;

    }
    .fc-bgevent {
        background: #2c3e50;
    }
    div.fc-title{
        font-family: "Roboto",  sans-serif;
        font-size: 11px;
        letter-spacing: 0.6pt;
        text-align: center;
    }
    .validate_hours li{
        text-align: left;
    }
</style>
<link rel = "stylesheet" href = "https://ajax.googleapis.com/ajax/libs/angular_material/1.0.0/angular-material.min.css">      
<script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-animate.min.js"></script>
<script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-aria.min.js"></script>
<script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-messages.min.js"></script>
<script src = "https://ajax.googleapis.com/ajax/libs/angular_material/1.0.0/angular-material.min.js"></script>
      
     
{{--modal edicion de evento--}}


<div ng-app="AppAgenda"
     ng-init="cita.fecha = ('{{Carbon\Carbon::now()->format('d/m/Y')}}'); descripcion = (''); agendar = (true); fecha_autorizacion = ('{{Carbon\Carbon::now()->format('d/m/Y')}}'); fecha_vence = ('{{Carbon\Carbon::now()->format('d/m/Y')}}'); cita.hoy = ('{{Carbon\Carbon::now()->format('d/m/Y')}}')"
     ng-controller="CtrlApp" ng-cloack>
     
    @include("agenda.modals")
    <div class="box">
        <div class="box-header">
            <a href="{{CRUDBooster::adminPath().'/paciente/add?m=3'}}">
                <button class="btn btn-default btn-sm"><i class="fa fa-male"></i> Nuevo paciente</button>
            </a>
            <button type="button" ng-click="agendaWorker.load()" class="btn btn-default btn-sm"><i
                    class="fa fa-refresh"></i> Actualizar/Recargar
            </button>
        </div>
                           
        <div id="agenda-list-citas" class="box-body">
            
            <div class="panel panel-primary">
                <div class="panel-body">
                    <div style="background: white;" id="calendar"></div>
                </div>
            </div>
        </div>
        <div id="form-save-cita" class="col-xs-12 col-sm-12" ng-show="formCitaSend" style="display: none;">
            {{--Panel de gestion de citas--}}

            <div id="pan-nueva-cita" class="panel [[panel.class_heading]]">
                <div class="panel-heading">
                    <h4 id="heading" class="[[panel.class_text_title]]">
                        <i class="fa fa-calendar-check-o"></i> [[ panel.title_panel ]]</h4>
                </div>
                <form action="[[ panel.url ]]" method="[[panel.method_form]]" id="form-cita" name="formCitaSend" ng-submit="submit($event)" novalidate> 
                    <div class="panel-body" style="[[panel.style_body]]; padding-top: 0px">
                        <input type="text" value="businessHours" name="constraint" ng-show="false"> 
                        <div class="tab-content"> 
                            <div id="home" class="tab-pane fade in active">
                                <div class="container-fluid container-full">
                                    <input ng-model="agenda_id" type="hidden" name="agenda_id" value= [[agenda.id]]  "> 
                                    <input ng-model="color" type="hidden" name="color" value= "#E9C341"> 
                                    <input ng-model="medico_id" type="hidden" name="medico_id" value="{{$medico->id}}">
                                    <input name="autorizacion" type="hidden" value="[[autorizacion]]"> 
                                    <input name="idpaciente" type="hidden" value="[[idpaciente]]" > 
                                    <input name="fecha_autorizacion" type="hidden" value="[[fecha_autorizacion]]"> 
                                    <input name="fecha_vence" type="hidden" value="[[fecha_vence]]">
                                    <input name="[[panel.method.name]]" type="hidden" value="[[panel.method.value]]"> <br> 
                                    <input name="sel_convenio" type="hidden" value="[[searchTextAgreement]]">

                                    <div class="row"> 
                                    
                                        <div class="form-group col-md-5"> 
                                        
                                            <label for=""> Seleccione el paciente:</label>
<!--                                            <input  autocomplete="off" name="paciente_valide" class="form-control" type='text' ng-keyup='searchPatients()' ng-model='searchText' ng-blur='valideIdPatient()' required>
                                            <span style="color:red" ng-show="formCitaSend.paciente_valide.$dirty && formCitaSend.paciente_valide.$invalid">
                                            <span ng-show="formCitaSend.paciente_valide.$dirty &&  formCitaSend.paciente_valide.$error.required">Debe Seleccionar un Paciente.</span>
                                            </span><br>
                                            <ul class="md-autocomplete-suggestions" id='searchResultPatient' >
                                                <li ng-click='setValue($index)' ng-repeat="result in searchResult" >[[ result.ci]] - [[ result.name]]</li>
                                                <li ng-show="newPatient">No existe el paciente, 
                                                    <a href="{{CRUDBooster::adminPath().'/paciente/add?m=3'}}"> Agregar 
                                                    </a>
                                                </li>-->
                                            
                                            <input type="text"  id="paciente_valide" ng-keyup='searchPatients($event)' ng-model='searchText' name="paciente_valide"  class="form-control" value="DIRECTORY" autocomplete="off" ng-blur='valideIdPatient()' required/>
                                           <span style="color:red" ng-show="formCitaSend.paciente_valide.$dirty && formCitaSend.paciente_valide.$invalid">
                                            <span ng-show="formCitaSend.paciente_valide.$dirty &&  formCitaSend.paciente_valide.$error.required">Debe Seleccionar un Paciente.</span>
                                            </span><br>
                                            <div id="search_results">
                                            <!-- Example content that is printed out after searchNameDept() is run -->
                                            <ul id='searchResultPatient' >
                                            <li ng-click='setValue($index)' ng-keyup="setValue($index)" class="search_org"  ng-repeat="result in searchResult  | limitTo:5" >[[ result.ci]] - [[ result.name]] [[ result.apellido]]</li>
                                             <li ng-show="newPatient">No existe el paciente, 
                                                    <a href="{{CRUDBooster::adminPath().'/paciente/add?m=3'}}"> Agregar 
                                                    </a>
                                                </li>
                                            </ul>
                                          </div>
                                               
                                        </div>  
                                        <div class="col-sm-2"  ng-show="time">
                                            <h5 style="margin:0px">
                                                <b style="font-size:13px">Fecha:</b> 
                                                <a>[[dateSelect]]</a>
                                            </h5> 
                                            <h5 for="">
                                                <b>Inicio:</b> 
                                                <a>[[hourSelect]]</a>
                                            </h5>
                                            <div class="col-sm-"> 
                                                <h5 for=""><b>Fin:</b><a> [[hourEnd]]</a></h5>    
                                            </div> 
                                            <!--div class="col-sm-"> 
                                                <rzslider rz-slider-model="slider.value" rz-slider-options="slider.options"></rzslider>
                                            </div--> 
                                        </div> 
                                        
                                        <div class="col-sm-5"> 
                                             <label for="">Seleccione el tipo de convenio</label> 
                                                <select name="convenio_valide" id="convenio" ng-change="setValueAgreement()" class="form-control" show-menu-arrow data-style="btn-primary" ng-model="searchTextAgreement"  required>
                                                 <option ng-repeat="convenio in convenios" value="[[convenio.name]]">[[convenio.name]]</option>
                                                </select> 
                                            <span style="color:red" ng-show="formCitaSend.convenio_valide.$dirty && formCitaSend.convenio_valide.$invalid">
                                            <span ng-show="formCitaSend.convenio_valide.$error.required">Debe Seleccionar un Convenio.</span>
                                            </span>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <hr>
                                    </div>
                                    <div class="row"> 
                                        <div class="col-sm-5"> 
                                            <div class="form-group"> 
                                                <label for="">Observaciones</label> 
                                                <textarea id="descripcion" ng-model="descripcion" class="form-control" name="descripcion" cols="30"rows="5"></textarea> 
                                            </div>
                                        </div>
                                        <div class="col-sm-3"> 
                                            <div class="form-group"> 
                                                <label for="">Precio: 454 $</label> 
                                                <hr>
                                                <h5>Pagar:</h5>
                                                <input id="price" type="checkbox" data-group-cls="btn-group-justified" >
                                            </div> 
                                        </div> 
                                        <div class="col-sm-4" ng-show="tipo_convenio"> 
                                            
                                            <div class="form-group"> 
                                                <label for="">Autorización</label> 
                                                <input name="autorizacion_valide" ng-model="autorizacion" type="text" class="form-control" ng-required=autorizacion_required> 
                                                 <span style="color:red" ng-show="formCitaSend.autorizacion_valide.$dirty && formCitaSend.autorizacion_valide.$invalid">
                                                     <span ng-show="formCitaSend.autorizacion_valide.$error.required">Debe Seleccionar una Autorización.</span>
                                                 </span>
                                            </div> 
                                            <div class="form-group">
                                                <label for="">Fecha Autorización</label>
                                                <div class="input-group"> 
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-calendar"></span> 
                                                    </span>
                                                    <input id="fecha_autorizacion_valide" name="fecha_autorizacion_valide" placeholder="dd/mm/yyyy" ng-model="fecha_autorizacion" type="text" class="form-control datepicker" ng-required=autorizacion_required> 
                                                </div>
                                                <span style="color:red" ng-show="formCitaSend.fecha_autorizacion_valide.$dirty && formCitaSend.fecha_autorizacion_valide.$invalid">
                                                    <span ng-show="formCitaSend.fecha_autorizacion_valide.$error.required">Debe Seleccionar una fecha de autorización.</span>
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Fecha Vencimiento</label> 
                                                <div class="input-group"> 
                                                    <span class="input-group-addon"> 
                                                        <span class="glyphicon glyphicon-calendar"></span> 
                                                    </span> 
                                                    <input id="fecha_vence_valide" name="fecha_vence_valide" placeholder="dd/mm/yyyy" ng-model="fecha_vence" type="text" class="form-control datepicker" ng-required=autorizacion_required> 
                                                     </div>
                                                <span style="color:red" ng-show="formCitaSend.fecha_vence_valide.$dirty && formCitaSend.fecha_vence_valide.$invalid">
                                                    <span ng-show="formCitaSend.fecha_vence_valide.$error.required">Debe Seleccionar una fechas de vencimiento.</span>
                                                </span>
                                            </div> 
                                        </div> 
                                    </div>
                                </div>                                    
                            </div>
                        </div> 
                    </div>
                    <div class="panel-footer  text-right">

                        <button type="button" class="btn btn-default"  ng-click="previewCita()"><i class="fa fa-minus-circle"></i> Atras </button>                              
                        
                        <button ng-show="ddpanel.buttons.trash"  ng-click="cancelarCita()" type="button" class="btn btn-link"><i   style="font-size: 20px;color: #e74c3c;"class="fa fa-trash pull-left"></i> </button>

                        <button ng-show="panel.buttons.cancelar" ng-click="eliminarCita([[cita_id]])"  style="margin-right: 5px;" type="reset" class="btn btn-warning"> <i class="fa fa-minus-circle"></i> Cancelar Cita </button>                                  
                        <button 
                            ng-show="panel.buttons.modificar" 
                             ng-disabled="!formCitaSend.$valid"
                             type="submit" class="btn btn-primary" 
                                style="margin-right: 5px;">
                            <i class="fa fa-check"> </i> Modificar 
                        </button> 
                              
                        <button 
                            ng-show="panel.buttons.agendar" 
                            ng-disabled="!formCitaSend.$valid" 
                            type="submit" class="btn btn-success" 
                            style="margin-right: 5px;">
                            <i class="fa fa-check"></i> Agendar 
                        </button>                                                                 
                    </div>
                </form>
                </div> 
            </div>
            {{--FIN Panel de gestion de citas--}}
            
            <!-- fin panel editar citas drop-->
        <div id="panel-edit-drop" class="col-md-12" ng-show="showDrop" style="display: none;">
            
            <div class=" panel panel-primary">
                <div class="panel-heading">
                    <h3 style="margin:0px">
                        <b style="font-size:13px">Detalles de la cita: [[detailsCitas]]</b> 
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="col-md-8 col-md-offset-3">
                       
                        <h1>Fecha Inicial: <a>[[startDateEdit]]</a></h1>    
                        <h1>Fecha Final: <a>[[endDateEdit]]</a> </h1>                          
                    </div>
                    <div class=" ">
                        <br>
                        <div class=""> 
                            <div class="col-md-8 col-md-offset-4"> 
                                <div class="form-group"> 
                                    <button type="button" class="btn btn-default btn-lg"  ng-click="previewCita()"><i class="fa fa-minus-circle"></i> Atras </button> 
                                    <button type="button" ng-click="updateDropCita([[idCita]])" class="btn btn-success btn-lg">
                                         <i class="fa fa-refresh"></i> OK
                                    </button>
                                     
                                </div> 
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-xs-12 col-sm-2">
                
             </div>
        </div>
        <!-- fin panel editar citas drop-->
        </div>
        
    </div>
<script src="{{asset('js/bootstrap-checkbox/bootstrap-checkbox.js')}}"></script>
<script type="text/javascript">
$(document).ready(function(){
     
    $('#paciente_valide').keyup(function(e) {
        $("#search_results").show();

        $('li').each(function(){ // se elimina tabindex de todos los li
         
            $(this).removeAttr("tabindex");                
        }); 
        e.preventDefault();

        if (e.keyCode === 13){
            $('li').each(function(){ // si se presiona enter hacemos click sobre el li activo
                if($(this).hasClass('active')){
                    $(this).click(); 
                    $("#search_results").hide();
                }          
            }); 
        }
        if(e.which == 40){
            if($("#search_results li.active").length!=0) {
                var storeTarget = $('#search_results').find("li.active").next();
                $("#search_results li.active").removeClass("active");
                storeTarget.focus().addClass("active");
                
            }
            else {
                $('#search_results').find("li:first").focus().addClass("active");
            }
            return ;
        }
        if(e.which == 38){
            if($("#search_results li.active").length!=0) {
                var storeTarget = $('#search_results').find("li.active").prev();
                $("#search_results li.active").removeClass("active");
                storeTarget.focus().addClass("active");
                
            }
            else {
                $('#search_results').find("li:first").focus().addClass("active");
            }
            return ;
        }
    });
});
   
    $('#fecha_autorizacion_valide').on('change', function(){
        var date = $(this).val();
        $('#fecha_vence_valide').datepicker({minDate: date});  
    });
    URL_GET_DATA_JSON = '{{ CRUDBooster::adminPath('medico/agenda/get/information/') }}/{{$medico->id}}';
    console.log(URL_GET_DATA_JSON);
    /*
     * GLOBALS
     */
    //AGENDA_ID = '{{$agenda->id}}';
    //MEDICO_ID = '{{$medico->id}}';
    //URL_CITAS = '{{ CRUDBooster::adminPath('medico/cita/'.$medico->id) }}';
    URL_MEDICO_CITA = '{{ CRUDBooster::adminPath('medico/cita')}}';
    URL_MEDICO_CITA_SAVE = '{{ CRUDBooster::adminPath('medico/agenda/save')}}';
    URL_MEDICO_AGENDA = '{{ CRUDBooster::adminPath('medico/agenda/test/index')}}';
    /*
     * Si viene por historial rellenar la variable cita
     * */
    CITA = {
    id:'{{$cita->id}}',
            detalle_cita:'{{$cita->detalle_cita}}',
            estado_cita:'{{$cita->estado_cita}}',
            created_at:'{{$cita->created_at}}',
            updated_at:'{{$cita->updated_at}}',
            start:'{{$cita->start}}',
            end:'{{$cita->end}}',
            title:'{{$cita->title}}',
            color:'{{$cita->color}}',
            agenda_id:'{{$cita->agenda_id}}',
            paciente_id:'{{$cita->paciente_id}}',
            trash:'{{$cita->trash}}',
            sel_convenio:'{{$cita->sel_convenio}}',
            convenio:{
            id:'{{$cita->convenio->id}}',
                    cita_calendario_id:'{{$cita->convenio->cita_calendario_id}}',
                    autorizacion:'{{$cita->convenio->autorizacion}}',
                    fecha_autorizacion:'{{$cita->convenio->fecha_autorizacion}}',
                    fecha_vence:'{{$cita->convenio->fecha_vence}}'
            }
    };
    PANEL = {};
//    HORARIO_TRABAJO = [
//            @foreach($horario_medico as $h)
//    {
//    dow: [ '{{$h->dow}}' ], // Monday, Tuesday, Wednesday
//            start: '{{$h->start}}', // 8am
//            end: '{{$h->end}}' // 6pm
//    },
//            @endforeach
//    ];
//    HORARIO_TRABAJO = HORARIO_TRABAJO.length > 0 ? HORARIO_TRABAJO :false;
    HOY = '{{Carbon\Carbon::now()->format('d/m/Y')}}';
    $(document).ready(function(){
        $('#price').checkboxpicker({
            html:true,
            onLabel:'SI',
            offLabel:'NO'
        });
    $('#fecha').val(HOY);
    });
    /*
     * -->
     */
</script>
<!--  ANGULAR APP -->
<script src="{{asset('js/agenda/app.js')}}"></script>
<script src="{{asset('js/agenda/controller_1.js')}}"></script>
<script src="{{asset('js/agenda/directive.js')}}"></script>
<!--<script src="{{asset('js/agenda/moment_library.js')}}"></script>-->
<!--  ANGULAR APP -->
@endsection
