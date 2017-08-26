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

<p><a title="Volver" id = "volver" href="{{ route('indexHistoria')}}"><i class="fa fa-chevron-circle-left"></i>&nbsp; Volver a la Lista de Historias</a><div id="message">
    </div></p>
     
<div class = "box" >
  <div class = "box-body">
    <form id="form_historias" method="POST" action="" name="form_historias" >
      {{ csrf_field() }}
      <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
          <?php $order = "active"; ?>
            @if(!empty($ordenes[0]))
              <?php $order = ""; $orden = "in active"; ?>
              <li class="ordenes active"><a data-toggle="tab" href="#ordenes">EXAMENES</a></li>
            @endif
             @if(!empty($consultas))
              
              <li class="consultas {{$order}} "><a data-toggle="tab" href="#consultas">CONSULTAS</a></li>
              @if($order == 'active')
                <?php $consulta = "in active";  $order = ""; ?>
              @endif
            @endif
            @if(!empty($consultas[0]->recetas))
              
              <li class="recetas {{$order}} "><a data-toggle="tab" href="#recetas">RECETAS</a></li>
              @if($order == 'active')
                <?php $receta = "in active";  $order = ""; ?>
              @endif
            @endif
            
          </ul>
        </div>
        <div class="tab-content">
          <div id="ordenes" class="tab-pane fade {{ $orden or ''}}">
          <div class="panel-group col-md-12 {{$tipo->id}}" id="accordion_gabinete">
            @foreach($tipoOrden as $tipo)
              
              
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a class="opcion" data-parent="#accordion" data-toggle="collapse" href="#{{$tipo->id}}">

                        {{$tipo->descripcion}}</a>
                    </h4>
                  </div>
                 
                  <div id="{{$tipo->id}}" class="panel-collapse collapse in " style="overflow-x:auto;">
                    <table>
                      <tbody>
                      <?php $count = count($ordenes); ?>
                      <tr>
                         @foreach($ordenes as $orden)
                         
                          @if($orden->id_tipo_orden == $tipo->id)

                            
                              <td style="border: 1px solid #ddd;padding: 15px;" >
                                <a id='resultado_{{$orden->id}}' target="_blank" onclick='openPDF("{{$orden->id}}")'  class="btn btn-default">{{$orden->tipo}}<br/> Fecha: {{$orden->fecha}}</a>
                                @foreach($resultados as $resultado)
                                  @if($resultado->id_orden == $orden->id)
                                    <a id='{{$resultado->id}}' target="_blank" href="{{route('openPDF',$resultado->id)}}"  ></a>
                                   @endif
                                @endforeach  
                              </td>  
                               

                               
                          @endif 
                         
                        @endforeach    
                         </tr>                
                      </tbody>
                    </table>
                  </div>     
                         
                </div>
                
              
              @endforeach 
              </div>
             
          </div>
          <div id="consultas" class="tab-pane fade {{ $consulta or ''}}">
              chao
          </div>
          <div id="recetas" class="tab-pane fade {{ $receta or ''}}">
              receta
          </div>
        </div>
          
          <!--Inicio pestaña Gabinete-->
          <div id="gabinete" class="tab-pane fade">
            <div class="panel-group col-md-5 gabinete" id="accordion_gabinete">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a class="opcion" data-parent="#accordion" data-toggle="collapse" href="#examenes">
                      EXÁMENES</a>
                  </h4>
                </div>
                <div id="examenes" class="panel-collapse collapse in">
                  <table>
                    <tbody>
                      <tr>
                        <td>
                          <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="audiometria" ng-checked="audiometria" name="examenes[312]">Audiometría</label>
                        </td>
                        <td>
                          <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="espirometria" ng-checked="espirometria" name="examenes[313]">Espirometría</label>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="optometria" ng-checked="optometria" name="examenes[314]">Optometría</label>
                        </td>
                        <td>
                          <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="ekg" ng-checked="ekg" name="examenes[315]">EKG</label>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="prueba_esfuerzo" ng-checked="prueba_esfuerzo" name="examenes[316]">Prueba de Esfuerzo</label>
                        </td>
                        <td>
                          <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="oftalmologia" ng-checked="oftalmologia" name="examenes[317]">Oftalmología</label>
                        </td>
                      </tr>    
                      <tr>
                        <td>
                          <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="prueba_isometrica" ng-checked="prueba_isometrica" name="examenes[318]">Prueba Isométrica</label>
                        </td>
                        
                      </tr>                       
                    </tbody>
                  </table>
                </div>                
              </div>            
            </div>
          </div>
          <!--Fin pestaña Gabinete-->    
        </div>
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

 function openPDF(id){
    var resultados = {!! json_encode($resultados->toArray()) !!}; 


   resultados.forEach(function(element) {
      if(element.id_orden == id){
         document.getElementById(element.id).click();
      }    
    });
     
 } 
</script>
@endsection