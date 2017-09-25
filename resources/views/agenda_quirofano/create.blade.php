
<?php
$page_title = $agenda->nombre ?: "Agendar Cita";
?>
@extends("crudbooster::admin_template")
@section("content")
<link rel="stylesheet" href="{{asset('bower_resources/angularjs-slider/dist/rzslider.css')}}">
<link rel="stylesheet" href="{{asset('css/styles_search.css')}}">
<script src="{{asset('bower_resources/angularjs-slider/dist/rzslider.min.js')}}"></script>

<div  ng-init="cita.fecha = ('{{Carbon\Carbon::now()->format('d/m/Y')}}'); descripcion = (''); agendar = (true); fecha_autorizacion = ('{{Carbon\Carbon::now()->format('d/m/Y')}}'); fecha_vence = ('{{Carbon\Carbon::now()->format('d/m/Y')}}'); cita.hoy = ('{{Carbon\Carbon::now()->format('d/m/Y')}}')"
      ng-app="AppAgenda" ng-controller="AppAgendaQuirofano" ng-cloack ng-init="fecha = ('{{Carbon\Carbon::now()->format('d/m/Y')}}');">
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

        <!--Panel de gestion de citas---->
        <div id="form-cita" style="display: none;">
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
                                    <input ng-model="color" type="hidden" name="color" value= "#E9C341">
                                    <input name="idpaciente"  type="hidden" value="[[idPatient]]" >
                                    <input name="idDoctor"  type="hidden" value="[[idDoctor]]" >
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for=""> Doctor:</label>
                                            <input type="text"  id="doctor_valide"  ng-keyup='searchElement($event,"quirofano/agenda/get/doctor/",1,searchTextDoctor)' ng-model='searchTextDoctor' name="doctor_valide"  class="form-control noEnterSubmit" value="DIRECTORY" autocomplete="off" ng-blur='valideIdDoctor()' required/>
                                            <span style="color:red" ng-show="formCitaSend.doctor_valide.$dirty && formCitaSend.doctor_valide.$invalid">
                                                <span ng-show="formCitaSend.doctor_valide.$dirty && formCitaSend.doctor_valide.$error.required">Debe Seleccionar un Doctor.</span>
                                            </span><br>
                                            <div id="search_doctor">
                                                <!-- Example content that is printed out after searchNameDept() is run -->
                                                <ul id='searchResultDoctor' >
                                                    <li ng-click='setDoctor($index)' ng-keyup="setDoctor($index)" class="search_org"  ng-repeat="result in doctors| limitTo:5" > [[ result.name]] [[ result.apellido]]</li>
                                                    <li ng-show="newDoctor">No existe el doctor,
                                                        <a href="{{CRUDBooster::adminPath().'/doctor/add?m=3'}}"> Agregar
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Anesteciólogo:</label>
                                            <input type="text"  id="anesthesiologist_valide" ng-keyup='searchVnesthesiologists($event)' ng-model='searchTextAnesthesiologist' name="anesthesiologist_valide"  class="form-control noEnterSubmit" value="DIRECTORY" autocomplete="off" ng-blur='valideIdAnesthesiologist()' required/>
                                            <span style="color:red" ng-show="formCitaSend.anesthesiologist_valide.$dirty && formCitaSend.anesthesiologist_valide.$invalid">
                                                <span ng-show="formCitaSend.anesthesiologist.$dirty && formCitaSend.anesthesiologist_valide.$error.required">Debe Seleccionar un Anesteciólogo.</span>
                                            </span><br>
                                            <div id="search_anesthesiologist">
                                                <!-- Example content that is printed out after searchNameDept() is run -->
                                                <ul id='searchResultAnesthesiologist' >
                                                    <li ng-click='setAnesthesiologist($index)' ng-keyup="setAnesthesiologist($index)" class="search_org"  ng-repeat="result in anesthesiologists| limitTo:5" >[[ result.name]] [[ result.apellido]]</li>
                                                    <li ng-show="newAnesthesiologist">No existe el anesteciólogo,
                                                        <a href="{{CRUDBooster::adminPath().'/paciente/add?m=3'}}"> Agregar
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                       <div class="form-group col-md-4">
                                            <label for="">Residente:</label>
                                            <input type="text"  id="resident_valide" ng-keyup='searchResidents($event)' ng-model='searchTextResident' name="resident_valide"  class="form-control noEnterSubmit" value="DIRECTORY" autocomplete="off" ng-blur='valideIdResident()' required/>
                                            <span style="color:red" ng-show="formCitaSend.resident_valide.$dirty && formCitaSend.resident_valide.$invalid">
                                                <span ng-show="formCitaSend.resident_valide.$dirty && formCitaSend.resident_valide.$error.required">Debe Seleccionar un Paciente.</span>
                                            </span><br>
                                            <div id="search_resident">
                                                <!-- Example content that is printed out after searchNameDept() is run -->
                                                <ul id='searchResultResident' >
                                                    <li ng-click='setResident($index)' ng-keyup="setResident($index)" class="search_org"  ng-repeat="result in residents| limitTo:5" >[[ result.name]] [[ result.apellido]]</li>
                                                    <li ng-show="newResident">No existe el residente,
                                                        <a href="{{CRUDBooster::adminPath().'/paciente/add?m=3'}}"> Agregar
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                            <hr>
                                    </div>
                                  <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for=""> Seleccione el paciente:</label>
                                            <input type="text"  id="paciente_valide" ng-keyup='searchElement($event,"quirofano/agenda/get/patient/",4,searchText)' ng-model='searchText' name="paciente_valide"  class="form-control noEnterSubmit" value="DIRECTORY" autocomplete="off" ng-blur='valideIdPatient()' required/>
                                            <span style="color:red" ng-show="formCitaSend.paciente_valide.$dirty && formCitaSend.paciente_valide.$invalid">
                                                <span ng-show="formCitaSend.paciente_valide.$dirty && formCitaSend.paciente_valide.$error.required">Debe Seleccionar un Paciente.</span>
                                            </span><br>
                                            <div id="search_patient">
                                                <!-- Example content that is printed out after searchNameDept() is run -->
                                                <ul id='searchResultPatient' >
                                                    <li ng-click='setPatient($index)' ng-keyup="setPatient($index)" class="search_org"  ng-repeat="result in patients| limitTo:5" >[[ result.ci]] - [[ result.name]] [[ result.apellido]]</li>
                                                    <li ng-show="newPatient">No existe el paciente,
                                                        <a href="{{CRUDBooster::adminPath().'/paciente/add?m=3'}}"> Agregar
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                      <div class="form-group col-md-4">
                                            <label for=""> Seleccione el Quirófano:</label>
                                            <input type="text"  id="salle_valide" ng-keyup='searchSalles($event)' ng-model='searchTextSalle' name="salle_valide"  class="form-control noEnterSubmit" value="DIRECTORY" autocomplete="off" ng-blur='valideIdSalle()' required/>
                                            <span style="color:red" ng-show="formCitaSend.salle_valide.$dirty && formCitaSend.salle_valide.$invalid">
                                                <span ng-show="formCitaSend.salle_valide.$dirty && formCitaSend.salle_valide.$error.required">Debe Seleccionar un quirófano.</span>
                                            </span><br>
                                            <div id="search_salle">
                                                <!-- Example content that is printed out after searchNameDept() is run -->
                                                <ul id='searchResultSalle' >
                                                    <li ng-click='setSalle($index)' ng-keyup="setSalle($index)" class="search_org"  ng-repeat="result in salles| limitTo:5" >[[ result.name]] </li>
                                                    <li ng-show="newPatient">No existe el quirofano,
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
<!--                                            <div class="col-sm-">
                                                <rzslider rz-slider-model="slider.value" rz-slider-options="slider.options"></rzslider>
                                            </div>-->
                                        </div>

<!--                                        <div class="col-sm-5" ng-show="convenios.length > 0">
                                            <label for="">Seleccione el tipo de convenio</label>
                                            <select name="convenio_valide" id="convenio" ng-change="setValueAgreement()" class="form-control" show-menu-arrow data-style="btn-primary" ng-model="searchTextAgreement"  required>
                                                <option ng-value="" ng-show="searchTextAgreement" ng-selected="true">--Seleccione--</option>
                                                <option ng-repeat="convenio in convenios" ng-value="convenio.id">[[convenio.name]]</option>
                                            </select>
                                            <span style="color:red" ng-show="formCitaSend.convenio_valide.$dirty && formCitaSend.convenio_valide.$invalid">
                                                <span ng-show="formCitaSend.convenio_valide.$error.required">Debe Seleccionar un Convenio.</span>
                                            </span>
                                        </div>-->
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
                                                <label for="">Precio: [[price]] <span ng-show="price != ''">$</span></label>
                                                <hr>
                                                <h5>Pagar:</h5>
                                                <input id="price" type="checkbox" data-group-cls="btn-group-justified">
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
        <!--FIN Panel de gestion de citas-->
        <div>

        </div>
    </div>
</div>


<!--  ANGULAR APP -->
<script src="{{asset('js/agenda/app.js')}}"></script>
<script src="{{asset('js/agenda/services.js')}}"></script>
<script src="{{asset('js/agenda/controller_quirofano.js')}}"></script>
<!--<script src="{{asset('js/agenda/directive.js')}}"></script>-->
<!--<script src="{{asset('js/agenda/moment_library.js')}}"></script>-->
<!--  ANGULAR APP -->
@endsection
