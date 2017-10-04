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
      /*@page { margin-top: 170px;margin-bottom: 170px; }
      
      #header { position: fixed; left: 0px; top: -180px; right: 0px; height: 150px;text-align: left; padding-top: 20px;}
      #footer { position: fixed; left: 0px; border-top: 1px solid; padding-top: 10px;bottom: -160px; right: 0px; height: 90px;  }
      #footer .page:after { content: counter(page, upper-roman); }
      #page_break{page-break-before: always;}*/
      #content{position: fixed; left: -30px; top: -35px; right: -30px;height:auto;width: 100%; overflow: hidden;}
      table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    text-transform:uppercase;
}
 td {
    
   font-size: 10px;
   font-family: Arial, Helvetica, Helvetica Neue, Gotham," sans-serif";
}

th {
    padding: 11px;
}
  .title{
    font-weight: bold;
    text-align: center;

  }
  
  .center{
    text-align: center;
  }
 td {
  padding: 3px;
   
    word-wrap: break-word;
}

 table{
   
    table-layout: fixed;
}
img{
  display: block;
}
      /*#pr{ width:auto; height: 80px; }
      #pr #izq{ float:left; width:50%; }
      #pr #der{ float:left; padding-left: 3px; height: 60px; width: 45%; }
     table{margin-top: 50px; margin-bottom: 0px !important;padding-bottom: 0px !important;}
      .table2{margin-top: -15px; padding-top: 15px;}
      td p{   font-size: 11px; }
      td{ padding-top: 5px !important;}
      .paciente #izq{float:left; width:70%; top: 0px;width: 50%;}
      .paciente #der{float:left; padding-left: 30px; height: 70px; width: 50%; }
      .doctor #izq{float:left; width:60%; text-align: center;padding-top: 10px;}
      .doctor #der{float:left; padding-left: 5px; height: 80px; width: 40%; }
      .paciente{ width:auto; height: 70px; margin-top: 5px; margin-bottom: 5px;padding-bottom: 5px;font-size: 12px; }
      .doctor{ width:auto; height: 100px; font-size: 12px;}
      .categoria{ font-size: 11px;}*/
      

  

    </style>

    <title>{{$optometria->paciente}}</title>
</head>
<body>



    <div id="content"  class="table-responsive">     

      <table width="760px">
  <tbody>
  <tr>
    <td scope="col"  class="center" colspan="4"> 
      <img class="img-responsive" src="{{url('/')}}/img/logo.jpg" width="200" height="50" alt=""/>      
    </td>

    <td scope="col"  class="center" colspan="4"> 

      @if($empresa->logo)
        <img class="img-responsive" src="{{$empresa->logo}}" style="max-height:50px" width="200" height="50" alt=""/> 
      @else
        <th scope="col"  class="center" colspan="8"> {{ $empresa->nombre}} </th>
      @endif
    </td>
      
   
    </tr>
    <tr>
    <th scope="col"  class="center" style="background-color: #F0F0F0;" colspan="8"> HISTORIA CL&Iacute;NICA DE OPTOMETR&Iacute;A </th>
      
   
    </tr>
    <tr>
      <td class="title">FECHA:</td>
      <td colspan="3" class="center" >{{$optometria->fecha}}</td>
      <td colspan="2" class="title" >HISTORIA CL&Iacute;NICA N&ordm;:</td>
      <td colspan="2" class="center">{{$optometria->id}}</td>
     
    </tr>
    <tr>
      <td class="title">APELLIDOS: </td>
      <td colspan="3" class="center">{{$optometria->apellidos}}</td>
      <td class="title">NOMBRES:</td>
      <td colspan="3" class="center">{{$optometria->nombres}}</td>
      
    </tr>
    <tr>
      <td class="title">FECHA DE NAC:</td>
      <td class="center">{{$optometria->fecha_nacimiento}}</td>
      <td class="title">EDAD:</td>
      <td class="title">{{$optometria->edad}}</td>
      <td class="title" >G&Eacute;NERO:</td>
      <td class="center">{{$optometria->sexo}}</td>
      <td class="title">C.I:</td>
      <td class="center">{{$optometria->cedula}}</td>
      
    </tr>
    <tr>
      <td class="title">OCUPACI&Oacute;N:</td>
      <td colspan="3" class="center">{{$optometria->cargo}}</td>
      <td class="title">TEL&Eacute;FONO:</td>
      <td colspan="3" class="center">{{$optometria->telefono}}</td>
    </tr>
    <tr>
      <td class="title" colspan="2">&Uacute;LTIMO CONTROL VISUAL:</td>
      <td colspan="2" class="center">{{$optometria->ultimo_control_visual}}</td>
      <td class="title" colspan="2">USA RX:</td>
      <td colspan="2" class="center">{{$optometria->usa_rx}}</td>

    </tr>
    <tr>
      <td class="title">EPRESA</td>
      <td colspan="3" class="center">{{$empresa->nombre}}</td>
      <td class="title">CORREO</td>
      <td colspan="3" class="center">{{$optometria->correo}}</td>
     
    </tr>
    <tr>
     <td scope="col" colspan="8" class="title"> MOTIVO DE CONSULTA </td>
    <tr>
      <td colspan="8">{{$optometria->motivoConsulta}}</td>
  
    </tr>
    <tr>
      <td class="title">ANTECEDENTES PERSONALES</td>
      <td colspan="7">{{$optometria->antecedentes_personales}}</td>
    </tr>
    <tr>
     <td class="title">ANTECEDENTES FAMILIARES</td>
      <td colspan="7">{{$optometria->antecedentes_familiares}}</td>
    </tr>
    <tr>
      <td class="title">ANTECEDENTES EXTERNO</td>
      <td colspan="7">&nbsp;</td>
    </tr>
    <tr>
     
      <td colspan="4" align="center"><img class="img-responsive" src="{{url('/')}}/img/dojo.jpg" width="200" height="50" alt=""/></td>
      <td colspan="4" align="center"><img  class="img-responsive" src="{{url('/')}}/img/iojo.jpg" width="200" height="50" alt=""/></td>
<tr>
      <td class="center" colspan="4">{{$optometria->ojo_derecho}}</td>
      <td class="center" colspan="4">{{$optometria->ojo_izquierdo}}</td>
      
    </tr>
    <tr>
     <td scope= "col" colspan="8" style="background-color: #F0F0F0;" class="title"> AGUDEZA VISUAL </td>
    </tr>
    <tr>
      <td class="title" colspan="2"></td>
      <td class="title" style="background-color: #F0F0F0;">VL SC</td>
     <td class="title" style="background-color: #F0F0F0;">VP SC</td>
     <td class="title" style="background-color: #F0F0F0;">VL CC</td>
     <td class="title" style="background-color: #F0F0F0;">VP CC</td>
      <td class="title" style="background-color: #F0F0F0;"colspan="2">PH</td>
</tr>
    <tr>
       <td class="title" colspan="2">OD</td>
      <td class="center">{{$optometria->txt_od_vl_sc}}</td>
     <td class="center">{{$optometria->txt_od_vp_sc}}</td>
     <td class="center">{{$optometria->txt_od_vl_cc}}</td>
     <td class="center">{{$optometria->txt_od_vp_cc}}</td>
      <td class="center" colspan="2">{{$optometria->txt_od_vp_ph}}</td>
    </tr>
    <tr>
      <td class="title" colspan="2">OI</td>
      <td class="center">{{$optometria->txt_oi_vl_sc}}</td>
     <td class="center">{{$optometria->txt_oi_vp_sc}}</td>
     <td class="center">{{$optometria->txt_oi_vl_cc}}</td>
     <td class="center">{{$optometria->txt_oi_vp_cc}}</td>
      <td class="center" colspan="2">{{$optometria->txt_oi_vp_ph}}</td>
    </tr>
    <tr>
      <td class="title" colspan="2">AO</td>
     <td class="center">{{$optometria->txt_ao_vl_sc}}</td>
     <td class="center">{{$optometria->txt_ao_vp_sc}}</td>
     <td class="center">{{$optometria->txt_ao_vl_cc}}</td>
     <td class="center">{{$optometria->txt_ao_vp_cc}}</td>
      <td class="center" colspan="2">{{$optometria->txt_ao_vp_ph}}</td>
    </tr>
    <tr>
      <td class="title" style="background-color: #F0F0F0;">LENSOMETRIA</td>
      <td class="title" style="background-color: #F0F0F0;">ESFERA</td>
      <td class="title" style="background-color: #F0F0F0;">CILINDRO</td>
      <td class="title" style="background-color: #F0F0F0;">EJE</td>
      <td class="title" style="background-color: #F0F0F0;">AVL</td>
      <td class="title" style="background-color: #F0F0F0;">AVC</td>
      <td>&nbsp;</td>
      <td class="title">DP</td>
    </tr>
    <tr>
      <td class="title">OD</td>
      <td class="center">{{$optometria->txt_lensometria_od_esfera}}</td>
      <td class="center">{{$optometria->txt_lensometria_od_cilindro}}</td>
      <td class="center">{{$optometria->txt_lensometria_od_eje}}</td>
      <td class="center">{{$optometria->txt_lensometria_od_avl}}</td>
      <td class="center">{{$optometria->txt_lensometria_od_avc}}</td>
      <td>&nbsp;</td>
      <td rowspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td class="title">OI</td>
      <td class="center">{{$optometria->txt_lensometria_oi_esfera}}</td>
      <td class="center">{{$optometria->txt_lensometria_oi_cilindro}}</td>
      <td class="center">{{$optometria->txt_lensometria_oi_eje}}</td>
      <td class="center">{{$optometria->txt_lensometria_oi_avl}}</td>
      <td class="center">{{$optometria->txt_lensometria_oi_avc}}</td>
      <td>&nbsp;</td>
</tr>
    <tr>
      <td class="title">ADD</td>
      <td colspan="3">{{$optometria->txt_lensometria}}</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
       <td>&nbsp;</td>
      <td>&nbsp;</td>
      
    </tr>
    <tr>
      <td class="title" style="background-color: #F0F0F0;">RETINOSCOPIA</td>
      <td class="title" style="background-color: #F0F0F0;">ESFERA</td>
      <td class="title" style="background-color: #F0F0F0;">CILINDRO</td>
      <td class="title" style="background-color: #F0F0F0;">EJE</td>
      <td class="title" style="background-color: #F0F0F0;">AVL</td>
      <td class="title" style="background-color: #F0F0F0;">AVC</td>
      <td>&nbsp;</td>
      <td class="title">DP</td>
    </tr>
    <tr>
      <td class="title">OD</td>
      <td class="center">{{$optometria->txt_retinoscopia_od_esfera}}</td>
      <td class="center">{{$optometria->txt_retinoscopia_od_cilindro}}</td>
      <td class="center">{{$optometria->txt_retinoscopia_od_eje}}</td>
      <td class="center">{{$optometria->txt_retinoscopia_od_avl}}</td>
      <td class="center">{{$optometria->txt_retinoscopia_od_avc}}</td>
      <td>&nbsp;</td>
      <td rowspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td class="title">OI</td>
      <td class="center">{{$optometria->txt_retinoscopia_oi_esfera}}</td>
      <td class="center">{{$optometria->txt_retinoscopia_oi_cilindro}}</td>
      <td class="center">{{$optometria->txt_retinoscopia_oi_eje}}</td>
      <td class="center">{{$optometria->txt_retinoscopia_oi_avl}}</td>
      <td class="center">{{$optometria->txt_retinoscopia_oi_avc}}</td>
      <td>&nbsp;</td>
</tr>
    <tr>
      <td class="title" colspan="2">OBSERVACIONES</td>
      <td colspan="4">{{$optometria->txt_retinoscopia}}</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      
</tr>
    <tr>
      <td class="title" style="background-color: #F0F0F0;">SUBJETIVO</td>
      <td class="title" style="background-color: #F0F0F0;">ESFERA</td>
      <td class="title" style="background-color: #F0F0F0;">CILINDRO</td>
      <td class="title" style="background-color: #F0F0F0;">EJE</td>
      <td class="title" style="background-color: #F0F0F0;">AVL</td>
      <td class="title" style="background-color: #F0F0F0;">AVC</td>
      <td>&nbsp;</td>
      <td class="title">DP</td>
    </tr>
    <tr>
      <td class="title">OD</td>
      <td class="center">{{$optometria->txt_subjetivo_od_esfera}}</td>
      <td class="center">{{$optometria->txt_subjetivo_od_cilindro}}</td>
      <td class="center">{{$optometria->txt_subjetivo_od_eje}}</td>
      <td class="center">{{$optometria->txt_subjetivo_od_avl}}</td>
      <td class="center">{{$optometria->txt_subjetivo_od_avc}}</td>
      <td>&nbsp;</td>
      <td rowspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td class="title">OI</td>
      <td class="center">{{$optometria->txt_subjetivo_oi_esfera}}</td>
      <td class="center">{{$optometria->txt_subjetivo_oi_cilindro}}</td>
      <td class="center">{{$optometria->txt_subjetivo_oi_eje}}</td>
      <td class="center">{{$optometria->txt_subjetivo_oi_avl}}</td>
      <td class="center">{{$optometria->txt_subjetivo_oi_avc}}</td>
      <td>&nbsp;</td>
</tr>
    <tr>
      <td class="title">ADD:</td>
      <td colspan="3">{{$optometria->txt_subjetivo}}</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td class="title" style="background-color: #F0F0F0;">RX FINAL</td>
      <td class="title" style="background-color: #F0F0F0;">ESFERA</td>
      <td class="title" style="background-color: #F0F0F0;">CILINDRO</td>
      <td class="title" style="background-color: #F0F0F0;">EJE</td>
      <td class="title" style="background-color: #F0F0F0;">AVL</td>
      <td class="title" style="background-color: #F0F0F0;">AVC</td>
      <td>&nbsp;</td>
      <td class="title">DP</td>
    </tr>
    <tr>
      <td class="title">OD</td>
       <td class="center">{{$optometria->txt_distancia_od_esfera}}</td>
      <td class="center">{{$optometria->txt_distancia_od_cilindro}}</td>
      <td class="center">{{$optometria->txt_distancia_od_eje}}</td>
      <td class="center">{{$optometria->txt_distancia_od_avl}}</td>
      <td class="center">{{$optometria->txt_distancia_od_avc}}</td>
      <td>&nbsp;</td>
      <td rowspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td class="title">OI</td>
      <td class="center">{{$optometria->txt_distancia_oi_esfera}}</td>
      <td class="center">{{$optometria->txt_distancia_oi_cilindro}}</td>
      <td class="center">{{$optometria->txt_distancia_oi_eje}}</td>
      <td class="center">{{$optometria->txt_distancia_oi_avl}}</td>
      <td class="center">{{$optometria->txt_distancia_oi_avc}}</td>
      <td>&nbsp;</td>
</tr>
    <tr>
      <td class="title">ADD:</td>
      <td colspan="3">{{$optometria->txt_distancia}}</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="8" class="title">DIGNOSTICO</td>
      
    </tr>
    <tr>
      <td colspan="8">{{$optometria->diagnostico}}</td>
    </tr>
    <tr>
      <td colspan="8" class="title">TRATAMIENTO / DISPOSICION FINAL</td>
    </tr>
    <tr>
      <td colspan="8">{{$optometria->disposiciones}}</td>
    </tr>
    <tr>
      <td colspan="3" class="title">NOMBRE DEL EXAMINADOR</td>
      <td colspan="3" class="title">{{$optometria->medico}}</td>
      <td colspan="2">&nbsp;</td>
</tr>
  </tbody>
</table>       

    </div>

</body>
</html>
