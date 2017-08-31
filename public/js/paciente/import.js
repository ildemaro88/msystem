$(document).ready(function() {
		alert("hla");

	console.log("{{$pacientesImportados}}"+"asd");
	if("{{$pacientesImportados}}"){

		$(".btn-success").attr('href',"{{route('listPacientes')}}");
	}
});