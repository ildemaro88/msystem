var procesar = function(el,dia){
		var vm = angular.element('[ng-controller="CtrlApp as vm"]').scope();
		
			//console.log(el);
			
			//$(el).is(':checked')? vm.desactivarH(day,dia) :  vm.activarH(day,dia);
		
		//else{console.log(el);
			
			

			el.getAttribute("checked") == null ? el.setAttribute("checked",true) :  el.removeAttribute("checked");
			el.getAttribute("checked") == null ? vm.desactivar(dia) :  vm.activar(dia);

			
		//}
		//console.log(el);
		

	}

var procesarH = function(el,dia){
	var vm = angular.element('[ng-controller="CtrlApp as vm"]').scope();
		el.getAttribute("checked") == null ? el.setAttribute("checked",true) :  el.removeAttribute("checked");
		var day = el.getAttribute("data-slider");
		
		if(el.getAttribute("checked") == null){
			//console.log('nulo ' +day);
			vm.desactivarH(day,dia);
		}else{
			//console.log('no nulo ' +day);
			vm.activarH(day,dia);
		}
		
			//el.getAttribute("checked") == null ?  :  ;
			//console.log(el);
		
}

$('#lunes').checkboxpicker({
	html:true,
	offLabel:'Lunes',
	onLabel:'Lunes'
}).on('change', function() {
	var change = new procesar(this,"lunes");
});
$('#martes').checkboxpicker({
	html:true,
	offLabel:'Martes',
	onLabel:'Martes'
}).on('change', function() {
	var change = new procesar(this,"martes");
});
$('#miercoles').checkboxpicker({
	html:true,
	offLabel:'Miércol.',
	onLabel:'Miércol.'
}).on('change', function() {
	var change = new procesar(this,"miercoles");
});
$('#jueves').checkboxpicker({
	html:true,
	offLabel:'Jueves',
	onLabel:'Jueves'
}).on('change', function() {
	var change = new procesar(this,"jueves");
});
$('#viernes').checkboxpicker({
	html:true,
	offLabel:'Viernes',
	onLabel:'Viernes'
}).on('change', function() {
	var change = new procesar(this,"viernes");
});
$('#sabado').checkboxpicker({
	html:true,
	offLabel:'Sábado',
	onLabel:'Sábado'
}).on('change', function() {
	var change = new procesar(this,"sabado");
});
$('#domingo').checkboxpicker({
	html:true,
	offLabel:'Domin.',
	onLabel:'Domin.'
}).on('change', function() {
	var change = new procesar(this,"domingo");
});

$('.manana').checkboxpicker({
	html:true,
	offLabel:'Mañana',
	onLabel:'Mañana'
}).on('change', function() {
	var change = new procesarH(this,"manana");
});
$('.tarde').checkboxpicker({
	html:true,
	offLabel:'Tarde',
	onLabel:'Tarde'
}).on('change', function() {
	var change = new procesarH(this,"tarde");
});
	//console.log('{{$operation}}');
	$('.manana').prop('disabled', true);
	$('.tarde').prop('disabled', true);


