
<?php
$page_title = $agenda->nombre ?: "Agendar Cita";
?>
@extends("crudbooster::admin_template")
@section("content")

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

{{--modal edicion de evento--}}


<div ng-app="AppAgendaQuirofano" ng-controller="CtrlApp" ng-cloack ng-init="fecha = ('{{Carbon\Carbon::now()->format('d/m/Y')}}');">
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
        <div>

        </div>
    </div>
      </div>
 

    <!--  ANGULAR APP -->
    <script src="{{asset('js/agenda_quirofano/app.js')}}"></script>
    <script src="{{asset('js/agenda_quirofano/controller.js')}}"></script>
    <!--<script src="{{asset('js/agenda/directive.js')}}"></script>-->
    <!--<script src="{{asset('js/agenda/moment_library.js')}}"></script>-->
    <!--  ANGULAR APP -->
    @endsection
