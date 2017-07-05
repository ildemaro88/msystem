<div id="mod_agregar_cita" class="modal fade bd-example-modal-md" tabindex="-1" role="dialog"
     aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="modalTitle"><i class="fa fa-clock-o" aria-hidden="true"></i> Fecha y
                    Hora</h3>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="">Fecha: </label>
                        </div>
                        <div class="col-xs-6">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input ng-model="cita.fecha" id="fecha" type="text" class="form-control pull-right"
                                       id="datepicker">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="">Hora de Inicio:</label>
                        </div>
                        <div class="col-xs-6">
                            <hora-inicio ng-model="horaInicio"></hora-inicio>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="">Hora de Fin:</label>
                        </div>
                        <div class="col-xs-6">
                            <hora_fin ng-model="horaFin"></hora_fin>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="form-group">
                    <div class="pull-right">
                        <button data-dismiss="modal" class="btn btn-success btn-sm"><i
                                    class="fa fa-plus-circle"></i> Aceptar
                        </button>
                        <button data-dismiss="modal" class="btn btn-default btn-sm"><i class="fa fa-close"></i>
                            Cerrar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{--fin modal edicion de evento--}}
<div class="modal fade" id="modal_autorizacion" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="fa fa-certificate" aria-hidden="true"></i> Autorización</h4>
            </div>
            <div class="modal-body">
                <div class="row">
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
                                <input placeholder="dd/mm/yyyy" ng-model="fecha_autorizacion" name="fecha_autorizacion" type="text"
                                       class="form-control datepicker">
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
            <div class="modal-footer">
                <div class="form-group">
                    <div class="pull-right">
                        <button data-dismiss="modal" class="btn btn-success btn-sm"><i
                                    class="fa fa-plus-circle"></i> Aceptar
                        </button>
                        <button data-dismiss="modal" class="btn btn-default btn-sm"><i class="fa fa-close"></i>
                            Cerrar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
