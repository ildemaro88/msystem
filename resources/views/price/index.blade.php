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

<div class = "box" ng-app="MyAppPrice" ng-controller="ControllerPrice" >
    <div class = "box-body">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li ng-class='{active:$first} ' ng-repeat="result in elements" ><a data-toggle="tab" href="#parent_[[result.id]]"> [[ result.nombre]]</li>
            </ul>
        </div>
        <div class="tab-content">

            <!--Inicio pestaña Laboratorio-->
            <div ng-repeat="element in elements" id="parent_[[element.id]]" class="tab-pane fade">

                <div ng-repeat="category in element.categorias" class="panel-group col-md-6" id="accordion_[[category.id]]">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="opcion" data-parent="#accordion" data-toggle="collapse" href="#category_[[category.id]]">
                                    [[category.nombre]]
                                </a>
                            </h4>
                        </div>
                        <div id="category_[[category.id]]" class="panel-collapse collapse">
                            <div class="box-body col-md-6" ng-repeat="examen in category.examenes">

                                <form  method="post"  name="formPriceSend[[examen.id]]" id="[[examen.id]]"  novalidate ng-submit="submitForm($event, formData,examen.id, {{$idEmpresa}})">
                                    <div class="form-group row pull-right">
                                        <label>[[examen.nombre]]</label>
                                        <div class="col-md-7 row">
                                            <input  class="form-control price" type="text" ng-model="formData.priceExamen[[examen.id]]" required>
                                            <input  class="form-control price" type="hidden" ng-model="formData.priceEdit[[examen.id]]" >

                                        </div>
                                        <div class="col-md-3 row" ng-model="formData.priceEdit[[examen.id]]">
                                            <button type="submit" class="btn btn-success" 
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
<script src="{{ asset ('js/price/app.js')}}"></script>
<script src="{{ asset ('js/price/services.js')}}"></script>
<script src="{{ asset ('js/price/controller.js')}}"></script>
<script>
    var idEmpresa = "{{$idEmpresa}}";
</script>
@endsection
