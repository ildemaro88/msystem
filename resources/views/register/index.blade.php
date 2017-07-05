<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>{{trans("crudbooster.page_title_login")}} : {{CRUDBooster::getSetting('appname')}}</title>
  <meta name='generator' content='CRUDBooster'/>
  <meta name='robots' content='noindex,nofollow'/>
  <link rel="shortcut icon"
  href="{{ CRUDBooster::getSetting('favicon')?asset(CRUDBooster::getSetting('favicon')):asset('vendor/crudbooster/assets/logo_crudbooster.png') }}">

  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <!-- Bootstrap 3.3.2 -->
  <link href="{{asset('vendor/crudbooster/assets/adminlte/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"
  type="text/css"/>
  <!-- Font Awesome Icons -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"
  type="text/css"/>
  <!-- Theme style -->
  <link href="{{asset('vendor/crudbooster/assets/adminlte/dist/css/AdminLTE.min.css')}}" rel="stylesheet"
  type="text/css"/>
  <link rel="stylesheet" href="{{asset('css/styles.css')}}">
  <script src="{{asset('vendor/crudbooster/assets/sweetalert/dist/sweetalert.min.js')}}"></script>
  <link rel="stylesheet" type="text/css" href="{{asset('vendor/crudbooster/assets/sweetalert/dist/sweetalert.css')}}">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->

  <link rel='stylesheet' href='{{asset("vendor/crudbooster/assets/css/main.css")}}'/>
  <style type="text/css">
  .login-page, .register-page {
    background: {{ CRUDBooster::getSetting("login_background_color")?:'#dddddd'}} url('{{ CRUDBooster::getSetting("login_background_image")?asset(CRUDBooster::getSetting("login_background_image")):asset('vendor/crudbooster/assets/bg_blur3.jpg') }}');
    color: {{ CRUDBooster::getSetting("login_font_color")?:'#ffffff' }}  !important;
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
  }

  .login-box, .register-box {
    margin: 2% auto;
  }

  .login-box-body {
    box-shadow: 0px 0px 50px rgba(0, 0, 0, 0.8);
    background: rgba(255, 255, 255, 0.9);
    color: {{ CRUDBooster::getSetting("login_font_color")?:'#666666' }}  !important;
  }

  html, body {
    overflow: hidden;
  }

  body {
    padding-top: 25px;
  }
  </style>
</head>

<body class="login-page" ng-app="AppAgenda" ng-controller="CtrlApp">
  <!-- Modal -->
  <div style="color:black" id="registerModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content modal-md">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-user"></i> Crear cuenta nueva</h4>
        </div>
        <div class="modal-body">
          {{Form::open(array('url'=>'/admin/user','method'=>'post','id'=>'formSignUp','name'=>'formSignUp','ng-submit'=>'submit($event)',"novalidate"=>"novalidate","ng-submit-force"=>"true"))}}
          <div class="form-group">
            <label class="control-label" for="signupName">Cédula del paciente * {{--<small ng-show="verifyCedula" style="font-size: 16px;" class="fa fa-spinner fa-spin fa-3x fa-fw"></small>--}}</label>
            <input required name="cedula" ng-model="newUser.cedula" id="cedula"
            type="number" ng-minlength="10" ng-maxlength="10" class="form-control">
          </div>
          <div class="form-group">
            <label class="control-label" for="signupName">Nombre *</label>
            <input ng-model="newUser.SUnombre" required id="username" type="text" ng-minlength="3"
            ng-maxlength="50" class="form-control">
          </div>
          <div class="form-group" id="singUpEmail">
            <label class="control-label" for="signupEmail">Email *</label>
            <input ng-keyup="errorEmail = false" name="signupEmail" required ng-model="newUser.SUemail" id="SUemail" type="email" ng-maxlength="50"
            class="form-control">
            <span ng-show="errorEmail" class="glyphicon glyphicon-remove form-control-feedback"></span>
            <p ng-show="errorEmail" class="help-block">El e-mail ya existe!</p>
          </div>
          <div class="form-group">
            <label class="control-label" for="signupPassword">Contraseña *</label>
            <input required ng-model="newUser.SUPassword" id="signupPassword" type="password" ng-minlength="6"
            ng-maxlength="25" class="form-control" placeholder="mínimo 6 caractéres" length="40">
          </div>
          <div class="has-feedback" id="parentId">
            <label class="control-label" for="SUPasswordAgain">Repetir contraseña *</label>
            <input ng-keyup="element()" required ng-model="newUser.SUPasswordAgain" id="signupPasswordagain"
            type="password" class="form-control">
            <span ng-show="success" class="glyphicon glyphicon-ok form-control-feedback"></span>
            <span ng-show="error" class="glyphicon glyphicon-remove form-control-feedback"></span>

            <p ng-show="error" class="help-block">Las contraseñas no coinciden</p>
          </div>
          <br>

          <div class="form-group">
            <button id="signupSubmit" type="submit" class="btn btn-info btn-block">Crear cuenta nueva
            </button>
          </div>
          <p class="form-group">Al crear su cuenta, acepta nuestros <a href="#">Términos de uso</a> y nuestras
            <a href="#">Políticas de privacidad</a>.</p>
            <hr>
            <p></p>Ya tiene una cuenta? <a href="#" data-dismiss="modal">Ingresar</a></p>
            {{Form::close()}}
          </div>
        </div>
      </div>
    </div>
    {{--fin modal--}}
    <div class="login-box">
      <div class="login-logo">
        <a href="{{url('/')}}">
          <img title='{!!(CRUDBooster::getSetting('appname') == 'CRUDBooster')?"<b>CRUD</b>Booster":CRUDBooster::getSetting('appname')!!}'
          src='{{ CRUDBooster::getSetting("logo")?asset(CRUDBooster::getSetting('logo')):asset('vendor/crudbooster/assets/logo_crudbooster.png') }}'
          style='max-width: 100%;max-height:170px'/>
        </a>
      </div>
      <!-- /.login-logo -->
      <div class="login-box-body">
        @if ( Session::get('message') != '' )
        <div class='alert alert-warning'>
          {{ Session::get('message') }}
        </div>
        @endif

        <p class='login-box-msg'>{{trans("crudbooster.login_message")}}</p>

        <form autocomplete='off' action="{{ route('postLogin') }}" method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

          <div class="form-group has-feedback">
            <input autocomplete='off' type="text" class="form-control" name='email' required placeholder="Email"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input autocomplete='off' type="password" class="form-control" name='password' required
            placeholder="Password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div style="margin-bottom:10px" class='row'>
            <div class='col-xs-12'>
              <button type="submit" class="btn btn-primary btn-block btn-flat"><i
                class='fa fa-lock'></i> {{trans("crudbooster.button_sign_in")}}</button>
              </div>
            </div>

            <div class='row'>
              <div class='col-xs-12' align="center"><p
                style="padding:10px 0px 10px 0px">{{trans("crudbooster.text_forgot_password")}} <a
                href='{{route("getForgot")}}'>Clic aqui</a></p></div>
                <div class='col-xs-12' align="center"><p style="padding:0px 0px 10px 0px">No tiene cuenta ? <a
                  data-toggle="modal" data-target="#registerModal" href='#'><i class="fa fa-plus-circle"
                  aria-hidden="true"></i>
                  Registrarse</a></p></div>
                </div>
              </form>


              <br/>
              <!--a href="#">I forgot my password</a-->

            </div>
            <!-- /.login-box-body -->

          </div>
          <!-- /.login-box -->


          <!-- jQuery 2.1.3 -->
          <script src="{{asset('vendor/crudbooster/assets/adminlte/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
          <!-- Bootstrap 3.3.2 JS -->
          <script src="{{asset('vendor/crudbooster/assets/adminlte/bootstrap/js/bootstrap.min.js')}}"
          type="text/javascript"></script>
          <script src="{{asset('bower_resources/angular/angular.min.js')}}"></script>
          <script src="{{asset('bower_resources/angular-auto-validate/dist/jcs-auto-validate.min.js')}}"></script>

          <script>
          var agenda = angular.module("AppAgenda", ['jcs-autoValidate'], function ($interpolateProvider) {
            $interpolateProvider.startSymbol('[[');
            $interpolateProvider.endSymbol(']]');
          });
          agenda.run([
            'bootstrap3ElementModifier',
            function (bootstrap3ElementModifier) {
              bootstrap3ElementModifier.enableValidationStateIcons(true);
            }]);
            //*********

            //*********
            agenda.controller("CtrlApp", function ($scope, $http, $window) {
              $scope.newUser = {};
              $scope.init = function () {
                $scope.validate_cedula = false;
                //$scope.user.password ='';
              };

              $scope.init();
              $scope.element = function () {
                var el = angular.element(document.querySelector('#parentId'));
                if ($scope.newUser.SUPassword != $scope.newUser.SUPasswordAgain) {
                  $scope.error = true;
                  $scope.success = false;
                  el.addClass('has-error');
                  el.removeClass('has-success');

                } else if ($scope.newUser.SUPassword == $scope.newUser.SUPasswordAgain) {
                  $scope.error = false;
                  $scope.success = true;
                  el.addClass('has-success');
                  el.removeClass('has-error');
                }
              };
              $scope.reloadRoute = function () {
                $window.location.reload();
              };
              $scope.submit = function (e) {
                e.preventDefault();
                var form = angular.element(document.querySelector('#formSignUp'));
                if ($scope.formSignUp.$valid && $scope.success) {
                  swal({
                    title: "Procesando",
                    text: 'Espere...',
                    showConfirmButton: false
                  });
                  $http({
                    url: form["0"].action,
                    method: 'POST',
                    data: this.newUser,
                    headers: {
                      'Content-Type': 'application/json'
                    }
                  }).then(function (data) {
                    if(data.data.response == true){
                      swal({
                        title: "Correcto!",
                        text: 'Realizado con éxito!',
                        type:"success",
                        showConfirmButton: true
                      },function(){
                        $scope.reloadRoute();
                      });
                    }else if(data.data.response == "duplicate") {
                      swal("Error!", "EL e-mail YA EXISTE!", "error");
                      var el = angular.element(document.querySelector('#singUpEmail'));
                      el.addClass('has-error');
                      el.removeClass('has-success');
                      $scope.errorEmail = true;
                    }else if(data.data.response == "existe"){
                      swal("Error!", "El Paciente ya tiene asignada una cuenta de Usuario! CONTACTE A CALL CENTER PARA MAS INFORMACIÓN!", "error");
                    }else {
                      swal("Error!", "Error en la transacción!", "error");
                    }
                  });
                }else{
                  alert('no validado');
                }
              };
              /*$scope.verifyPaciente = function () {
              $scope.verifyCedula =true;
              $http({
              url: '{{ CRUDBooster::adminPath('verifyPaciente')}}',
              method: 'GET',
              params: {"cedula": $scope.cedula},
              headers: {
              'Content-Type': 'application/x-www-form-urlencoded'
            }
          }).then(function (data) {
          $scope.verifyCedula =false;
          var nombre = data.data.p["nombre"].toString();
          console.log(nombre)
          if (data.data.p == true) {
          $scope.SUnombre = nombre;
          console.log($scope.SUnombre);
          $scope.SUemail = data.data.p["email"];
          //$scope.panelNewCita();
          //$("#calendar").fullCalendar("refetchEvents");
        } else if(data.data.uc) {
        //swal("Correcto!", "Cita eliminada correctamente!", "success");
        swal({
        title: "Advertencia!",
        type: "warning",
        text: "El usuario ya existe en el sistema!"
      });
      //swal("Error!", "No se pudo borrar la cita!", "error");
    }

  });
};*/
});
</script>
</body>
</html>
