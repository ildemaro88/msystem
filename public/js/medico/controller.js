agenda.controller("CtrlApp", function ($scope, $http, $window, $timeout,$q) {
    /*
     * Inicializacion
     */
    // Constructor  -->
    var vm = this; // this == controller

    var Slider = function(){      
      this.slider = {
        inicio:'',
        fin:'',
        minValue:'07:00',
        maxValue:'12:00',
        options: {
          stepsArray:[
          {value:'07:00'},
          {value:'08:00'},
          {value:'09:00'},
          {value:'10:00'},
          {value:'11:00'},
          {value:'12:00'},
          ],
          floor: '07:00',
          ceil: '12:00',
          vertical:false,
          showTicksValues: true,
          disabled:true,
          draggableRange: true,
          minRange: 1,
          onChange: function(sliderId, modelValue, highValue, pointerType) {
            switch(this.id){
              case 1:
              vm.lunSlider.inicio = modelValue;
              vm.lunSlider.fin = highValue;
              break;
              case 2:
              vm.marSlider.inicio = modelValue;
              vm.marSlider.fin = highValue;
              break;
              case 3:
              vm.mieSlider.inicio = modelValue;
              vm.mieSlider.fin = highValue;
              break;
              case 4:
              vm.jueSlider.inicio = modelValue;
              vm.jueSlider.fin = highValue;
              break;
              case 5:
              vm.vieSlider.inicio = modelValue;
              vm.vieSlider.fin = highValue;
              break;
              case 6:
              vm.sabSlider.inicio = modelValue;
              vm.sabSlider.fin = highValue;
              break;
              case 0:
              vm.domSlider.inicio = modelValue;
              vm.domSlider.fin = highValue;
              break;
            }
          },
        }
      }
      return this.slider;
    };

    var SliderT = function(){
      this.slider = {
        minValue:'13:00',
        maxValue:'20:00',
        options: {
          stepsArray:[
          {value:'13:00'},
          {value:'14:00'},
          {value:'15:00'},
          {value:'16:00'},
          {value:'17:00'},
          {value:'18:00'},
          {value:'19:00'},
          {value:'20:00'},
          ],
          step: 1,
          floor: '13:00',
          ceil: '20:00',
          vertical:false,
          showTicksValues: true,
          disabled:true,
          draggableRange: true,
          minRange: 0,
          onChange: function(sliderId, modelValue, highValue, pointerType) {
            switch(this.id){
              case 1:
              vm.lunSliderT.inicio = modelValue;
              vm.lunSliderT.fin = highValue;
              break;
              case 2:
              vm.marSliderT.inicio = modelValue;
              vm.marSliderT.fin = highValue;
              break;
              case 3:
              vm.mieSliderT.inicio = modelValue;
              vm.mieSliderT.fin = highValue;
              break;
              case 4:
              vm.jueSliderT.inicio = modelValue;
              vm.jueSliderT.fin = highValue;
              break;
              case 5:
              vm.vieSliderT.inicio = modelValue;
              vm.vieSliderT.fin = highValue;
              break;
              case 6:
              vm.sabSliderT.inicio = modelValue;
              vm.sabSliderT.fin = highValue;
              break;
              case 0:
              vm.domSliderT.inicio = modelValue;
              vm.domSliderT.fin = highValue;
              break;
            }
          },
        }
      }
      return this.slider;
    };

    $scope.activarH= function(dia,h){
      switch(dia){
        case "lunes":
          if(h == 'tarde'){            
            vm.lunSliderT.options.disabled=false;
            $("input[name="+dia+"_start_t]").val('13:00');
            $("input[name="+dia+"_end_t]").val('20:00');            
          }else{
            $("input[name="+dia+"_start]").val('07:00');
            $("input[name="+dia+"_end]").val('12:00');      
            vm.lunSlider.options.disabled=false;
          }
        
        
        break;
        case "martes":
          if(h == 'tarde'){
            vm.marSliderT.options.disabled=false;
            $("input[name="+dia+"_start_t]").val('13:00');
            $("input[name="+dia+"_end_t]").val('20:00'); 
          }else{   
            vm.marSlider.options.disabled=false;
            $("input[name="+dia+"_start]").val('07:00');
            $("input[name="+dia+"_end]").val('12:00'); 
          }
        
        break;
        case "miercoles":
          if(h == 'tarde'){
            vm.mieSliderT.options.disabled=false;
             $("input[name="+dia+"_start_t]").val('13:00');
            $("input[name="+dia+"_end_t]").val('20:00'); 
          }else{
            vm.mieSlider.options.disabled=false;
            $("input[name="+dia+"_start]").val('07:00');
            $("input[name="+dia+"_end]").val('12:00'); 
          }
        
        
        break; 
        case "jueves":
          if(h == 'tarde'){
            vm.jueSliderT.options.disabled=false;
            $("input[name="+dia+"_start_t]").val('13:00');
            $("input[name="+dia+"_end_t]").val('20:00'); 
          }else{
            vm.jueSlider.options.disabled=false;
            $("input[name="+dia+"_start]").val('07:00');
            $("input[name="+dia+"_end]").val('12:00'); 
          }
        
       
        break;
        case "viernes":
          if(h == 'tarde'){
            vm.vieSliderT.options.disabled=false;
            $("input[name="+dia+"_start_t]").val('13:00');
            $("input[name="+dia+"_end_t]").val('20:00'); 
          }else{
            vm.vieSlider.options.disabled=false;
            $("input[name="+dia+"_start]").val('07:00');
            $("input[name="+dia+"_end]").val('12:00'); 
          }
        
        
        break;
        case "sabado":
          if(h == 'tarde'){
            vm.sabSliderT.options.disabled=false;
            $("input[name="+dia+"_start_t]").val('13:00');
            $("input[name="+dia+"_end_t]").val('20:00'); 
          }else{
            vm.sabSlider.options.disabled=false;
            $("input[name="+dia+"_start]").val('07:00');
            $("input[name="+dia+"_end]").val('12:00'); 
          }
        
        
        break;
        case "domingo":
          if(h == 'tarde'){
            vm.domSliderT.options.disabled=false;
            $("input[name="+dia+"_start_t]").val('13:00');
            $("input[name="+dia+"_end_t]").val('20:00'); 
          }else{
            vm.domSlider.options.disabled=false;
            $("input[name="+dia+"_start]").val('07:00');
            $("input[name="+dia+"_end]").val('12:00'); 
          }
        
        
        break;
      }
        //console.log(dia);
      $scope.$broadcast('rzSliderForceRender');
    };
    $scope.desactivarH= function(dia,h){
      console.log(dia+' '+h);
      switch(dia){
        case "lunes":
          if(h == 'tarde'){
            vm.lunSliderT.inicio=0;
            vm.lunSliderT.fin=0;
            vm.lunSliderT.options.disabled=true;
          }else{
            vm.lunSlider.inicio=0;
            vm.lunSlider.fin=0;
            vm.lunSlider.options.disabled=true;
          }
        
        
        break;
        case "martes":
          if(h == 'tarde'){
            vm.marSliderT.inicio=0;
            vm.marSliderT.fin=0;
            vm.marSliderT.options.disabled=true;
          }else{   
            vm.marSlider.inicio=0;
            vm.marSlider.fin=0;
            vm.marSlider.options.disabled=true;
          }
        
        break;
        case "miercoles":
          if(h == 'tarde'){
            vm.mieSliderT.inicio=0;
            vm.mieSliderT.fin=0;
            vm.mieSliderT.options.disabled=true;
          }else{
            vm.mieSlider.inicio=0;
            vm.mieSlider.fin=0;
            vm.mieSlider.options.disabled=true;
          }
        
        
        break; 
        case "jueves":
          if(h == 'tarde'){
            vm.jueSliderT.inicio=0;
            vm.jueSliderT.fin=0;
             vm.jueSliderT.options.disabled=true;
          }else{
            vm.jueSlider.inicio=0;
            vm.jueSlider.fin=0;
            vm.jueSlider.options.disabled=true;
          }
        
       
        break;
        case "viernes":
          if(h == 'tarde'){
            vm.vieSliderT.inicio=0;
            vm.vieSliderT.fin=0;
            vm.vieSliderT.options.disabled=true;
          }else{
            vm.vieSlider.inicio=0;
            vm.vieSlider.fin=0;
            vm.vieSlider.options.disabled=true;
          }
        
        
        break;
        case "sabado":
          if(h == 'tarde'){
            vm.sabSliderT.inicio=0;
            vm.sabSliderT.fin=0;
            vm.sabSliderT.options.disabled=true;
          }else{
            vm.sabSlider.inicio=0;
            vm.sabSlider.fin=0;
            vm.sabSlider.options.disabled=true;
          }
        
        
        break;
        case "domingo":
          if(h == 'tarde'){
            vm.domSliderT.inicio=0;
            vm.domSliderT.fin=0;
            vm.domSliderT.options.disabled=true;
          }else{
            vm.domSlider.inicio=0;
            vm.domSlider.fin=0;
            vm.domSlider.options.disabled=true;
          }
        
        
        break;
     }
       
     $scope.$broadcast('rzSliderForceRender');
   };


    $scope.activar= function(dia){
      switch(dia){
        case "lunes":
        vm.lunSlider.options.disabled=false;
        vm.lunSliderT.options.disabled=false;
        break;
        case "martes":
        vm.marSlider.options.disabled=false;
        vm.marSliderT.options.disabled=false;
        break;
        case "miercoles":
        vm.mieSlider.options.disabled=false;
        vm.mieSliderT.options.disabled=false;
        break; 
        case "jueves":
        vm.jueSlider.options.disabled=false;
        vm.jueSliderT.options.disabled=false;
        break;
        case "viernes":
        vm.vieSlider.options.disabled=false;
        vm.vieSliderT.options.disabled=false;
        break;
        break;case "sabado":
        vm.sabSlider.options.disabled=false;
        vm.sabSliderT.options.disabled=false;
        break;
        break;case "domingo":
        vm.domSlider.options.disabled=false;
        vm.domSliderT.options.disabled=false;
        break;
      }
      $("#manana"+dia).prop('checked', true);
      $("#tarde"+dia).prop('checked', true);
      $("#manana"+dia).prop('disabled', false);
      $("#tarde"+dia).prop('disabled', false);
       // console.log(dia);
      $scope.$broadcast('rzSliderForceRender');
    };
    $scope.desactivar= function(dia){
      switch(dia){
       case "lunes":
       vm.lunSlider.options.disabled=true;
       vm.lunSliderT.options.disabled=true;
       break;
       case "martes":
       vm.marSlider.options.disabled=true;
       vm.marSliderT.options.disabled=true;
       break;
       case "miercoles":
       vm.mieSlider.options.disabled=true;
       vm.mieSliderT.options.disabled=true;
       break; 
       case "jueves":
       vm.jueSlider.options.disabled=true;
       vm.jueSliderT.options.disabled=true;
       break;
       case "viernes":
       vm.vieSlider.options.disabled=true;
       vm.vieSliderT.options.disabled=true;
       break;
       break;case "sabado":
       vm.sabSlider.options.disabled=true;
       vm.sabSliderT.options.disabled=true;
       break;
       break;case "domingo":
       vm.domSlider.options.disabled=true;
       vm.domSliderT.options.disabled=true;
       break;
     }
     $("#manana"+dia).prop('checked',false);
     $("#manana"+dia).prop('disabled', true);
     $("#tarde"+dia).prop('checked',false);
     $("#tarde"+dia).prop('disabled', true);
       // console.log(dia);
     $scope.$broadcast('rzSliderForceRender');
   };

   function lunes(id,inicio,fin){

    //Mañana
    var a= inicio;
    vm.lunSlider = new Slider();
    vm.lunSlider.options.id=id;
    vm.lunSlider.inicio=inicio;
    vm.lunSlider.fin=fin;
    vm.lunSlider.minValue = inicio;
    vm.lunSlider.maxValue = fin;

    if(inicio && inicio !=0){
      $("#mananalunes").trigger( "click" );
    }
    
  }

  function lunesT(id,inicio,fin){

    //Tarde
    vm.lunSliderT = new SliderT();
    vm.lunSliderT.options.id=id;
      vm.lunSliderT.inicio=inicio;
      vm.lunSliderT.fin=fin;
      vm.lunSliderT.minValue = inicio;
      vm.lunSliderT.maxValue = fin;
    
    if(inicio && inicio !=0){
      $("#tardelunes").trigger( "click" );
    }
  }

  function martes(id,inicio,fin){
   // console.log(inicio+" "+fin);
    //Mañana
    vm.marSlider = new Slider();
    vm.marSlider.options.id=id;
    vm.marSlider.inicio=inicio;
    vm.marSlider.fin=fin;
    vm.marSlider.minValue = inicio;
    vm.marSlider.maxValue = fin;
    if(inicio && inicio !=0){
      $("#mananamartes").trigger( "click" );
    }
    

  }

  function martesT(id,inicio,fin){
    //console.log(inicio+" "+fin);
    //Tarde
    vm.marSliderT = new SliderT();
    vm.marSliderT.options.id=id;
    vm.marSliderT.inicio=inicio;
    vm.marSliderT.fin=fin;
    vm.marSliderT.minValue = inicio;
    vm.marSliderT.maxValue = fin;
    if(inicio && inicio !=0){
      $("#tardemartes").trigger( "click" );
    }
    
  }

  function miercoles(id,inicio,fin){

    //Mañana
    vm.mieSlider = new Slider();
    vm.mieSlider.options.id=id;
    vm.mieSlider.inicio=inicio;
    vm.mieSlider.fin=fin;
    vm.mieSlider.minValue = inicio;
    vm.mieSlider.maxValue = fin;
    if(inicio && inicio !=0){
      $("#mananamiercoles").trigger( "click" );
    }
    

  }

  function miercolesT(id,inicio,fin){

    //Tarde
    vm.mieSliderT = new SliderT();
    vm.mieSliderT.options.id=id;
    vm.mieSliderT.inicio=inicio;
    vm.mieSliderT.fin=fin;
    vm.mieSliderT.minValue = inicio;
    vm.mieSliderT.maxValue = fin;
     if(inicio && inicio !=0){
      $("#tardemiercoles").trigger( "click" );
    }
    

  }

  function jueves(id,inicio,fin){

    //Mañana
    vm.jueSlider = new Slider();
    vm.jueSlider.options.id=id;
    vm.jueSlider.inicio=inicio;
    vm.jueSlider.fin=fin;
    vm.jueSlider.minValue = inicio;
    vm.jueSlider.maxValue = fin;
    if(inicio && inicio !=0){
      $("#mananajueves").trigger( "click" );
    }
    

  }

  function juevesT(id,inicio,fin){

    //Tarde
    vm.jueSliderT = new SliderT();
    vm.jueSliderT.options.id=id;
    vm.jueSliderT.inicio=inicio;
    vm.jueSliderT.fin=fin;
    vm.jueSliderT.minValue = inicio;
    vm.jueSliderT.maxValue = fin;
    if(inicio && inicio !=0){
      $("#tardejueves").trigger( "click" );
    }
    

  }

  function viernes(id,inicio,fin){

    //MAñana
    vm.vieSlider = new Slider();
    vm.vieSlider.options.id=id;
    vm.vieSlider.inicio=inicio;
    vm.vieSlider.fin=fin;
    vm.vieSlider.minValue = inicio;
    vm.vieSlider.maxValue = fin;
    if(inicio && inicio !=0){
      $("#mananaviernes").trigger( "click" );
    }
    

  }

  function viernesT(id,inicio,fin){

    //Tarde
    vm.vieSliderT = new SliderT();
    vm.vieSliderT.options.id=id;
    vm.vieSliderT.inicio=inicio;
    vm.vieSliderT.fin=fin;
    vm.vieSliderT.minValue = inicio;
    vm.vieSliderT.maxValue = fin;
    if(inicio && inicio !=0){
      $("#tardeviernes").trigger( "click" );
    }
    

  }

  function sabado(id,inicio,fin){

    //Mañana
    vm.sabSlider = new Slider();
    vm.sabSlider.options.id=id;
    vm.sabSlider.inicio=inicio;
    vm.sabSlider.fin=fin;
    vm.sabSlider.minValue = inicio;
    vm.sabSlider.maxValue = fin;
    if(inicio && inicio !=0){
      $("#mananasabado").trigger( "click" );
    }
    


 }

  function sabadoT(id,inicio,fin){

    //Tarde
    vm.sabSliderT = new SliderT();
    vm.sabSliderT.options.id=id;
    vm.sabSliderT.inicio=inicio;
    vm.sabSliderT.fin=fin;
    vm.sabSliderT.minValue = inicio;
    vm.sabSliderT.maxValue = fin;
    if(inicio && inicio !=0){
      $("#tardesabado").trigger( "click" );
    }
    

 }

 function domingo(id,inicio,fin){

    //Mañana
    vm.domSlider = new Slider();
    vm.domSlider.options.id=id;
    vm.domSlider.inicio=inicio;
    vm.domSlider.fin=fin;
    vm.domSlider.minValue = inicio;
    vm.domSlider.maxValue = fin;
    if(inicio && inicio !=0){
      $("#mananadomingo").trigger( "click" );
    }
    
 }

 function domingoT(id,inicio,fin){

    //Tarde
    vm.domSliderT = new SliderT();
    vm.domSliderT.options.id=id;
    vm.domSliderT.inicio=inicio;
    vm.domSliderT.fin=fin;
    vm.domSliderT.minValue = inicio;
    vm.domSliderT.maxValue = fin;
    if(inicio && inicio !=0){
      $("#tardedomingo").trigger( "click" );
    }
    

 }

 $scope.editar = function(){
  try{
    HORARIO_TRABAJO.forEach(function(currentValue, index, arr){

      console.log(currentValue);
      switch(parseInt(currentValue.dow["0"])){
        case 1:

          start = parseInt(currentValue.start.substr(0,2));

          if(!$("#lunes").attr('checked')){
            $("#lunes").trigger( "click" );
             $("#tardelunes").trigger( "click" );
            $("#mananalunes").trigger( "click" );
          }

        
          if(start > 12){
            lunesT(1,currentValue.start,currentValue.end);
          }else{            
            lunes(1,currentValue.start,currentValue.end);
          }

        break;

        case 2:

          start = parseInt(currentValue.start.substr(0,2));

          if(!$("#martes").attr('checked')){
            $("#martes").trigger( "click" );
            $("#tardemartes").trigger( "click" );
            $("#mananamartes").trigger( "click" );
          }                   
          
          if(start > 12){
            martesT(2,currentValue.start,currentValue.end);
          }else{
            martes(2,currentValue.start,currentValue.end);
          }        

        break;

        case 3:

          start = parseInt(currentValue.start.substr(0,2));

          if(!$("#miercoles").attr('checked')){
            $("#miercoles").trigger( "click" );
            $("#tardemiercoles").trigger( "click" );
            $("#mananamiercoles").trigger( "click" );
          }                   
          
          if(start > 12){
            miercolesT(3,currentValue.start,currentValue.end);
          }else{
            miercoles(3,currentValue.start,currentValue.end);
          }        
        
        break;
        case 4:

          start = parseInt(currentValue.start.substr(0,2));

          if(!$("#jueves").attr('checked')){
            $("#jueves").trigger( "click" );
            $("#tardejueves").trigger( "click" );
            $("#mananajueves").trigger( "click" );
          }                   
          
          if(start > 12){
            juevesT(4,currentValue.start,currentValue.end);
          }else{  
            jueves(4,currentValue.start,currentValue.end);
          }   
        
        break;
        case 5:

          start = parseInt(currentValue.start.substr(0,2));

          if(!$("#viernes").attr('checked')){
             $("#viernes").trigger( "click" );
             $("#tardeviernes").trigger( "click" );
             $("#mananaviernes").trigger( "click" );
          }                   
          
          if(start > 12){
            viernesT(5,currentValue.start,currentValue.end);
          }else{
            viernes(5,currentValue.start,currentValue.end);
          }
        
        break;
        case 6:        

          start = parseInt(currentValue.start.substr(0,2));

          if(!$("#sabado").attr('checked')){
             $("#sabado").trigger( "click" );
             $("#tardesabado").trigger( "click" );
             $("#mananasabado").trigger( "click" );
          }                   
          
          if(start > 12){
            sabadoT(6,currentValue.start,currentValue.end);
          }else{
            sabado(6,currentValue.start,currentValue.end);
          }
        
        break;
        case 0:
          start = parseInt(currentValue.start.substr(0,2));

          if(!$("#domingo").attr('checked')){
            $("#domingo").trigger( "click" );
            $("#tardedomingo").trigger( "click" );
            $("#mananadomingo").trigger( "click" );
          }                   
          
          if(start > 12){
            domingoT(7,currentValue.start,currentValue.end);
          }else{
            domingo(7,currentValue.start,currentValue.end);
          }
        
        break;
      }
    });
  }catch(err){
    console.log(err)
  }
};
/*if(typeof HORARIO_TRABAJO == 'undefined' || HORARIO_TRABAJO == false){
  lunes(1,'07:00','20:00');
  martes(2,'07:00','20:00');
  miercoles(3,'07:00','20:00');
  jueves(4,'07:00','20:00');
  viernes(5,'07:00','20:00');
  sabado(6,'07:00','20:00');
  domingo(7,'07:00','20:00');
}else{
  $scope.editar();
}*/
lunes(1,'07:00','12:00');
martes(2,'07:00','12:00');
miercoles(3,'07:00','12:00');
jueves(4,'07:00','12:00');
viernes(5,'07:00','12:00');
sabado(6,'07:00','12:00');
domingo(0,'07:00','12:00');

lunesT(1,'13:00','20:00');
martesT(2,'13:00','20:00');
miercolesT(3,'13:00','20:00');
juevesT(4,'13:00','20:00');
viernesT(5,'13:00','20:00');
sabadoT(6,'13:00','20:00');
domingoT(0,'13:00','20:00');
$scope.editar();
});// fin controller