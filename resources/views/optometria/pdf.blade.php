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

      <table width="760px">
  <tbody>
    <tr>
    <th scope="col"  class="center" colspan="8"> HISTORIA CL&Iacute;NICA DE OPTOMETR&Iacute;A </th>
      
   
    </tr>
    <tr>
      <td class="title">FECHA:</td>
      <td colspan="3" class="center" >31-ago-17</td>
      <td colspan="2" class="title" >HISTORIA CL&Iacute;NICA N&ordm;:</td>
      <td colspan="2" class="center">001</td>
     
    </tr>
    <tr>
      <td class="title">APELLIDOS: </td>
      <td colspan="3" class="center">{{$optometria->apellidos}}</td>
      <td class="title">NOMBRES:</td>
      <td colspan="3" class="center">{{$optometria->nombres}}</td>
      
    </tr>
    <tr>
      <td class="title">FECHA DE NAC:</td>
      <td class="center">01/01/01</td>
      <td class="title">EDAD:</td>
      <td class="title">10</td>
      <td class="title" >G&Eacute;NERO:</td>
      <td class="center">FDFFEFEFE</td>
      <td class="title">C.I:</td>
      <td class="center">12346678990</td>
      
    </tr>
    <tr>
      <td class="title">OCUPACI&Oacute;N:</td>
      <td colspan="3" class="center"></td>
      <td class="title">TEL&Eacute;FONO:</td>
      <td colspan="3" class="center"></td>
    </tr>
    <tr>
      <td class="title" colspan="2">&Uacute;LTIMO CONTROL VISUAL:</td>
      <td colspan="2" class="center">12/12/12</td>
      <td class="title" colspan="2">USA RX:</td>
      <td colspan="2" class="center"></td>

    </tr>
    <tr>
      <td class="title">EPRESA</td>
      <td colspan="3" class="center"></td>
      <td class="title">CORREO</td>
      <td colspan="3" class="center"></td>
     
    </tr>
    <tr>
     <td scope="col" colspan="8" class="title"> MOTIVO DE CONSULTA </td>
    <tr>
      <td colspan="8">CONTROL OCUPACIONAL</td>
  
    </tr>
    <tr>
      <td class="title">ANTECEDENTES PERSONALES</td>
      <td colspan="7">&nbsp;</td>
    </tr>
    <tr>
     <td class="title">ANTECEDENTES FAMILIARES</td>
      <td colspan="7">&nbsp;</td>
    </tr>
    <tr>
      <td class="title">ANTECEDENTES EXTERNO</td>
      <td colspan="7">&nbsp;</td>
    </tr>
    <tr>
     
      <td colspan="4"><img class="img-responsive" src="{{url('/')}}/img/dojo.jpg" width="320" height="120" alt=""/></td>
      <td colspan="4"><img class="img-responsive" src="{{url('/')}}/img/iojo.jpg" width="320" height="120" alt=""/></td>
<tr>
      <td class="center" colspan="4">NORMAL</td>
      <td class="center" colspan="4">NORMAL</td>
      
    </tr>
    <tr>
     <td scope= "col" colspan="8" class="title"> AGUDEZA VISUAL </td>
    </tr>
    <tr>
      <td class="title" colspan="2"></td>
      <td class="title">VL SC</td>
     <td class="title">VP SC</td>
     <td class="title">VL CC</td>
     <td class="title">VP CC</td>
      <td class="title" colspan="2">PH</td>
</tr>
    <tr>
       <td class="title" colspan="2">OD</td>
      <td class="center">20/20</td>
     <td class="center">20/20</td>
     <td class="title"></td>
     <td class="title"></td>
      <td class="title" colspan="2"></td>
    </tr>
    <tr>
      <td class="title" colspan="2">OI</td>
      <td class="center">20/20</td>
     <td class="center">20/20</td>
     <td class="title"></td>
     <td class="title"></td>
      <td class="title" colspan="2"></td>
    </tr>
    <tr>
      <td class="title" colspan="2">AO</td>
      <td class="center"></td>
     <td class="center"></td>
     <td class="title"></td>
     <td class="title"></td>
      <td class="title" colspan="2"></td>
    </tr>
    <tr>
      <td class="title">LENSOMETRIA</td>
      <td class="title">ESFERA</td>
      <td class="title">CILINDRO</td>
      <td class="title">EJE</td>
      <td class="title">AVL</td>
      <td class="title">AVC</td>
      <td>&nbsp;</td>
      <td class="title">DP</td>
    </tr>
    <tr>
      <td class="title">OD</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td rowspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td class="title">OI</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
</tr>
    <tr>
      <td class="title">ADD</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td class="title">RETINOSCOPIA</td>
      <td class="title">ESFERA</td>
      <td class="title">CILINDRO</td>
      <td class="title">EJE</td>
      <td class="title">AVL</td>
      <td class="title">AVC</td>
      <td>&nbsp;</td>
      <td class="title">DP</td>
    </tr>
    <tr>
      <td class="title">OD</td>
      <td class="center">N</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td rowspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td class="title">OI</td>
      <td class="center">N</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
</tr>
    <tr>
      <td class="title" colspan="2">OBSERVACIONES</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
</tr>
    <tr>
      <td class="title">SUBJETIVO</td>
      <td class="title">ESFERA</td>
      <td class="title">CILINDRO</td>
      <td class="title">EJE</td>
      <td class="title">AVL</td>
      <td class="title">AVC</td>
      <td>&nbsp;</td>
      <td class="title">DP</td>
    </tr>
    <tr>
      <td class="title">OD</td>
      <td class="center">N</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td rowspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td class="title">OI</td>
      <td class="center">N</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
</tr>
    <tr>
      <td class="title">ADD:</td>
      <td colspan="3">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td class="title">RX FINAL</td>
      <td class="title">ESFERA</td>
      <td class="title">CILINDRO</td>
      <td class="title">EJE</td>
      <td class="title">AVL</td>
      <td class="title">AVC</td>
      <td>&nbsp;</td>
      <td class="title">DP</td>
    </tr>
    <tr>
      <td class="title">OD</td>
      <td class="center">N</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td rowspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td class="title">OI</td>
      <td class="center">N</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
</tr>
    <tr>
      <td class="title">ADD:</td>
      <td colspan="3">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="8" class="title">DIGNOSTICO</td>
      
    </tr>
    <tr>
      <td colspan="8">EMETROPE</td>
    </tr>
    <tr>
      <td colspan="8" class="title">TRATAMIENTO / DISPOSICION FINAL</td>
    </tr>
    <tr>
      <td colspan="8">CONTROL ANUAL Y USO DE GAFAS DE PROTECCI&Oacute;N USO DE LAGRIMAS ARTIFICIALES</td>
    </tr>
    <tr>
      <td colspan="3" class="title">NOMBRE DEL EXAMINADOR</td>
      <td colspan="3">&nbsp;</td>
      <td colspan="2">&nbsp;</td>
</tr>
  </tbody>
</table>       

    </div>

</body>
</html>
