@extends("crudbooster::admin_template")
@section("content")
    <style type="text/css">
        .panel-group{
            max-height: auto;
        }
        #fecha { z-index : 900; }
        .has-error .select2-selection {
            border: 1px solid #a94442;
            border-radius: 4px;
        }
        #message{
          color:#fff;
          background-color: #d73925;
        }
        
        legend.scheduler-border {
    width:inherit; /* Or auto */
    padding:0 10px; /* To give a bit of padding on the left and right */
    border-bottom:none;
}
       .modal {
           position: fixed;
           z-index: 999;
           height: 100%;
           width: 100%;
           top: 0;
           left: 0;
           background-color: Black;
           filter: alpha(opacity=40);
           opacity: 0.4;
           -moz-opacity: 0.8;
       }
          .center {
           z-index: 1000;
           margin-top: 200px;
           width: 130px;
           height: 130px;
           background-color: White;
           border-radius: 10px;
           filter: alpha(opacity=100);
           opacity: 1;
           -moz-opacity: 1;
       }
       .center img {
           z-index: 1001;
           height: 64px;
           width: 64px;
           margin-top: 33px;
       }
       #accordion{
         padding-left: 0px;
       }
       td label{
         font-size: 12px;

       }
        td{
          padding-left:6px;
          padding-bottom: 3px;
       }


       .panel-collapse{
         padding-left: 3px;
       }
       </style>


     
<div class = "box" >
  <div class = "box-body">
    <form id="form_historias" method="POST" action="" name="form_historias" >
      {{ csrf_field() }}
      <table id="tbl_historias" id="tbl_historias" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
          <tr role="row">
            <!--th >
              <input type="checkbox" id="checkAll">
            </th-->
            @if(Session::get('admin_privileges') == 9)
              <th >  Sucursal </th>
            @endif
            <th >  Cédula </th>
            <th >  Nombre y Apellido </th>
            <th >  Sexo </th>
            <th >  Edad </th>
            <th >  Acción </th>
            <!--th >  Fecha de Creación </th-->
          </tr>
        </thead>    
        <tfoot>
          <tr role="row">
           @if(Session::get('admin_privileges') == 9)
              <th >  Sucursal </th>
            @endif
            <th > Cédula </th>
            <th > Nombre y Apellido </th>
            <th > Sexo </th>
            <th > Edad </th>
            <th > Acción </th>
            <!--th > Fecha de Creación </th-->
          </tr>
        </tfoot>               
        <tbody>
           @foreach($pacientes as $paciente) 
            <tr role="row" class="odd">
             @if(Session::get('admin_privileges') == 9)
              <td>{{$paciente->empresa}}</td>
             @endif
              <!--td><input type="checkbox" class="checkbox checkecs" name="pacientes[]" value="{{$paciente->id}}"></td-->
              <td>{{$paciente->cedula}}</td>
              <td>{{$paciente->nombre}}</td>
              <td>{{$paciente->sexo}}</td>
              <td>{{$paciente->edad}}</td>
              <td>
                <div class="button_action" style="text-align:center">
                  <a class="btn btn-xs btn-primary" title="Ver Historia" href="{{ route('getHistoria',$paciente->id)}}">
                    <i class="fa fa-eye"></i>
                  </a>             
                </div>
              </td>                
              <!--td>{{$paciente->creado}}</td-->                                                    
            </tr>  
            @endforeach          
        </tbody>
      </table>
    </form>         
  </div>
</div>
<script type="text/javascript">

$(document).ready(function() {
                   
         
  var idioma_espanol ={
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
  }

  $('#tbl_historias').DataTable({
      "language": idioma_espanol
    });

 } );          
</script>
@endsection