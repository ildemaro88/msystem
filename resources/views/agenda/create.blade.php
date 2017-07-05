
<?php 
 $page_title = $agenda->nombre ? :"Agendar Cita";
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
         ng-init="cita.fecha=('{{Carbon\Carbon::now()->format('d/m/Y')}}');descripcion=('');agendar=(true);cita.hoy=('{{Carbon\Carbon::now()->format('d/m/Y')}}')"
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
            <div class="col-xs-12 col-sm-8">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <div style="background: white;" id="calendar"></div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4">
                {{--Panel de gestion de citas--}}
                <panel-cita></panel-cita>
                {{--FIN Panel de gestion de citas--}}
            </div>
            <div class="box-footer"></div>
        </div>
    </div>
    <script type="text/javascript">
        /*
         * GLOBALS
         */
        AGENDA_ID = '{{$agenda->id}}';
        MEDICO_ID = '{{$medico->id}}';
        URL_CITAS = '{{ CRUDBooster::adminPath('medico/cita/'.$medico->id) }}';
        URL_MEDICO_CITA = '{{ CRUDBooster::adminPath('medico/cita')}}';
        URL_MEDICO_AGENDA = '{{ CRUDBooster::adminPath('medico/agenda')}}';
        OPTIONS_PACIENTE = '@foreach($paciente as $p)' +
            '<option value="{{$p->id}}">{{$p->nombre." ".$p->apellido}}</option>' +
            '@endforeach';
        /*
        * Si viene por historial rellenar la variable cita
        * */
        CITA ={
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
        PANEL ={};        
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
        HOY = '{{Carbon\Carbon::now()->format('d/m/Y')}}';
        /*
         * -->
         */
    </script>
    <!--  ANGULAR APP -->
    <script src="{{asset('js/agenda/app.js')}}"></script>
    <script src="{{asset('js/agenda/controller.js')}}"></script>
    <script src="{{asset('js/agenda/directive.js')}}"></script>
    <!--  ANGULAR APP -->
@endsection
