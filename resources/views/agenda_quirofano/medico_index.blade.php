
@extends("crudbooster::admin_template")
@section("content")
<link rel="stylesheet" href="{{asset('bower_resources/angularjs-slider/dist/rzslider.css')}}">
<link rel="stylesheet" href="{{asset('css/styles_search.css')}}">
<script src="{{asset('bower_resources/angularjs-slider/dist/rzslider.min.js')}}"></script>

<div ng-init="cita.fecha = ('{{Carbon\Carbon::now()->format('d/m/Y')}}'); descripcion = (''); agendar = (true); fecha_autorizacion = ('{{Carbon\Carbon::now()->format('d/m/Y')}}'); fecha_vence = ('{{Carbon\Carbon::now()->format('d/m/Y')}}'); cita.hoy = ('{{Carbon\Carbon::now()->format('d/m/Y')}}')"
     ng-app="AppAgenda" ng-controller="AppAgendaQuirofanoMedico" ng-cloack ng-init="fecha = ('{{Carbon\Carbon::now()->format('d/m/Y')}}');">
<!--    <input type="text" ng-model="idSalleValue" >-->
    <div class="box">
        <div class="box-header">
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

        <!-- fin panel editar citas drop-->
        <div id="panel-show-event" class="col-md-12" style="display: none;">

            <div class=" panel panel-primary">
                <div class="panel-heading">
                    <h3 style="margin:0px">
                        <b style="font-size:13px">Detalles de la Cirugía: [[detailsCitas]]</b> 
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4 col-md-offset-3">

                            <h1>Fecha Inicial: <a>[[startDateEdit]]</a></h1>    
                            <h1>Fecha Final: <a>[[endDateEdit]]</a> </h1> 
                            <h1>Residente: <a>  [[resident]]</a></h1>    
                            <h1>Anesteciologo: <a>[[anesthesiologist]]</a> </h1>  
                        </div>
                        <div class="col-md-4"> 
                            <h1>Quirófano: <a>[[salle]]</a> </h1> 
                            <h1>Proceso: <a>[[process]]</a></h1>    
                            <h1>Observaciones: <a>[[descripcion]]</a> </h1>    
                        </div>
                    </div>
                    <div class=" ">
                        <br>
                        <div class=""> 
                            <div class="col-md-8 col-md-offset-4"> 
                                <div class="form-group"> 
                                    <button type="button" class="btn btn-default btn-lg"  ng-click="previewCita()"><i class="fa fa-minus-circle"></i> Atras </button> 
                                   
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
        <div>

        </div>
    </div>
</div>
<!--  ANGULAR APP -->
<script src="{{asset('js/agenda/app.js')}}"></script>
<script src="{{asset('js/agenda_quirofano/controller_quirofano_medico.js')}}"></script>
<!--  ANGULAR APP -->
@endsection
