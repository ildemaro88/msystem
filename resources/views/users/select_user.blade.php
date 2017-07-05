<link rel='stylesheet' href='<?php echo asset("vendor/crudbooster/assets/select2/dist/css/select2.min.css")?>'/>
<style>
    .select2-container--default .select2-selection--single {border-radius: 0px !important}
    .select2-container .select2-selection--single {height: 35px}
</style>
<div  class='form-group header-group-0 ' >
    <label class='control-label col-sm-2'></label>

    <div class="col-sm-10" id="check_medico">
        <div class="checkbox">
            <label><input ng-click="loadType()" ng-model="check_medico"  type="checkbox" value="">Médico</label>
        </div>
        <div class="text-danger"></div>
        <p class='help-block'></p>
    </div>
</div>
<div ng-show="select" class='form-group header-group-0'>
    <label class='control-label col-sm-2'>Seleccione </label>

    <div class="col-sm-10">
        <select style="width: 100%"  class="select2" name="medico_id" id="tipo_id" ng-model="medico_id" ng-change="selected()">
            <option value="">Seleccione...</option>
            <option data-correo="[[i.email]]" value="[[i.id]]" data-especialidad="[[i.especialidad]]" ng-repeat="i in item">[[i.nombre+' '+i.apellido]] </option>
        </select>
        <div class="text-danger"></div>
        <p class='help-block'></p>
        <div class="text-danger"></div>
        <p class='help-block'></p>
    </div>
</div>

<script src='<?php echo asset("vendor/crudbooster/assets/select2/dist/js/select2.full.min.js")?>'></script>
<script>

    $(document).ready(function() {
       var privilegio = "{{Session::get(admin_privileges)}}";
       var sucursal = "{{Session::get(sucursal)}}";
        
        if(privilegio == 6){
            $("#id_cms_privileges option[value='6']").remove();
             $("#id_cms_privileges option[value='5']").remove();
                    $("#id_cms_privileges").val("");
                   
                     $("#id_institucion").val(sucursal);
                      $("#form-group-id_institucion").attr("style","display : none;");
        }
        if(privilegio == 5){
            //alert(privilegio);
            $("#id_cms_privileges option[value='5']").remove();
                    $("#id_cms_privileges").val("");

        }
        
    } );
    
    $("#tipo_id").change(function(){
            
        var especialidad = $("#tipo_id option:selected").attr("data-especialidad");
            if(especialidad == 1){
                $("#id_cms_privileges").val(7);
            }
            console.log($("#id_cms_privileges").val());
    });
    $(".select2").select2();
    var app = angular.module('App',[],function($interpolateProvider){
        $interpolateProvider.startSymbol('[[');
        $interpolateProvider.endSymbol(']]');
    });

    app.controller('Ctrl',function($scope,$http){
        $scope.loadType=function(tipo){
            if($scope.check_medico  ){
                $scope.select = true; // muestra u oculta el select2
                
                $("#id_cms_privileges").append('<option value="4">Medico</option>');

                $("#id_cms_privileges").val(4);
                $("#form-group-id_cms_privileges").attr("style","display : none;");
                console.log( $("#id_cms_privileges").val());
            }else {
                $scope.select = false; // muestra u oculta el select2
                $("#form-group-id_cms_privileges").removeAttr("style");
                $("#id_cms_privileges option[value='4']").remove();
                $("#id_cms_privileges").val("");
                console.log( $("#id_cms_privileges").val());
            }
            

            var url = '{{CRUDBooster::adminPath($slug='todoMedicoU')}}';
            $http({
                method: 'GET',
                url: url,
                params:{medico_id:$scope.medico_id},
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
            }).then(function(data){
                console.log(data.data.medico);
                if(data.data.medico.length < 1){
                    //alert("hola");
                    console.log(data.data.medico.length);
                   $("#check_medico").attr("style","display : none;");

                }else{
                    $("#check_medico").removeAttr("style");
                }
                $scope.item = data.data.medico;
                $scope.$watch('item',function(){
                    $(".select2").select2();
                });
                
            });
        };
        $scope.loadType();

        $scope.selected=function(){
            $scope.name = $("#tipo_id option:selected").text();
           
            $scope.email = $("#tipo_id option:selected").attr("data-correo");
        };
        //cuando se envie el formulario
        $scope.submit = function(){
            var url = '{{CRUDBooster::adminPath($slug='medico/update')}}';
            $http({
                method: 'POST',
                url: url,
                data:{"medico_id":$scope.medico_id},
                headers: { 'Content-Type': 'application/json' }
            });
        };
    });
</script>