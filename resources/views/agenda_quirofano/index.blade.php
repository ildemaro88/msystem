<?php
$page_title = $agenda->nombre ?: "Agendar Cita";
?>
@extends("crudbooster::admin_template")
@section("content")
<link rel="stylesheet" href="{{asset('bower_resources/angularjs-slider/dist/rzslider.css')}}"/>
<script src="{{asset('bower_resources/angularjs-slider/dist/rzslider.min.js')}}"></script>

<div class="box" ng-app="AppAgenda" ng-controller="CtrlAppSalles" ng-cloack>

    <div class="box" >
        <div class="row box-header">
            <div class="col-md-4">
                <a href="{{CRUDBooster::adminPath().'/quirofano/add'}}">
                    <button class="off btn btn-success btn-sm"><i class="fa fa-hospital-o"></i> Nuevo Quirófano</button>
                </a>
            </div>
            <div class="col-md-4">

            </div>
            <div class="col-md-4 pull-right">
                <input placeholder="Buscar" class="form-control" type="text" ng-model="search">
            </div>
        </div>
        <div class="col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <table class="table table-striped table-hove">
                        <thead>
                            <tr>
                                <th>Quirofano</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="salle in salles| filter:search">
                                <td><a class="btn btn-info btn-sm" ng-href="{{CRUDBooster::adminPath().'/agenda_cirugia/salle/[[salle.id]]'}}">[[salle.name]] - Ingresar</a></td>
                                <td>
                                    <a class="btn btn-warning btn-xs" ng-href="{{CRUDBooster::adminPath().'/quirofano/edit/[[salle.id]]'}}"><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-danger btn-xs" 
                                       ng-click="deleteSalle(salle.id)">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                                
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="box-footer"></div>
    </div>
</div>
<script src="{{asset('js/agenda/app.js')}}"></script>
<script src="{{asset('js/agenda/services.js')}}"></script>
<script src="{{asset('js/agenda_quirofano/list_salles_controller.js')}}"></script>

@endsection