
<?php
$page_title = $agenda->nombre ?: "Agendar Cita";
?>
@extends("crudbooster::admin_template")
@section("content")
<style>
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
{{--modal edicion de evento--}}
<div ng-app="AppAgenda"
     ng-init="cita.fecha = ('{{Carbon\Carbon::now()->format('d/m/Y')}}'); descripcion = (''); agendar = (true); fecha_autorizacion = ('{{Carbon\Carbon::now()->format('d/m/Y')}}'); fecha_vence = ('{{Carbon\Carbon::now()->format('d/m/Y')}}'); cita.hoy = ('{{Carbon\Carbon::now()->format('d/m/Y')}}')"
     ng-controller="CtrlApp" ng-cloack>
    @include("agenda.modals")
    <div class="box">
        <div class="box-header">
            <button ng-click="resetPanelCita()" type="button" class="btn btn-default btn-sm"><i
                    class="fa fa-plus"></i> Nueva Cita
            </button>
            <a href="{{CRUDBooster::adminPath().'/paciente/add?m=3'}}">
                <button class="btn btn-default btn-sm"><i class="fa fa-male"></i> Nuevo paciente</button>
            </a>
            <button type="button" ng-click="agendaWorker.load()" class="btn btn-default btn-sm"><i
                    class="fa fa-refresh"></i> Actualizar
            </button>
        </div>
        <div id="agenda-list-citas" class="col-xs-12 col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <div style="background: white;" id="calendar"></div>
                </div>
            </div>
        </div>
        <div id="form-save-cita" class="col-xs-12 col-sm-12">
            {{--Panel de gestion de citas--}}

                <div id="pan-nueva-cita" class="panel [[panel.class_heading]]">
<!--                    <input  value="[[dateSelect]]">
                    <input  value="[[hourSelect]]">-->
                    <div class="panel-heading">
                        <h4 id="heading" class="[[panel.class_text_title]]">
                            <i class="fa fa-calendar-check-o"></i> [[ panel.title_panel ]]</h4>
                    </div> <div class="panel-body" style="[[panel.style_body]]; padding-top: 0px">
                        <ul class="nav nav-tabs"> 
                            <li class="active"><a data-toggle="tab" href="#home">Datos cita</a></li> 
                            <li><a data-toggle="tab" href="#menu1">Convenio</a></li> </ul> 
                        <form action="[[ panel.url ]]" method="post" id="form-cita" name="formCita" ng-submit="submit($event)" novalidate> 
                            <input type="text" value="businessHours" name="constraint" ng-show="false"> 
                            <div class="tab-content"> <div id="home" class="tab-pane fade in active">
                                    <div class="container-fluid container-full">
                                        <input ng-model="agenda_id" type="hidden" name="agenda_id" value="  ' + AGENDA_ID + '  "> 
                                        <input ng-model="medico_id" type="hidden" name="medico_id" value="  ' + MEDICO_ID + '  ">
                                        <input name="autorizacion" type="hidden" value="[[autorizacion]]"> 
                                        <input name="fecha_autorizacion" type="hidden" value="[[fecha_autorizacion]]"> 
                                        <input name="fecha_vence" type="hidden" value="[[fecha_vence]]">
                                        <input name="[[panel.method.name]]" type="hidden" value="[[panel.method.value]]"> <br> 
                                        <div class="form-group col-md-6"> <label for=""> Seleccione el paciente:</label>
                                            <select id="select-paciente" class="form-control select2" name="idpaciente">  [[patients]]  </select> 
                                        </div> 
                                        <div class="col-sm-6"> 
                                            <div class="row"> <div class="form-group"> 
                                                    <button type="button"  class="btn btn-default"><i class="fa fa-clock-o"></i> Fecha y Hora </button> 
                                                </div> </div> 
                                        </div> 
                                        <div class="col-sm-6">
                                            <h5 style="margin:0px"><b style="font-size:13px">Fechaf:</b> <a id="p_fecha"></a></h5> 
                                            <h5 for=""><b>Desde:</b> <a id="p_desde"></a></h5>
                                            <h5 for=""><b>Hasta:</b> <a id="p_hasta"></a></h5> 
                                        </div> 
                                        <div class="row"> 
                                            <div class="col-xs-10 col-xs-offset-1"> 
                                                <div class="form-group"> 
                                                    <label for="">Observaciones</label> 
                                                    <textarea id="descripcion" ng-model="cita.descripcion" class="form-control" name="descripcion"cols="30"rows="5"></textarea> 
                                                </div> 
                                            </div> </div>
                                        <div class="row pull-left" ng-show="panel.buttons.trash"> 
                                            <div class="col-xs-12"> <div class="form-group"> 
                                                    <button ng-click="eliminarCita([[cita_id]])" type="button" class="btn btn-link"><i   style="font-size: 20px;color: #e74c3c;"class="fa fa-trash pull-left"></i> </button>
                                                </div> 
                                            </div> </div> 
                                        <div class="row pull-left" ng-show="panel.buttons.cancelar">
                                            <div class="col-xs-12"> <div class="form-group">
                                                    <button ng-click="cancelarCita()" style="margin-right: 5px;" type="reset" class="btn btn-default"> <i class="fa fa-minus-circle"></i> Cancelar Cita </button> 
                                                </div> 
                                            </div> </div> 
                                        <div class="row pull-left" ng-show="panel.buttons.modificar"> 
                                            <div class="col-xs-12"> 
                                                <div class="form-group"> <button type="submit" class="btn btn-warning"><i class="fa fa-check"></i> Modificar </button> </div> 
                                            </div> </div> 
                                        <div class="row" ng-show="panel.buttons.agendar"> 
                                            <div class="col-xs-12 col-xs-offset-7"> 
                                                <div class="form-group"> <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Agendar </button> </div> 
                                            </div> </div> 
                                    </div> </div> 
                                <div id="menu1" class="tab-pane fade"> <br> 
                                    <div class="row"> 
                                        <div class="col-xs-12"> 
                                            <div class="form-group"> 
                                                <label for="">Seleccione el tipo de convenio</label> 
                                                <select ng-change="eval_convenio()" id="sel_convenio" name="sel_convenio"  ng-model="sel_convenio" class="form-control" show-menu-arrow data-style="btn-primary"> ' + OPTIONS_CONVENIO + '</select> 
                                            </div> 
                                        </div>
                                    </div> 
                                    <div ng-show="tipo_convenio" class="row">
                                        <div class="col-xs-12"> 
                                            <div class="form-group"> 
                                                <label for="">Autorización</label> 
                                                <input ng-model="autorizacion" type="text" class="form-control"> 
                                            </div> 
                                            <div class="form-group">
                                                <label for="">Fecha Autorización</label>
                                                <div class="input-group"> 
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-calendar"></span> 
                                                    </span>
                                                    <input placeholder="dd/mm/yyyy" ng-model="fecha_autorizacion" name="fecha_autorizacion" type="text"class="form-control datepicker"> 
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Fecha Vencimiento</label> 
                                                <div class="input-group"> 
                                                    <span class="input-group-addon"> 
                                                        <span class="glyphicon glyphicon-calendar"></span> 
                                                    </span> 
                                                    <input placeholder="dd/mm/yyyy" ng-model="fecha_vence" name="fecha_vence" type="text" class="form-control datepicker"> 
                                                </div> 
                                            </div> 
                                        </div> 
                                    </div>
                                </div> 
                            </div>
                        </form>
                    </div> 
                </div>
            {{--FIN Panel de gestion de citas--}}
        </div>
        <div class="box-footer"></div>
    </div>
</div>
<script type="text/javascript">
    URL_GET_DATA_JSON = '{{ CRUDBooster::adminPath('medico/agenda/get/information') }}';
    /*
     * GLOBALS
     */
    AGENDA_ID = '{{$agenda->id}}';
    MEDICO_ID = '{{$medico->id}}';
    URL_CITAS = '{{ CRUDBooster::adminPath('medico/cita/'.$medico->id) }}';
    URL_MEDICO_CITA = '{{ CRUDBooster::adminPath('medico/cita')}}';
    URL_MEDICO_AGENDA = '{{ CRUDBooster::adminPath('medico/agenda')}}';
    OPTIONS_PACIENTE = '@foreach($paciente as $p)' +
            '<option value="{{$p->id}}" >' +
            '@if(empty($p->cedula))' +
            '{{$p->pasaporte}}' +
            '@else' +
            '{{$p->cedula}}' +
            '@endif' +
            '@if(empty($p->cedula) && empty($p->pasaporte))' +
            '{{$p->otro}}' +
            '@endif' +
            '-' +
            '{{$p->nombre." ".$p->apellido}}</option>' +
            '@endforeach';
    OPTIONS_CONVENIO = '@foreach($convenios as $convenio)' +
            '<option value="{{$convenio->nombre}}">{{$convenio->nombre}}</option>' +
            '@endforeach';
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
    HORARIO_TRABAJO = [
            @foreach($horario_medico as $h)
    {
    dow: [ '{{$h->dow}}' ], // Monday, Tuesday, Wednesday
            start: '{{$h->start}}', // 8am
            end: '{{$h->end}}' // 6pm
    },
            @endforeach
    ];
    HORARIO_TRABAJO = HORARIO_TRABAJO.length > 0 ? HORARIO_TRABAJO :false;
    HOY = '{{Carbon\Carbon::now()->format('d / m / Y')}}';
    $(document).ready(function(){
    $('#fecha').val(HOY);
//        $(".fc-nonbusiness").click(function(){
//            alert("SSS")
//            $("body").addClass("fc-unselectable fc-not-allowed");
//        }); 
//       toma
    });
    /*
     * -->
     */
</script>
<!--  ANGULAR APP -->
<script src="{{asset('js/agenda/app.js')}}"></script>
<script src="{{asset('js/agenda/controller_1.js')}}"></script>
<script src="{{asset('js/agenda/directive.js')}}"></script>
<!--  ANGULAR APP -->
@endsection
