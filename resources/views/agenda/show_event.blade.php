
@extends("crudbooster::admin_template")
@section("content")
<link rel="stylesheet" href="{{asset('css/styles_search.css')}}">

<!--    <input type="text" ng-model="idSalleValue" >-->
<div class="box row">
    <!-- fin panel editar citas drop-->
    <div class="col-md-12">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 style="margin:0px">
                    <b style="font-size:13px">Detalles de la Cita: {{$cita->detalle_cita}}</b> 
                </h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-2">

                        <h4>Fecha Inicial: <a>{{$cita->start}}</a></h4>    
                        <h4>Fecha Final: <a>{{$cita->end}}</a> </h4> 
                        <h4>Paciente: <a>{{$cita->paciente->nombre}}</a> </h4>  
                    </div>
                    <div class="col-md-6">   
                        <h4>Observaciones: <a>{{$cita->descripcion}}</a> </h4>    
                    </div>
                </div>
                <div class=" ">
                    <br>
                    <div class=""> 
                        <div class="col-md-8 col-md-offset-4"> 
                            <div class="form-group"> 
                                <a href="{{ CRUDBooster::adminPath('medico/agenda') }}" 
                                   class="btn btn-default btn-lg">
                                    <i class="fa fa-minus-circle"></i> Ir a mi agenda
                                </a> 
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
@endsection
