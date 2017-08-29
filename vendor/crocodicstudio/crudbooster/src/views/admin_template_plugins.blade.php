<!-- Server configuration -->
<script src="{{ asset ('js/configServer.js') }}"></script>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

	<!-- Bootstrap 3.3.2 -->
    <link href="{{ asset("vendor/crudbooster/assets/adminlte/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="{{asset("vendor/crudbooster/assets/adminlte/font-awesome/css")}}/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

	<!-- REQUIRED JS SCRIPTS -->

	<!-- jQuery 2.1.3 -->
	<script src="{{ asset ('vendor/crudbooster/assets/adminlte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>

	<!-- Bootstrap 3.3.2 JS -->
	<script src="{{ asset ('vendor/crudbooster/assets/adminlte/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
	<!-- AdminLTE App -->
	<script src="{{ asset ('vendor/crudbooster/assets/adminlte/dist/js/app.js') }}" type="text/javascript"></script>

	<!--BOOTSTRAP DATEPICKER-->
	<script src="{{ asset ('vendor/crudbooster/assets/adminlte/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
	<script src="{{ asset ('vendor/crudbooster/assets/adminlte/plugins/datepicker/locales/bootstrap-datepicker.es.js') }}" charset="UTF-8"></script>
	<link rel="stylesheet" href="{{ asset ('vendor/crudbooster/assets/adminlte/plugins/datepicker/datepicker3.css') }}">

	<!--INPUT MASK-->
	<script src="{{ asset ('vendor/crudbooster/assets/adminlte/plugins/input-mask/jquery.inputmask.js') }}"></script>

<!--BOOTSTRAP DATERANGEPICKER-->
<script src="{{ asset ('vendor/crudbooster/assets/adminlte/plugins/daterangepicker/moment.min.js') }}"></script>
{{--<script src="{{ asset ('vendor/crudbooster/assets/adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>--}}
{{--<link rel="stylesheet" href="{{ asset ('vendor/crudbooster/assets/adminlte/plugins/daterangepicker/daterangepicker-bs3.css') }}">--}}

<!-- Bootstrap time Picker -->
  	<link rel="stylesheet" href="{{ asset ('vendor/crudbooster/assets/adminlte/plugins/timepicker/bootstrap-timepicker.min.css') }}">
	<script src="{{ asset ('vendor/crudbooster/assets/adminlte/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>

	<link rel='stylesheet' href='{{ asset("vendor/crudbooster/assets/fancy//source/jquery.fancybox.css") }}'/>
	<script src="{{ asset('vendor/crudbooster/assets/fancy/source/jquery.fancybox.pack.js') }}"></script>

	<!--SWEET ALERT-->
	<script src="{{asset('vendor/crudbooster/assets/sweetalert/dist/sweetalert.min.js')}}"></script>
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/crudbooster/assets/sweetalert/dist/sweetalert.css')}}">

	<!--MONEY FORMAT-->

	<script src="{{asset('vendor/crudbooster/jquery.price_format.2.0.min.js')}}"></script>
	<!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ asset ('vendor/crudbooster/assets/adminlte/plugins/iCheck/all.css')}}">
  <link rel="stylesheet" href="{{ asset ('vendor/crudbooster/assets/adminlte/dist/css/skins/_all-skins.min.css')}}">
 

	<!--DATATABLE-->
  	<link rel="stylesheet" href="{{ asset ('vendor/crudbooster/assets/adminlte/plugins/datatables/dataTables.bootstrap.css')}}">
	<script src="{{ asset ('vendor/crudbooster/assets/adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
	
	<script src="{{ asset ('vendor/crudbooster/assets/adminlte/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
	
	<!-- iCheck 1.0.1 -->
	
	<script src="{{ asset ('vendor/crudbooster/assets/adminlte/plugins/iCheck/icheck.min.js')}}"></script>
	<script>
		var ASSET_URL           = "{{asset('/')}}";
		var APP_NAME            = "{{CRUDBooster::getSetting('appname')}}";
		var ADMIN_PATH          = '{{url(config("crudbooster.ADMIN_PATH")) }}';
		var NOTIFICATION_JSON   = "{{route('NotificationsControllerGetLatestJson')}}";
		var NOTIFICATION_INDEX  = "{{route('NotificationsControllerGetIndex')}}";

		$(function() {
			$('.datatables-simple').DataTable();
		})
	</script>
	<script src="{{asset('vendor/crudbooster/assets/js/main.js')}}"></script>
	<link rel='stylesheet' href='{{asset("vendor/crudbooster/assets/css/main.css")}}'/>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>  
  

   <!-- Algolia Search API Client - latest version -->
  <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
