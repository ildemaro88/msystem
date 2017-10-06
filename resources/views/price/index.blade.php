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


    .panel-collapse{
        padding-left: 3px;
    }
    .price{
        font-size: 20px;
    }
</style>
<div class="box">
    <div class="box-header">
        <a href="{{CRUDBooster::adminPath().'/empresa?m=89'}}">
            <button class="btn btn-default btn-sm"><i class="glyphicon glyphicon-circle-arrow-left"></i> Empresas</button>
        </a>
    </div>
    <div class = "box" ng-app="MyAppPrice" ng-controller="ControllerPrice" >
        <div class = "box-body">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a data-toggle="tab" href="#consultations"> CONSULTAS</a>
                    </li>
                    <li ng-show="result.categorias.length > 0" ng-repeat="result in elements" >
                        <a data-toggle="tab" href="#parent_[[result.id]]"> [[ result.nombre]]</a>
                    </li>  
                </ul>
            </div>
            <div class="tab-content">
                <!--Inicio pestaña Consultas-->
                <div id="consultations" class="tab-pane active">

                    <div  class="panel-group col-md-12" id="consultation">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <div class="row">
                                        <div class="col-md-6 pull-left">
                                            <a ng-click="activeSearchSpecialty()" class="opcion" data-parent="#consultation" data-toggle="collapse" href="#specialty">
                                                ESPECIALIDADES
                                            </a> 
                                        </div>
                                        <div class="col-md-6 pull-right" id="filter_specialty">
                                            <input placeholder="Buscar" class="form-control" type="text" ng-model="searchSpecialty">
                                        </div>
                                    </div>
                                </h4>
                            </div>
                            <div id="specialty" class="panel-collapse collapse in ">
                                <div class="box-body col-md-4" ng-repeat="specialty in specialties |filter:searchSpecialty">
                                    <form name="formPriceSpecialty[[specialty.id]]" id="form_specialty[[specialty.id]]"  novalidate>
                                        <div class="form-group row pull-right">
                                            <label>[[specialty.descripcion]]</label>
                                            <div class="col-md-7 row" >
                                                <input  class="form-control price" type="text" maxlength="6" onkeypress="return isNumericCurrency(event)"
                                                        ng-model="formDataSpecialty.priceSpecialty[[specialty.id]]" required>
                                                <input  class="form-control price" type="hidden" ng-model="formDataSpecialty.priceEdit[[examen.id]]" >

                                            </div>
                                            <div class="col-md-3 row" ng-model="formDataSpecialty.priceEdit[[examen.id]]">
                                                <button type="button" class="btn btn-success" 
                                                        ng-click="submitFormSpecialty($event, formDataSpecialty, specialty.id, {{$idEmpresa}})"
                                                        ng-disabled="!formPriceSpecialty[[specialty.id]].$valid"
                                                        style="margin-right: 5px;">
                                                    <i class="fa fa-check"></i> OK
                                                </button>
                                            </div>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--fin pestaña Consultas-->
                <!--Inicio pestaña Laboratorio-->
                <div ng-show="element.categorias.length > 0" ng-repeat="element in elements" id="parent_[[element.id]]" class="tab-pane fade">

                    <div   ng-repeat="category in element.categorias" class="panel-group col-md-6" id="accordion_[[category.id]]">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-md-6 pull-left">
                                        <h4 class="panel-title">
                                            <a class="opcion" ng-click="activeSearch(category.id)" data-parent="#accordion" data-toggle="collapse" href="#category_[[category.id]]">
                                                [[category.nombre]]
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="col-md-6 pull-right" id="filter_[[category.id]]" style="display:none">
                                        <input placeholder="Buscar" class="form-control" type="text" ng-model="searchExamen[[category.id]]">
                                    </div>
                                </div>
                            </div>
                            <div id="category_[[category.id]]" class="panel-collapse collapse">
                                <div class="box-body col-md-6" ng-repeat="examen in category.examenes |filter:searchExamen[[category.id]]">

                                    <form  method="post"  name="formPriceSend[[examen.id]]" id="[[examen.id]]"  novalidate>
                                        <div class="form-group row pull-right">
                                            <label>[[examen.nombre]]</label>
                                            <div class="col-md-7 row">
                                                <input  class="form-control price" type="text" maxlength="6" onkeypress="return isNumericCurrency(event)" ng-model="formData.priceExamen[[examen.id]]" required>
                                                <input  class="form-control price" type="hidden" ng-model="formData.priceEdit[[examen.id]]" >

                                            </div>
                                            <div class="col-md-3 row" ng-model="formData.priceEdit[[examen.id]]">
                                                <button type="button" ng-click="submitForm($event, formData,examen.id, {{$idEmpresa}})"
                                                        class="btn btn-success" 
                                                        ng-disabled="!formPriceSend[[examen.id]].$valid"
                                                        style="margin-right: 5px;">
                                                    <i class="fa fa-check"></i> OK
                                                </button>
                                            </div>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>        

            </div>
        </div>
    </div>
</div>
<script src="{{ asset ('js/price/app.js')}}"></script>
<script src="{{ asset ('js/price/services.js')}}"></script>
<script src="{{ asset ('js/price/controller.js')}}"></script>
<script>
    var idEmpresa = "{{$idEmpresa}}";
    function isNumericCurrency(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
 console.log(charCode)
    if (charCode == 8 || charCode == 37 || charCode == 39)
        return true;
    //Chequear solo un punto (.)
    if (charCode == 46 && $(evt.target).val().lastIndexOf('.') !== -1)
        return false;

    //Solo 2 lugares decimales
    if ($(evt.target).val().lastIndexOf('.') !== -1 && $(evt.target).val().length - $(evt.target).val().lastIndexOf('.') >= 3)
        return false;

    if (charCode != 46 && charCode > 31
        && (charCode < 48 || charCode > 57))
        return false;

    return true;
}
</script>
@endsection
