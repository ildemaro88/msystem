<!DOCTYPE html>
<html>
<head>
    <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="shortcut icon" href="{{ CRUDBooster::getSetting('favicon')?asset(CRUDBooster::getSetting('favicon')):asset('vendor/crudbooster/assets/logo_crudbooster.png') }}">

    <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <style>
      @page { margin-top: 170px;margin-bottom: 170px; margin-right:20px;}
      #header { position: fixed; left: 0px; top: -180px; right: 0px; height: 150px;text-align: left; padding-top: 20px;}
      #footer { position: fixed; left: 0px; border-top: 1px solid; padding-top: 10px;bottom: -160px; right: 0px; height: 90px;  }
      .div_content{
        width: 484px;
        height: 200px;
        background-color: #F5F5F5;
        padding: 5px;
        word-wrap: break-word;
      }
      #footer .page:after { content: counter(page, upper-roman); }
      #page_break{page-break-before: always;}
      #content{height:auto;width: 100%; overflow: hidden;}
      #pr{ width:auto; height: 80px; }
      #pr #izq{ float:left; width:50%; }
      #pr #der{ float:left; padding-left: 50px; height: 60px; width: 45%; }
      table{margin-top: 50px; margin-bottom: 0px !important;padding-bottom: 0px !important;}
      .table2{margin-top: -15px; padding-top: 15px;}
      .paciente #izq{float:left; width:70%; top: 0px;width: 50%;}
      .paciente #der{float:left; padding-left: 30px; height: 70px; width: 50%; }
      .doctor #izq{float:left; width:60%; text-align: center;padding-top: 10px;}
      .doctor #der{float:left; padding-left: 5px; height: 80px; width: 40%; }
      .paciente{ width:auto; height: 70px; margin-top: 5px; margin-bottom: 5px;padding-bottom: 5px;font-size: 12px; }
      .doctor{ width:auto; height: 100px; font-size: 12px;}
      .categoria{ font-size: 11px;}
      td p{   font-size: 11px; }
      td{ padding-top: 5px !important;}
    </style>

    <title>{{$receta->paciente}}</title>
</head>
<body>


  <div id="header ">
    <div id="pr">
      <div id="izq" >
        <img  height="80px" width="250px" src="img/optamed.jpg" alt="">

      </div>

      <div id="der" >

        <h4 style="display: inline;">RECETA</h4>
        <h4 style="display: inline;">{{$examenes[0]->nro_orden}}</h4><br>
        <h5 style="display: inline;">Fecha: {{$receta->fecha}} </h5>
      </div>

    </div>
    <hr>
    <div class="paciente">
      <div id="izq" >
        <p>Nombre: <b>{{$receta->paciente}}</b></p>
  		  <p>Dirección: <b>{{$optometria->direccion}}</b></p>
  		  <!--p>Empresa: <b>Almagro C.A.</b></p-->
      </div>

      <div id="der" >

        <p>Edad: <b>{{$receta->edad}}</b></p>
        <p>Teléfono: <b>{{$receta->telefono}} @if($receta->telefono_d)
                                                /{{$receta->telefono_d}}
                                              @endif
                                              @if($receta->telefono_r)
                                               /{{$receta->telefono_r}}
                                              @endif
                                              @if($receta->telefono_t) 
                                                /{{$receta->telefono_t}}
                                              @endif </b></p>
        <!--p>C.I.: <b>{{$examenes[0]->ci}}</b></p-->

      </div>
    </div>
  </div>

  <div id="footer">
    <div class="doctor">
      <div id="izq" >
        <p>FIRMA:..........................................................................<br>
  		   {{$receta->medico}}.<br>
         Teléfono: {{$receta->telefonom}}.
         </p>
      </div>

      <div id="der" >

        <p>Dirección: Av.República E3-33 entre Rumipamba y Azuay.<br>
         Teléfono: 0991376791.<br>
        E-mail: info@oftamed.com.ec</p>

      </div>
    </div>

  </div>

    <div id="content">
     
            <!--table id="" class="table table-borderless" >
            
            <tbody>
             
                  <td style="background-color: #fff"  >
                    <div class="categoria "><b>{{$examen->categoria}}</b>:</div>
                    <div style="background-color: #f9f9f9">
                      
                        <p>  {{$examen->lista}}<br>
                    </div>
      						</td>
      					</tr>

             
            </tbody>
          </table-->

      <table width="100%" border="1" class="table table-bordered table-striped  table-condensed ">
          <tbody>  
          <tr align="left">
              <td colspan="20" class="active"><strong>MEDICAMENTOS E INDICACIONES:</strong></td>
            </tr>
            <tr>
              <?php //$receta->descripcion = str_replace("\\n","<br/>",$receta->descripcion);
               //$receta->descripcion = nl2br( $receta->descripcion);
                           // $examen->lista = str_replace(" "," ",$examen->lista);
                      ?>
             <div class="div_content">{!! $receta->descripcion !!}</div>
             
              
            
         </tbody>
          </table>  
          
       

    </div>

</body>
</html>
