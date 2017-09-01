var mensaje="4";
 $.validator.addMethod("cedula", function(value, element) { 
        return this.optional(element) || validarCedula(value); 
  },mensaje);
  function validarCedula(cedulaPaciente){
  
  /**
     * Algoritmo para validar cedulas de Ecuador
     * @Author : Victor Diaz De La Gasca.
     * @Fecha  : Quito, 15 de Marzo del 2013 
     * @Email  : vicmandlagasca@gmail.com
     * @Pasos  del algoritmo
     * 1.- Se debe validar que tenga 10 numeros
     * 2.- Se extrae los dos primero digitos de la izquierda y compruebo que existan las regiones
     * 3.- Extraigo el ultimo digito de la cedula
     * 4.- Extraigo Todos los pares y los sumo
     * 5.- Extraigo Los impares los multiplico x 2 si el numero resultante es mayor a 9 le restamos 9 al resultante
     * 6.- Extraigo el primer Digito de la suma (sumaPares + sumaImpares)
     * 7.- Conseguimos la decena inmediata del digito extraido del paso 6 (digito + 1) * 10
     * 8.- restamos la decena inmediata - suma / si la suma nos resulta 10, el decimo digito es cero
     * 9.- Paso 9 Comparamos el digito resultante con el ultimo digito de la cedula si son iguales todo OK sino existe error.     
     */

     var cedula = cedulaPaciente;

     //Preguntamos si la cedula consta de 10 digitos
     if(cedula.length == 10){
        
        //Obtenemos el digito de la region que sonlos dos primeros digitos
        var digito_region = cedula.substring(0,2);
        
        //Pregunto si la region existe ecuador se divide en 24 regiones
        if( digito_region >= 1 && digito_region <=24 ){
          
          // Extraigo el ultimo digito
          var ultimo_digito   = cedula.substring(9,10);

          //Agrupo todos los pares y los sumo
          var pares = parseInt(cedula.substring(1,2)) + parseInt(cedula.substring(3,4)) + parseInt(cedula.substring(5,6)) + parseInt(cedula.substring(7,8));

          //Agrupo los impares, los multiplico por un factor de 2, si la resultante es > que 9 le restamos el 9 a la resultante
          var numero1 = cedula.substring(0,1);
          var numero1 = (numero1 * 2);
          if( numero1 > 9 ){ var numero1 = (numero1 - 9); }

          var numero3 = cedula.substring(2,3);
          var numero3 = (numero3 * 2);
          if( numero3 > 9 ){ var numero3 = (numero3 - 9); }

          var numero5 = cedula.substring(4,5);
          var numero5 = (numero5 * 2);
          if( numero5 > 9 ){ var numero5 = (numero5 - 9); }

          var numero7 = cedula.substring(6,7);
          var numero7 = (numero7 * 2);
          if( numero7 > 9 ){ var numero7 = (numero7 - 9); }

          var numero9 = cedula.substring(8,9);
          var numero9 = (numero9 * 2);
          if( numero9 > 9 ){ var numero9 = (numero9 - 9); }

          var impares = numero1 + numero3 + numero5 + numero7 + numero9;

          //Suma total
          var suma_total = (pares + impares);

          //extraemos el primero digito
          var primer_digito_suma = String(suma_total).substring(0,1);

          //Obtenemos la decena inmediata
          var decena = (parseInt(primer_digito_suma) + 1)  * 10;

          //Obtenemos la resta de la decena inmediata - la suma_total esto nos da el digito validador
          var digito_validador = decena - suma_total;

          //Si el digito validador es = a 10 toma el valor de 0
          if(digito_validador == 10)
            var digito_validador = 0;

          //Validamos que el digito validador sea igual al de la cedula
          if(digito_validador == ultimo_digito){
            mensaje='la cedula:' + cedula + ' es correcta';
         //   console.log('la cedula:' + cedula + ' es correcta');
          //  console.log('Esta cedula no pertenece a ninguna region');
           $.validator.addMethod("cedula", function(value, element) { 
                return this.optional(element) || validarCedula(value); 
          },mensaje);
            return true;
          }else{
            mensaje='la cedula:' + cedula + ' es incorrecta';
       //     console.log('la cedula:' + cedula + ' es incorrecta');
         //   console.log('Esta cedula no pertenece a ninguna region');
           $.validator.addMethod("cedula", function(value, element) { 
                  return this.optional(element) || validarCedula(value); 
            },mensaje);
            return false;
          }
          
        }else{
          // imprimimos en consola si la region no pertenece
         mensaje= 'Esta cedula no pertenece a ninguna region';
         // console.log('Esta cedula no pertenece a ninguna region');
           $.validator.addMethod("cedula", function(value, element) { 
              return this.optional(element) || validarCedula(value); 
        },mensaje);
        }
     }else{
      mensaje= 'Esta cedula tiene menos de 10 Digitos';
       $.validator.addMethod("cedula", function(value, element) { 
            return this.optional(element) || validarCedula(value); 
      },mensaje);
        //imprimimos en consola si la cedula tiene mas o menos de 10 digitos
       // console.log('Esta cedula tiene menos de 10 Digitos'.mensaje);
     }    
  
}

console.log(mensaje);
 