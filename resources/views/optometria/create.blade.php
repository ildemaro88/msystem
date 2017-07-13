@extends("crudbooster::admin_template")
@section("content")
<style media="screen">
  .modal_l {
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
  .imprimir{
  	background-color: #3c8dbc !important;
  }
	
  .texto{
  	height: 34px;
  }
  .span10{
  	width: 450px;
  }
  .menos{
  	margin-left: 10px;
  	visibility: hidden;
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

</style>
<p><a title="Volver" id = "volver" href=""><i class="fa fa-chevron-circle-left"></i>&nbsp; Volver a la Lista de Optometrías</a><div id="message">
</div></p>

<div class = "box" ng-app="MyApp" ng-controller="controllerOptometria">
	<div class = "box-body">
		<form id="form_optometria" method="POST" action="" name="form_optometria" >
			{{ csrf_field() }}
			<table width="100%" border="1" class="table table-bordered table-striped table-hover table-condensed ">
			  	<tbody>
				  	<tr>
					    <td colspan="20" scope="col" class="active">
					    	<center>
					        	<strong></strong>
					      	</center>
					    </td>
				  	</tr>
				  	<tr align="center">
					    <td colspan="4" class="active"><label for="id_paciente" class="control-label">Paciente</label></td>
					    <td colspan="4" class="active"><label for="id_medico" class="control-label">Médico</label></td>
					    <td colspan="3" class="active"><strong>EDAD</strong></td>
					    <td colspan="3" class="active"><strong>SEXO</strong></td>
					    <td colspan="3" class="active"><strong>No. HOJA</strong></td>
					    <td colspan="3" class="active"><strong>HCL</strong></td>
				  	</tr>
				  	<tr>
					    <td colspan="4">
						    <label for="id_paciente" style="margin-left: 45px" class="control-label">{{$paciente->nombre}}</label>
						    <input type="hidden" class="form-control" value="{{$paciente->id}}" id="id_paciente" placeholder="Select a state" ng-model="id_paciente" name="id_paciente" ng-checked="id_paciente">          
			        	</td>
					    <td colspan="4">
					    	<label for="id_medico" style="margin-left: 45px" class="control-label"></label>{{$medico->nombre." ".$medico->apellido}}
					     <input type="hidden" class="form-control"  id="id_medico"   ng-model="id_medico" name="id_medico">	        
			        	</td>
					    <td colspan="3">
							<label for="" style="margin-left: 45px" class="control-label">{{$paciente->edad}}</label>			    
					    </td>
					    <td colspan="3">
					    	<label for="" style="margin-left: 45px" class="control-label">{{$paciente->sexo}}</label>			   
					    </td>
					    <td colspan="3">
					    	<label for="" style="margin-left: 45px" class="control-label">1</label>
					    </td>
					    <td colspan="3">
					    	<label for="" style="margin-left: 45px" class="control-label">{{$paciente->cedula}}</label>			    	
					    </td>
				  	</tr>
					<tr>
					    <td colspan="20" class="active"><strong>1. MOTIVO DE LA CONSULTA</strong></td>
					</tr>
				  	<tr>
				    	
				    	<td colspan="20"><textarea type="text" style="border-width:0px; width:95%" value="" id="motivoConsulta" ng-model="motivoConsulta" name="motivoConsulta"></textarea></td>
					    
				  	</tr><tr>
				    	<td colspan="20" class="active"><strong>2. ANTECEDENTES PERSONALES</strong></td>
				  	</tr>
				  	<tr style="font-size:10px; ">
					    <td colspan="4" class="active">1. VACUNAS <br>
					      <input type="checkbox" id="cb_vacunas" ng-checked="cb_vacunas" name="cb_vacunas"></td>
					    <td colspan="3" class="active">5. ENF ALÉRGICA <br>
					      <input type="checkbox" id="cb_alergica" ng-checked="cb_alergica" name="cb_alergica"></td>
					    <td colspan="3" class="active">9. ENF NEUROLÓGICA <br>
					      <input type="checkbox" id="cb_neurologica" ng-checked="cb_neurologica" name="cb_neurologica"></td>
					    <td colspan="3" class="active">13. ENF TRAUMATOLÓGICA <br>
					      <input type="checkbox" id="cb_traumatologica" ng-checked="cb_traumatologica" name="cb_traumatologica"></td>
					    <td colspan="3" class="active">17. TENDENCIA SEXUAL <br>
					      <input type="checkbox" id="cb_tendsexual" ng-checked="cb_tendsexual" name="cb_tendsexual"></td>
					    <td colspan="4" class="active">21. ACTIVIDAD SEXUAL <br>
					      <input type="checkbox" id="cb_actsexual" ng-checked="cb_actsexual" name="cb_actsexual"></td>
				 	</tr>
				  	<tr style="font-size:10px; ">
					    <td colspan="4" class="active">2. ENF PERINATAL <br>
					      <input type="checkbox" id="cb_perinatal" ng-checked="cb_perinatal" name="cb_perinatal"></td>
					    <td colspan="3" class="active">6. ENF CARDIACA <br>
					      <input type="checkbox" id="cb_cardiaca" ng-checked="cb_cardiaca" name="cb_cardiaca"></td>
					    <td colspan="3" class="active">10. ENF METABÓLICA <br>
					      <input type="checkbox" id="cb_metabolica" ng-checked="cb_metabolica" name="cb_metabolica"></td>
					    <td colspan="3" class="active">14. ENF QUIRURGICA <br>
					      <input type="checkbox" id="cb_quirurgica" ng-checked="cb_quirurgica" name="cb_quirurgica"></td>
					    <td colspan="3" class="active">18. RIESGO SOCIAL <br>
					      <input type="checkbox" id="cb_riesgosocial" ng-checked="cb_riesgosocial" name="cb_riesgosocial"></td>
					    <td colspan="4" class="active">22. DIETA Y HABITOS <br>
					      <input type="checkbox" id="cb_dietahabitos" ng-checked="cb_dietahabitos" name="cb_dietahabitos"></td>
				  	</tr>
				  	<tr style="font-size:10px; ">
					    <td colspan="4" class="active">3. ENF INFANCIA <br>
					      <input type="checkbox" id="cb_infancia" ng-checked="cb_infancia" name="cb_infancia"></td>
					    <td colspan="3" class="active">7. ENF RESPIRATORIA <br>
					      <input type="checkbox" id="cb_respiratoria" ng-checked="cb_respiratoria" name="cb_respiratoria"></td>
					    <td colspan="3" class="active">11. ENF HEMO LINF <br>
					      <input type="checkbox" id="cb_hemolinf" ng-checked="cb_hemolinf" name="cb_hemolinf"></td>
					    <td colspan="3" class="active">15. ENF MENTAL <br>
					      <input type="checkbox" id="cb_mental" ng-checked="cb_mental" name="cb_mental"></td>
					    <td colspan="3" class="active">19. RIESGO LABORAL <br>
					      <input type="checkbox" id="cb_riesgolaboral" ng-checked="cb_riesgolaboral" name="cb_riesgolaboral"></td>
					    <td colspan="4" class="active">23. RELIGION Y CULTURA <br>
					      <input type="checkbox" id="cb_religioncultura" ng-checked="cb_religioncultura" name="cb_religioncultura"></td>
				  	</tr>
				  	<tr style="font-size:10px; ">
					    <td colspan="4" class="active">4. ENF ADOLECENTE <br>
					      <input type="checkbox" id="cb_adolecente" ng-checked="cb_adolecente" name="cb_adolecente"></td>
					    <td colspan="3" class="active">8. ENF DIGESTIVA <br>
					      <input type="checkbox" id="cb_digestiva" ng-checked="cb_digestiva" name="cb_digestiva"></td>
					    <td colspan="3" class="active">12. ENF URINARIA X <br>
					      <input type="checkbox" id="cb_urinaria" ng-checked="cb_urinaria" name="cb_urinaria"></td>
					    <td colspan="3" class="active">16. ENF T SEXUAL <br>
					      <input type="checkbox" id="cb_tsexual" ng-checked="cb_tsexual" name="cb_tsexual"></td>
					    <td colspan="3" class="active">20. RIESGO FAMILIAR <br>
					      <input type="checkbox" id="cb_riesgofamiliar" ng-checked="cb_riesgofamiliar" name="cb_riesgofamiliar"></td>
					    <td colspan="4" class="active">24. OTRO <br>
					      <input type="checkbox" id="cb_otro" ng-checked="cb_otro" name="cb_otro"></td>
				  	</tr>
				  	<tr height="10px">
				    	<td colspan="20"><textarea id="txtAntePer" style=" border-width:0px; height:100%; width:98%" value="" ng-model="txtAntePer" name="txtAntePer"></textarea></td>
				  	</tr>
				  	<tr>
				    	<td colspan="20" class="active"><strong>3. ANTECEDENTES FAMILIARES</strong></td>
				  	</tr>
				  	<tr style="font-size:10px; ">
					    <td colspan="2" class="active">1. CARDIOPATIA <br>
					      	<input type="checkbox" id="cb_cardiopatia" ng-checked="cb_cardiopatia" name="cb_cardiopatia">
					    </td>
					    <td colspan="2" class="active">2. DIABETES <br>
					      	<input type="checkbox" id="cb_diabetes" ng-checked="cb_diabetes" name="cb_diabetes">
					    </td>
					    <td colspan="2" class="active">3. ENF VASCULARES <br>
					      	<input type="checkbox" id="cb_enfvasculares" ng-checked="cb_enfvasculares" name="cb_enfvasculares">
					    </td>
					    <td colspan="2" class="active">4. HTA <br>
					     	<input type="checkbox" id="cb_hta" ng-checked="cb_hta" name="cb_hta">
					    </td>
					    <td colspan="2" class="active">5. CANCER <br>
					      	<input type="checkbox" id="cb_cancer" ng-checked="cb_cancer" name="cb_cancer">
					    </td>
					    <td colspan="2" class="active">6. TUBERCULOSIS <br>
					      	<input type="checkbox" id="cb_tuberculosis" ng-checked="cb_tuberculosis" name="cb_tuberculosis">
					    </td>
					    <td colspan="2" class="active">7. ENF MENTAL <br>
					      	<input type="checkbox" id="cb_enfenfmental" ng-checked="cb_enfenfmental" name="cb_enfenfmental">
					    </td>
					    <td colspan="2" class="active">8. ENF INFECCIOSA <br>
					      	<input type="checkbox" id="cb_enfinfecciosa" ng-checked="cb_enfinfecciosa" name="cb_enfinfecciosa">
					    </td>
					    <td colspan="2" class="active">9. MAL FORMACIÓN <br>
					      	<input type="checkbox" id="cb_malformacion" ng-checked="cb_malformacion" name="cb_malformacion">
					    </td>
					    <td colspan="2" class="active">10. OTRO <br>
					      	<input type="checkbox" id="cb_afotro" ng-checked="cb_afotro" name="cb_afotro">
					    </td>
				  	</tr>
				  	<tr>
				    	<td colspan="20"><textarea id="txtNoRef" style=" border-width:0px; height:100%; width:98%" ng-model="txtNoRef" name="txtNoRef"></textarea></td>
				  	</tr>
				  	<tr>
				    	<td colspan="20" class="active"><strong> 4. SÍNTOMAS</strong></td>
				  	</tr>
				  	<tr height="10px">
				    	<td colspan="20"><textarea id="txtProbActual" style=" border-width:0px; height:100%; width:98%" ng-model="txtProbActual" name="txtProbActual"></textarea></td>
				  	</tr>
			  		<tr>
					    <td colspan="20" class="active"><strong>5. EXÁMEN EXTERNO</strong></td>
					</tr>
				  	<tr align="center">
					    <td colspan="10">
					    	<img class=" img-responsive " src="{{url('/')}}/img/dojo.jpg" alt="User profile picture">
					    	<textarea id="txt_ojo_derecho" style="margin: 0px; width: 449px; height: 58px;" ng-model="txt_ojo_derecho" name="txt_ojo_derecho"></textarea>
					   	</td>
					    <td colspan="10">
					    	<img class=" img-responsive " src="{{url('/')}}/img/iojo.jpg" alt="User profile picture">
							<textarea id="txt_ojo_izquierdo" style="margin: 0px; width: 452px; height: 58px;" ng-model="txt_ojo_izquierdo" name="txt_ojo_izquierdo"></textarea>
					    </td>
					    
					  
				  	</tr>
				  	<tr>
				    	<td colspan="20" class="active"><strong>6. AGUDEZA VISUAL</strong></td>
				  	</tr>
				  	<tr align="center">
					    <td colspan="2" class="active">&nbsp;</td>
					    <td colspan="4" class="active">VL SC</td>
					    <td colspan="3" class="active">VP SC</td>
					    <td colspan="4" class="active">VL CC</td>
					    <td colspan="3" class="active">VP CC</td>
					    <td colspan="3" class="active">V PH</td>
					    <td colspan="3" class="active">&nbsp;</td>
					    
				  	</tr>
				  	<tr style="font-size:10px; " align="center">
					    <td class="active" style="font-size:12px; " colspan="2">OD</td>
					    <td colspan="4" class="active"><input id="txt_od_vl_sc" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_od_vl_sc" name="txt_od_vl_sc"></td>
					    <td colspan="3" class="active"><input id="txt_od_vp_sc" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_od_vp_sc" name="txt_od_vp_sc"></td>
					    <td colspan="4" class="active"><input id="txt_od_vl_cc" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_od_vl_cc" name="txt_od_vl_cc"></td>
					    <td colspan="3" class="active"><input id="txt_od_vp_cc" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_od_vp_cc" name="txt_od_vp_cc"></td>
					    <td colspan="3" class="active"><input id="txt_od_vp_ph" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_od_vp_ph" name="txt_od_vp_ph"></td>					    
					    <td colspan="3" class="active">&nbsp;</td>
				  	</tr>
				  	<tr style="font-size:10px; " align="center">
					    <td class="active" style="font-size:12px; " colspan="2">OI</td>
					    <td colspan="4" class="active"><input id="txt_oi_vl_sc" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_oi_vl_sc" name="txt_oi_vl_sc"></td>
					    <td colspan="3" class="active"><input id="txt_oi_vp_sc" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_oi_vp_sc" name="txt_oi_vp_sc"></td>
					    <td colspan="4" class="active"><input id="txt_oi_vl_cc" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_oi_vl_cc" name="txt_oi_vl_cc"></td>
					    <td colspan="3" class="active"><input id="txt_oi_vp_cc" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_oi_vp_cc" name="txt_oi_vp_cc"></td>
					    <td colspan="3" class="active"><input id="txt_oi_vp_ph" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_oi_vp_ph" name="txt_oi_vp_ph"></td>	
					    <td colspan="3" class="active">&nbsp;</td>				    
				  	</tr>
				  	<tr style="font-size:10px; " align="center">
					    <td class="active" style="font-size:12px; " colspan="2">AO</td>
					    <td colspan="4" class="active"><input id="txt_ao_vl_sc" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_ao_vl_sc" name="txt_ao_vl_sc"></td>
					    <td colspan="3" class="active"><input id="txt_ao_vp_sc" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_ao_vp_sc" name="txt_ao_vp_sc"></td>
					    <td colspan="4" class="active"><input id="txt_ao_vl_cc" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_ao_vl_cc" name="txt_ao_vl_cc"></td>
					    <td colspan="3" class="active"><input id="txt_ao_vp_cc" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_ao_vp_cc" name="txt_ao_vp_cc"></td>
					    <td colspan="3" class="active"><input id="txt_ao_vp_ph" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_ao_vp_ph" name="txt_ao_vp_ph"></td>		
					    <td colspan="3" class="active">&nbsp;</td>			    
				  	</tr>
				  	<tr><td class="active" colspan="19">Observaciones:</td><td colspan="3" class="active">&nbsp;</td>	 </tr>
				  	<tr height="10px">

					    <td colspan="20" class="active"><textarea id="txt_agudeza_visual" style=" border-width:0px; height:100%; width:98%" ng-model="txt_agudeza_visual" name="txt_agudeza_visual"></textarea></td>
					</tr>
					<tr>
				    	<td colspan="20" class="active"><strong>7. LENSOMETRÍA</strong></td>
				  	</tr>
			  		<tr align="center">
					    <td class="active" colspan="2">OD</td>
					    <td colspan="18" class="active"><textarea id="txt_lensometria_od" style=" border-width:0px; height:100%; width:98%" ng-model="txt_lensometria_od" name="txt_lensometria_od"></textarea></td>
					    
					</tr>
					<tr align="center">
						<td class="active" colspan="2">OI</td>
						<td colspan="18" class="active"><textarea id="txt_lensometria_oi" style=" border-width:0px; height:100%; width:98%" ng-model="txt_lensometria_oi" name="txt_lensometria_oi"></textarea></td>
					</tr>
					<tr>
				    	<td colspan="20" class="active"><strong>8. RETINOSCOPIA</strong></td>
				  	</tr>
				  	<tr align="center">
					    <td colspan="2" class="active">&nbsp;</td>
					    <td colspan="4" class="active">ESFERA</td>
					    <td colspan="3" class="active">CILINDRO</td>
					    <td colspan="4" class="active">EJE</td>
					    <td colspan="3" class="active">AVL</td>
					    <td colspan="3" class="active">AVC</td>
					    <td colspan="3" class="active">&nbsp;</td>
					    
				  	</tr>
				  	<tr style="font-size:10px; " align="center">
					    <td class="active" style="font-size:12px; " colspan="2">OD</td>
					    <td colspan="4" class="active"><input id="txt_retinoscopia_od_esfera" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_retinoscopia_od_esfera" name="txt_retinoscopia_od_esfera"></td>
					    <td colspan="3" class="active"><input id="txt_retinoscopia_od_cilindro" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_retinoscopia_od_cilindro" name="txt_retinoscopia_od_cilindro"></td>
					    <td colspan="4" class="active"><input id="txt_retinoscopia_od_eje" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_retinoscopia_od_eje" name="txt_retinoscopia_od_eje"></td>
					    <td colspan="3" class="active"><input id="txt_retinoscopia_od_avl" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_retinoscopia_od_avl" name="txt_retinoscopia_od_avl"></td>
					    <td colspan="3" class="active"><input id="txt_retinoscopia_od_avc" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_retinoscopia_od_avc" name="txt_retinoscopia_od_avc"></td>					    
					    <td colspan="3" class="active">&nbsp;</td>
				  	</tr>
				  	<tr style="font-size:10px; " class="active" align="center">
					    <td class="active" style="font-size:12px; " colspan="2">OI</td>
					    <td colspan="4" class="active"><input id="txt_retinoscopia_oi_esfera" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_retinoscopia_oi_esfera" name="txt_retinoscopia_oi_esfera"></td>
					    <td colspan="3" class="active"><input id="txt_retinoscopia_oi_cilindro" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_retinoscopia_oi_cilindro" name="txt_retinoscopia_oi_cilindro"></td>
					    <td colspan="4" class="active"><input id="txt_retinoscopia_oi_eje" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_retinoscopia_oi_eje" name="txt_retinoscopia_oi_eje"></td>
					    <td colspan="3" class="active"><input id="txt_retinoscopia_oi_avl" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_retinoscopia_oi_avl" name="txt_retinoscopia_oi_avl"></td>
					    <td colspan="3" class="active"><input id="txt_retinoscopia_oi_avc" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_retinoscopia_oi_avc" name="txt_retinoscopia_oi_avc"></td>
					    <td colspan="3" class="active">&nbsp;</td>	    
				  	</tr>
				  	<tr><td class="active" colspan="19">Observaciones:</td><td colspan="3" class="active">&nbsp;</td>	 </tr>
				  	<tr height="10px">

					    <td colspan="20" class="active"><textarea id="txt_retinoscopia" style=" border-width:0px; height:100%; width:98%" ng-model="txt_retinoscopia" name="txt_retinoscopia"></textarea></td>
					</tr>

					<tr>
				    	<td colspan="20" class="active"><strong>9. SUBJETIVO</strong></td>
				  	</tr>
				  	<tr align="center">
					    <td colspan="2" class="active">&nbsp;</td>
					    <td colspan="4" class="active">ESFERA</td>
					    <td colspan="3" class="active">CILINDRO</td>
					    <td colspan="4" class="active">EJE</td>
					    <td colspan="3" class="active">AVL</td>
					    <td colspan="3" class="active">AVC</td>
					    <td colspan="3" class="active">&nbsp;</td>
					    
				  	</tr>
				  	<tr style="font-size:10px; " align="center">
					    <td class="active" style="font-size:12px; " colspan="2">OD</td>
					    <td colspan="4" class="active"><input id="txt_subjetivo_od_esfera" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_subjetivo_od_esfera" name="txt_subjetivo_od_esfera"></td>
					    <td colspan="3" class="active"><input id="txt_subjetivo_od_cilindro" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_subjetivo_od_cilindro" name="txt_subjetivo_od_cilindro"></td>
					    <td colspan="4" class="active"><input id="txt_subjetivo_od_eje" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_subjetivo_od_eje" name="txt_subjetivo_od_eje"></td>
					    <td colspan="3" class="active"><input id="txt_subjetivo_od_avl" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_subjetivo_od_avl" name="txt_subjetivo_od_avl"></td>
					    <td colspan="3" class="active"><input id="txt_subjetivo_od_avc" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_subjetivo_od_avc" name="txt_subjetivo_od_avc"></td>					    
					    <td colspan="3" class="active">&nbsp;</td>
				  	</tr>
				  	<tr style="font-size:10px; " class="active" align="center">
					    <td class="active" style="font-size:12px; " colspan="2">OI</td>
					    <td colspan="4" class="active"><input id="txt_subjetivo_oi_esfera" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_subjetivo_oi_esfera" name="txt_subjetivo_oi_esfera"></td>
					    <td colspan="3" class="active"><input id="txt_subjetivo_oi_cilindro" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_subjetivo_oi_cilindro" name="txt_subjetivo_oi_cilindro"></td>
					    <td colspan="4" class="active"><input id="txt_subjetivo_oi_eje" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_subjetivo_oi_eje" name="txt_subjetivo_oi_eje"></td>
					    <td colspan="3" class="active"><input id="txt_subjetivo_oi_avl" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_subjetivo_oi_avl" name="txt_subjetivo_oi_avl"></td>
					    <td colspan="3" class="active"><input id="txt_subjetivo_oi_avc" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_subjetivo_oi_avc" name="txt_subjetivo_oi_avc"></td>	    

					    <td colspan="3" class="active">&nbsp;</td>
				  	</tr>
				  	<tr><td class="active" colspan="19">Observaciones:</td><td colspan="3" class="active">&nbsp;</td>	 </tr>
				  	<tr height="10px">

					    <td colspan="20" class="active"><textarea id="txt_subjetivo" style=" border-width:0px; height:100%; width:98%" ng-model="txt_subjetivo" name="txt_subjetivo"></textarea></td>
					</tr>
					<tr>
				    	<td colspan="20" class="active"><strong>10. RX FINAL</strong></td>
				  	</tr>
				  	<tr align="center">
				    	<td colspan="20" class="active"><strong>CORRECCIÓN DISTANCIA</strong></td>
				  	</tr>
				  	<tr align="center">
					    <td colspan="2" class="active">&nbsp;</td>
					    <td colspan="3" class="active">ESFERA</td>
					    <td colspan="3" class="active">CILINDRO</td>
					    <td colspan="3" class="active">EJE</td>
					    <td colspan="3" class="active">D.P.N</td>
					    <td colspan="3" class="active">ADICION</td>
					    <td colspan="3" class="active">ALTURA</td>
					   
					    
				  	</tr>
				  	<tr style="font-size:10px; " align="center">
					    <td class="active" style="font-size:12px; " colspan="2">OD</td>
					    <td colspan="3" class="active"><input id="txt_distancia_od_esfera" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_distancia_od_esfera" name="txt_distancia_od_esfera"></td>
					    <td colspan="3" class="active"><input id="txt_distancia_od_cilindro" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_distancia_od_cilindro" name="txt_distancia_od_cilindro"></td>
					    <td colspan="3" class="active"><input id="txt_distancia_od_eje" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_distancia_od_eje" name="txt_distancia_od_eje"></td>
					    <td colspan="3" class="active"><input id="txt_distancia_od_dp" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_distancia_od_dp" name="txt_distancia_od_dp"></td>
					    <td colspan="3" class="active"><input id="txt_distancia_od_adicion" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_distancia_od_adicion" name="txt_distancia_od_adicion"></td>
					    <td colspan="3" class="active"><input id="txt_distancia_od_altura" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_distancia_od_altura" name="txt_distancia_od_altura"></td>

					   
				  	</tr>
				  	<tr style="font-size:10px; " class="active" align="center">
					    <td class="active" style="font-size:12px; " colspan="2">OI</td>
					    <td colspan="3" class="active"><input id="txt_distancia_oi_esfera" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_distancia_oi_esfera" name="txt_distancia_oi_esfera"></td>
					    <td colspan="3" class="active"><input id="txt_distancia_oi_cilindro" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_distancia_oi_cilindro" name="txt_distancia_oi_cilindro"></td>
					    <td colspan="3" class="active"><input id="txt_distancia_oi_eje" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_distancia_oi_eje" name="txt_distancia_oi_eje"></td>
					    <td colspan="3" class="active"><input id="txt_distancia_oi_dp" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_distancia_oi_dp" name="txt_distancia_oi_dp"></td>
					    <td colspan="3" class="active"><input id="txt_distancia_oi_adicion" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_distancia_oi_adicion" name="txt_distancia_oi_adicion"></td>
					    <td colspan="3" class="active"><input id="txt_distancia_oi_altura" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_distancia_oi_altura" name="txt_distancia_oi_altura"></td>	    

					    
				  	</tr>
				  	<tr><td class="active" colspan="19">Observaciones:</td><td colspan="3" class="active">&nbsp;</td>	 </tr>
				  	<tr height="10px">

					    <td colspan="20" class="active"><textarea id="txt_distancia" style=" border-width:0px; height:100%; width:98%" ng-model="txt_distancia" name="txt_distancia"></textarea></td>
					</tr>

					<tr align="center">
				    	<td colspan="20" class="active"><strong>CORRECCIÓN CERCANA</strong></td>
				  	</tr>
				  	<tr align="center">
					    <td colspan="2" class="active">&nbsp;</td>
					    <td colspan="4" class="active">ESFERA</td>
					    <td colspan="3" class="active">CILINDRO</td>
					    <td colspan="4" class="active">EJE</td>
					    <td colspan="3" class="active">D.P.N.</td>
					    <!--td colspan="3" class="active">ALTURA</td-->
					    <td colspan="6" class="active">&nbsp;</td>
					    
				  	</tr>
				  	<tr style="font-size:10px; " align="center">
					    <td class="active" style="font-size:12px; " colspan="2">OD</td>
					    <td colspan="4" class="active"><input id="txt_cercano_od_esfera" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_cercano_od_esfera" name="txt_cercano_od_esfera"></td>
					    <td colspan="3" class="active"><input id="txt_cercano_od_cilindro" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_cercano_od_cilindro" name="txt_cercano_od_cilindro"></td>
					    <td colspan="4" class="active"><input id="txt_cercano_od_eje" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_cercano_od_eje" name="txt_cercano_od_eje"></td>
					    <td colspan="3" class="active"><input id="txt_cercano_od_dp" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_cercano_od_dp" name="txt_cercano_od_dp"></td>
					    <!--td colspan="3" class="active"><input id="txt_cercano_od_altura" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_cercano_od_altura" name="txt_cercano_od_altura"></td-->					    
					    <td colspan="6" class="active">&nbsp;</td>
				  	</tr>
				  	<tr style="font-size:10px; " class="active" align="center">
					    <td class="active" style="font-size:12px; " colspan="2">OI</td>
					    <td colspan="4" class="active"><input id="txt_cercano_oi_esfera" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_cercano_oi_esfera" name="txt_cercano_oi_esfera"></td>
					    <td colspan="3" class="active"><input id="txt_cercano_oi_cilindro" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_cercano_oi_cilindro" name="txt_cercano_oi_cilindro"></td>
					    <td colspan="4" class="active"><input id="txt_cercano_oi_eje" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_cercano_oi_eje" name="txt_cercano_oi_eje"></td>
					    <td colspan="3" class="active"><input id="txt_cercano_oi_dp" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_cercano_oi_dp" name="txt_cercano_oi_dp"></td>
					    <!--td colspan="3" class="active"><input id="txt_cercano_oi_altura" type="text" style="border-width:0px;width: 100%; " value="" ng-model="txt_cercano_oi_altura" name="txt_cercano_oi_altura"></td-->	    

					    <td colspan="6" class="active">&nbsp;</td>
				  	</tr>
				  	<tr><td class="active" colspan="19">Observaciones:</td><td colspan="3" class="active">&nbsp;</td>	 </tr>
				  	<tr height="10px">

					    <td colspan="20" class="active"><textarea id="txt_cercano" style=" border-width:0px; height:100%; width:98%" ng-model="txt_cercano" name="txt_cercano"></textarea></td>
					</tr>
					<tr>
				    	<td colspan="20" class="active"><strong>11. TEST</strong></td>
				  	</tr>
					<tr align="center">
					    <td colspan="2" class="active">&nbsp;</td>
					    <td colspan="5" class="active">COVER TEST</td>
					    <td colspan="4" class="active">TEST ISHIHARA</td>
					    <td colspan="5" class="active">TEST PUPILAR</td>
					    <td colspan="4" class="active">FONDO DE OJO</td>
					    
					   
					    
				  	</tr>
					
					<tr style="font-size:10px;" align="center">
						<td colspan="2" class="active">&nbsp;</td>
					    <td colspan="5" class="active">
						    <label class="btn btn-default">
						    	<input type="radio" name="rd_cover_test" value="normal" ng-model="rd_cover_test"> NORMAL  
						   	</label>
						</td>
					    <td colspan="4" class="active">
							<label class="btn btn-default">
						    	<input type="radio" name="rd_test_ishihara" value="normal" ng-model="rd_test_ishihara"> NORMAL  
						   	</label>
					    </td>
					    <td colspan="5" class="active">
							<label class="btn btn-default">
						    	<input type="radio" name="rd_test_pupilar" value="normal" ng-model="rd_test_pupilar"> NORMAL  
						   	</label>
					    </td>
					    <td colspan="4" class="active">
							<label class="btn btn-default">
						    	<input type="radio" name="rd_fondo_de_ojo" value="normal" ng-model="rd_fondo_de_ojo"> NORMAL  
						   	</label>
					    </td>
					</tr>
					<tr style="font-size:10px;" align="center">
					<td colspan="2" class="active">&nbsp;</td>
					    <td colspan="5" class="active"> 
							<label class="btn btn-default">
						    	<input type="radio" name="rd_cover_test" value="alterado" ng-model="rd_cover_test"> ALTERADO  
						   	</label>
					    </td>
					    <td colspan="4" class="active">
							<label class="btn btn-default">
						    	<input type="radio" name="rd_test_ishihara" value="alterado" ng-model="rd_test_ishihara"> ALTERADO  
						   	</label>
					    </td>
					    <td colspan="5" class="active">
							<label class="btn btn-default">
						    	<input type="radio" name="rd_test_pupilar" value="alterado" ng-model="rd_test_pupilar"> ALTERADO  
						   	</label>
					    </td>
					    <td colspan="4" class="active">
							<label class="btn btn-default">
						    	<input type="radio" name="rd_fondo_de_ojo" value="alterado" ng-model="rd_fondo_de_ojo"> ALTERADO  
						   	</label>
					    </td>
					</tr>
					
				 	<tr>
				    	<td colspan="20" class="active"><strong>12. DIAGNÓSTICO</strong></td>
				 	</tr>
				  	
					<tr align="center">
					    <td colspan="20"><textarea id="txt_plan_diagnostico" class="typeahead form-control" style=" border-width:0px; height:100%; width:98%" ng-model="txt_plan_diagnostico" name="txt_plan_diagnostico"></textarea>
					    </td>
					   
					</tr>

					<tr>
				    	<td colspan="20" class="active"><strong>13. DISPOSICIONES FINALES</strong></td>
				 	</tr>
				  	
					<tr align="center">
					    <td colspan="20"><textarea id="txt_disposiciones_finales" class="typeahead form-control" style=" border-width:0px; height:100%; width:98%" ng-model="txt_disposiciones_finales" name="txt_disposiciones_finales"></textarea>
					    </td>
					   
					</tr>
					<!--tr height="50PX" align="center">
					    <td colspan="2" class="active" style="font-size:12px;">FECHA</td>
			    		<td colspan="4">
				            <div class="input-group date">
				              <input data-date-format="yyyy-mm-dd" class="form-control" id="txtFechaAgendDoct" ng-model="txtFechaAgendDoct" name="txtFechaAgendDoct" ng-checked="txtFechaAgendDoct">
				              <div class="input-group-addon">
				                  <span class="glyphicon glyphicon-th"></span>
				              </div>
				            </div>
	        			</td>
			    		<td colspan="2" class="active" style="font-size:12px;">NOMBRE DEL PROFESIONAL</td>
			    		<td colspan="4"><input type="text" style="border-width:0px; width:95%" value="" id="nombremedico" ng-model="nombremedico" name="nombremedico"></td>
			    		<td colspan="2" class="active" style="font-size:12px;">FIRMA</td>
			    		<td colspan="6"><input type="text" style="border-width:0px; width:95%" value="" id="firmaDoc" ng-model="firmaDoc" name="firmaDoc"></td>
			  		</tr-->
				</tbody>
			</table>
			
		</form>
	</div>
	<div class = "panel-footer">
		<div>
		<input class = "btn btn-success imprimir" id="btnSave" type = "button" style = "margin-left: 10px" value = "Guardar"ng-click = "toggle('{{$operation}}')">
          @if($operation == 'update')
          <input class = "btn btn-danger" id="btnFinalizar" type = "button" style = "margin-left: 10px" value = "Finalizar"ng-click = "toggle('finalizar')">
          @endif
		</div>

	</div>


<!-- HTML del Modal de Loading-->

<div class = "modal" style = "display: none" align = "center">
	<div class = "center">
		<img alt = "" src = "{{asset('img/loading_animation.gif')}}" />
	</div>
</div>



<script type="text/javascript">


$(document).ready(function(){
	$("#motivoConsulta").focus();
	$(".typeahead").each(function(){
	  		
		if($(this).val() != ""){
			var id = $(this).attr('id');
			id = id.substring(2, 1);		
			$('#d'+id).attr('style','visibility:visible');
		}
	});

	$(".typeahead").change(function(){
	        
	    var path = "{{ route('searchCie') }}";
	    var parent = $(this).attr('id');
	    var id = parent.substring(2, 1);
	    $.get(path, { query: $(this).val() }, function (data) {
	    	$('#c'+id).val(data.cod_cie);
	    	$('#d'+id).attr('style','visibility:visible');
	    });
	});

	$(".typeaheadCodigo").change(function(){
	        
	    var path = "{{ route('searchDescripcion') }}";
	    var parent = $(this).attr('id');
	    	var id = parent.substring(2, 1);
	    	
	        
	    $.get(path, { query: $(this).val() }, function (data) {
	    	$('#t'+id).val(data.descripcion);

	    	$('#d'+id).attr('style','visibility:visible');
	    });              
	});

});



	//Declaracion de la aplicacion

	 var app = angular.module('MyApp', [], function ($interpolateProvider)
	{
		$interpolateProvider.startSymbol('[[');
		$interpolateProvider.endSymbol(']]');
	});

	//Declaracion de la url base del proyecto.
	// URL_BASE se declara en el archivo public/js/configServer.js

	app.constant('API_URL', URL_BASE);

	//Implementacion de la controladora de angular

	app.controller("controllerOptometria", function ($scope, $http, API_URL)
	{

	//Como inician los campos

	$scope.init = function ()
	{
		    $("#volver").attr("href","{{ url('/admin/optometria?m=62') }}");
    //if("{{$paciente_ingresado}}"){
    	
    
	    if("{{$operation == 'update'}}"){
	    	$("#id_medico").val("{{$optometria->id_medico}}");
	      	$("#id_paciente").val("{{$optometria->id_paciente}}");
	      	//$("#id_medico").val("{{$consulta->id_medico}}").trigger("change");
	     	//$("#id_paciente").val("{{$consulta->id_paciente}}").trigger("change");
	    }else{
	      	//$("#id_medico").val("").trigger("change");
	    	$("#id_medico").val("{{$medico->id}}");
	      	$("#id_paciente").val("{{$paciente->id}}");
	      //$("#id_paciente").val("").trigger("change");	      
	    }
	    
		$scope.cb_vacunas = "{{($operation == 'update')?$optometria->cb_vacunas :''}}";
		$scope.cb_alergica = "{{($operation == 'update')?$optometria->cb_alergica :''}}";
		$scope.cb_neurologica = "{{($operation == 'update')?$optometria->cb_neurologica :''}}";
		$scope.cb_traumatologica = "{{($operation == 'update')?$optometria->cb_traumatologica :''}}";
		$scope.cb_tendsexual = "{{($operation == 'update')?$optometria->cb_tendsexual :''}}";
		$scope.cb_actsexual = "{{($operation == 'update')?$optometria->cb_actsexual :''}}";
		$scope.cb_perinatal = "{{($operation == 'update')?$optometria->cb_perinatal :''}}";
		$scope.cb_cardiaca = "{{($operation == 'update')?$optometria->cb_cardiaca :''}}";
		$scope.cb_metabolica = "{{($operation == 'update')?$optometria->cb_metabolica :''}}";
		$scope.cb_quirurgica = "{{($operation == 'update')?$optometria->cb_quirurgica :''}}";
		$scope.cb_riesgosocial = "{{($operation == 'update')?$optometria->cb_riesgosocial :''}}";
		$scope.cb_dietahabitos = "{{($operation == 'update')?$optometria->cb_dietahabitos :''}}";
		$scope.cb_infancia = "{{($operation == 'update')?$optometria->cb_infancia :''}}";
		$scope.cb_respiratoria = "{{($operation == 'update')?$optometria->cb_respiratoria :''}}";
		$scope.cb_hemolinf = "{{($operation == 'update')?$optometria->cb_hemolinf :''}}";
		$scope.cb_mental = "{{($operation == 'update')?$optometria->cb_mental :''}}";
		$scope.cb_riesgolaboral = "{{($operation == 'update')?$optometria->cb_riesgolaboral :''}}";
		$scope.cb_religioncultura = "{{($operation == 'update')?$optometria->cb_religioncultura :''}}";
		$scope.cb_adolecente = "{{($operation == 'update')?$optometria->cb_adolecente :''}}";
		$scope.cb_digestiva = "{{($operation == 'update')?$optometria->cb_digestiva :''}}";
		$scope.cb_urinaria = "{{($operation == 'update')?$optometria->cb_urinaria :''}}";
		$scope.cb_tsexual = "{{($operation == 'update')?$optometria->cb_tsexual :''}}";
		$scope.cb_riesgofamiliar = "{{($operation == 'update')?$optometria->cb_riesgofamiliar :''}}";
		$scope.cb_otro = "{{($operation == 'update')?$optometria->cb_otro :''}}";
		$scope.cb_cardiopatia = "{{($operation == 'update')?$optometria->cb_cardiopatia :''}}";
		$scope.cb_diabetes = "{{($operation == 'update')?$optometria->cb_diabetes :''}}";
		$scope.cb_enfvasculares = "{{($operation == 'update')?$optometria->cb_enfvasculares :''}}";
		$scope.cb_hta = "{{($operation == 'update')?$optometria->cb_hta :''}}";
		$scope.cb_cancer = "{{($operation == 'update')?$optometria->cb_cancer :''}}";
		$scope.cb_tuberculosis = "{{($operation == 'update')?$optometria->cb_tuberculosis :''}}";
		$scope.cb_enfenfmental = "{{($operation == 'update')?$optometria->cb_enfenfmental :''}}";
		$scope.cb_enfinfecciosa = "{{($operation == 'update')?$optometria->cb_enfinfecciosa :''}}";
		$scope.cb_malformacion = "{{($operation == 'update')?$optometria->cb_malformacion :''}}";
		$scope.cb_afotro = "{{($operation == 'update')?$optometria->cb_afotro :''}}";
		$scope.txt_od_vl_sc = "{{($operation == 'update')?$optometria->txt_od_vl_sc :''}}";
		$scope.txt_od_vp_sc = "{{($operation == 'update')?$optometria->txt_od_vp_sc :''}}";
		$scope.txt_od_vl_cc = "{{($operation == 'update')?$optometria->txt_od_vl_cc :''}}";
		$scope.txt_od_vp_cc = "{{($operation == 'update')?$optometria->txt_od_vp_cc :''}}";
		$scope.txt_od_vp_ph = "{{($operation == 'update')?$optometria->txt_od_vp_ph :''}}";
		$scope.txt_oi_vl_sc = "{{($operation == 'update')?$optometria->txt_oi_vl_sc :''}}";
		$scope.txt_oi_vp_sc = "{{($operation == 'update')?$optometria->txt_oi_vp_sc :''}}";
		$scope.txt_oi_vl_cc = "{{($operation == 'update')?$optometria->txt_oi_vl_cc :''}}";
		$scope.txt_oi_vp_cc = "{{($operation == 'update')?$optometria->txt_oi_vp_cc :''}}";
		$scope.txt_oi_vp_ph = "{{($operation == 'update')?$optometria->txt_oi_vp_ph :''}}";
		$scope.txt_ao_vl_sc = "{{($operation == 'update')?$optometria->txt_ao_vl_sc :''}}";
		$scope.txt_ao_vp_sc = "{{($operation == 'update')?$optometria->txt_ao_vp_sc :''}}";
		$scope.txt_ao_vl_cc = "{{($operation == 'update')?$optometria->txt_ao_vl_cc :''}}";
		$scope.txt_ao_vp_cc = "{{($operation == 'update')?$optometria->txt_ao_vp_cc :''}}";
		$scope.txt_ao_vp_ph = "{{($operation == 'update')?$optometria->txt_ao_vp_ph :''}}";
		$scope.txt_retinoscopia_od_esfera = "{{($operation == 'update')?$optometria->txt_retinoscopia_od_esfera :''}}";
		$scope.txt_retinoscopia_od_cilindro = "{{($operation == 'update')?$optometria->txt_retinoscopia_od_cilindro :''}}";
		$scope.txt_retinoscopia_od_eje = "{{($operation == 'update')?$optometria->txt_retinoscopia_od_eje :''}}";
		$scope.txt_retinoscopia_od_avl = "{{($operation == 'update')?$optometria->txt_retinoscopia_od_avl :''}}";
		$scope.txt_retinoscopia_od_avc = "{{($operation == 'update')?$optometria->txt_retinoscopia_od_avc :''}}";
		$scope.txt_retinoscopia_oi_esfera = "{{($operation == 'update')?$optometria->txt_retinoscopia_oi_esfera :''}}";
		$scope.txt_retinoscopia_oi_cilindro = "{{($operation == 'update')?$optometria->txt_retinoscopia_oi_cilindro :''}}";
		$scope.txt_retinoscopia_oi_eje = "{{($operation == 'update')?$optometria->txt_retinoscopia_oi_eje :''}}";
		$scope.txt_retinoscopia_oi_avl = "{{($operation == 'update')?$optometria->txt_retinoscopia_oi_avl :''}}";
		$scope.txt_retinoscopia_oi_avc = "{{($operation == 'update')?$optometria->txt_retinoscopia_oi_avc :''}}";
		$scope.txt_subjetivo_od_esfera = "{{($operation == 'update')?$optometria->txt_subjetivo_od_esfera :''}}";
		$scope.txt_subjetivo_od_cilindro = "{{($operation == 'update')?$optometria->txt_subjetivo_od_cilindro :''}}";
		$scope.txt_subjetivo_od_eje = "{{($operation == 'update')?$optometria->txt_subjetivo_od_eje :''}}";
		$scope.txt_subjetivo_od_avl = "{{($operation == 'update')?$optometria->txt_subjetivo_od_avl :''}}";
		$scope.txt_subjetivo_od_avc = "{{($operation == 'update')?$optometria->txt_subjetivo_od_avc :''}}";
		$scope.txt_subjetivo_oi_esfera = "{{($operation == 'update')?$optometria->txt_subjetivo_oi_esfera :''}}";
		$scope.txt_subjetivo_oi_cilindro = "{{($operation == 'update')?$optometria->txt_subjetivo_oi_cilindro :''}}";
		$scope.txt_subjetivo_oi_eje = "{{($operation == 'update')?$optometria->txt_subjetivo_oi_eje :''}}";
		$scope.txt_subjetivo_oi_avl = "{{($operation == 'update')?$optometria->txt_subjetivo_oi_avl :''}}";
		$scope.txt_subjetivo_oi_avc = "{{($operation == 'update')?$optometria->txt_subjetivo_oi_avc :''}}";
		$scope.txt_distancia_od_esfera = "{{($operation == 'update')?$optometria->txt_distancia_od_esfera :''}}";
		$scope.txt_distancia_od_cilindro = "{{($operation == 'update')?$optometria->txt_distancia_od_cilindro :''}}";
		$scope.txt_distancia_od_eje = "{{($operation == 'update')?$optometria->txt_distancia_od_eje :''}}";
		$scope.txt_distancia_od_dp = "{{($operation == 'update')?$optometria->txt_distancia_od_dp :''}}";
		$scope.txt_distancia_od_adicion = "{{($operation == 'update')?$optometria->txt_distancia_od_dp :''}}";
		$scope.txt_distancia_od_altura = "{{($operation == 'update')?$optometria->txt_distancia_od_altura :''}}";
		$scope.txt_distancia_oi_esfera = "{{($operation == 'update')?$optometria->txt_distancia_oi_esfera :''}}";
		$scope.txt_distancia_oi_cilindro = "{{($operation == 'update')?$optometria->txt_distancia_oi_cilindro :''}}";
		$scope.txt_distancia_oi_eje = "{{($operation == 'update')?$optometria->txt_distancia_oi_eje :''}}";
		$scope.txt_distancia_oi_dp = "{{($operation == 'update')?$optometria->txt_distancia_oi_dp :''}}";
		$scope.txt_distancia_oi_adicion = "{{($operation == 'update')?$optometria->txt_distancia_oi_dp :''}}";
		$scope.txt_distancia_oi_altura = "{{($operation == 'update')?$optometria->txt_distancia_oi_altura :''}}";
		$scope.txt_cercano_od_esfera = "{{($operation == 'update')?$optometria->txt_cercano_od_esfera :''}}";
		$scope.txt_cercano_od_cilindro = "{{($operation == 'update')?$optometria->txt_cercano_od_cilindro :''}}";
		$scope.txt_cercano_od_eje = "{{($operation == 'update')?$optometria->txt_cercano_od_eje :''}}";
		$scope.txt_cercano_od_dp = "{{($operation == 'update')?$optometria->txt_cercano_od_dp :''}}";
		$scope.txt_cercano_od_altura = "{{($operation == 'update')?$optometria->txt_cercano_od_altura :''}}";
		$scope.txt_cercano_oi_esfera = "{{($operation == 'update')?$optometria->txt_cercano_oi_esfera :''}}";
		$scope.txt_cercano_oi_cilindro = "{{($operation == 'update')?$optometria->txt_cercano_oi_cilindro :''}}";
		$scope.txt_cercano_oi_eje = "{{($operation == 'update')?$optometria->txt_cercano_oi_eje :''}}";
		$scope.txt_cercano_oi_dp = "{{($operation == 'update')?$optometria->txt_cercano_oi_dp :''}}";
		$scope.txt_cercano_oi_altura = "{{($operation == 'update')?$optometria->txt_cercano_oi_altura :''}}";
		$scope.rd_cover_test = "{{($operation == 'update')?$optometria->rd_cover_test :''}}";
		$scope.rd_test_ishihara = "{{($operation == 'update')?$optometria->rd_test_ishihara :''}}";
		$scope.rd_test_pupilar = "{{($operation == 'update')?$optometria->rd_test_pupilar :''}}";
		$scope.rd_fondo_de_ojo = "{{($operation == 'update')?$optometria->rd_fondo_de_ojo :''}}";
	
		$scope.txtFechaAgendDoct = "{{($operation == 'update')?$optometria->txtFechaAgendDoct :''}}";
		$scope.nombremedico = "{{$medico->nombre." ".$medico->apellido}}";
		$scope.firmaDoc = "{{($operation == 'update')?$optometria->firmaDoc :''}}";
		$scope.motivoConsulta = "{{($operation == 'update')?$optometria->motivoConsulta :''}}";
		$scope.txtAntePer = "{{($operation == 'update')?$optometria->txtAntePer :''}}";
		$scope.txtNoRef = "{{($operation == 'update')?$optometria->txtNoRef :''}}";
		$scope.txtProbActual = "{{($operation == 'update')?$optometria->txtProbActual :''}}";
		$scope.txt_ojo_derecho = "{{($operation == 'update')?$optometria->txt_ojo_derecho :''}}";
		$scope.txt_ojo_izquierdo = "{{($operation == 'update')?$optometria->txt_ojo_izquierdo :''}}";
		$scope.txt_agudeza_visual = "{{($operation == 'update')?$optometria->txt_agudeza_visual :''}}";
		$scope.txt_lensometria_od = "{{($operation == 'update')?$optometria->txt_lensometria_od :''}}";
		$scope.txt_lensometria_oi = "{{($operation == 'update')?$optometria->txt_lensometria_oi :''}}";
		$scope.txt_retinoscopia = "{{($operation == 'update')?$optometria->txt_retinoscopia :''}}";
		$scope.txt_subjetivo = "{{($operation == 'update')?$optometria->txt_subjetivo :''}}";
		$scope.txt_distancia = "{{($operation == 'update')?$optometria->txt_distancia :''}}";
		$scope.txt_cercano = "{{($operation == 'update')?$optometria->txt_cercano :''}}";
		$scope.txt_plan_diagnostico = "{{($operation == 'update')?$optometria->txt_plan_diagnostico :''}}";
		$scope.txt_disposiciones_finales = "{{($operation == 'update')?$optometria->txt_disposiciones_finales :''}}";
	};

	 //Ejecuto la funcion anterior init()

	$scope.init();

	//Implementacion de método para crear un JSON a partir de la serializacion del FORM

	$scope.serializeObject = function (obj)
	{
		var o = {};
		var a = obj.serializeArray();
		$.each(a, function ()
		{
			if (o[this.name] !== undefined) {
				if (!o[this.name].push) {
					o[this.name] = [o[this.name]];
				}
				o[this.name].push(this.value || '');
			} else {
				o[this.name] = this.value || '';
			}
		});

		o=JSON.stringify(o);
		o= o.replace(/\\r\\n/g, "\\\\n");
		o=JSON.parse(o);

		return o;
	};

	//Implementacion de método que crea un switsh que tiene 2 casos,
	// uno para AÑADIR y otro para ACTUALIZAR.
	// El parametro (operation) puede tomar valores de
	//add o update

	$scope.toggle = function (operation)
	{
		switch (operation) {
			case 'add':

				$(".modal").modal('show');
				console.log($scope.serializeObject($("#form_optometria")));
				$http({
					url    : API_URL + 'optometria',
					method : 'POST',
					params : $scope.serializeObject($("#form_optometria")),
					headers: {
						'Content-Type': 'application/x-www-form-urlencoded'
					}
				}).then(function (response)
				{
					$(".modal").modal('hide');
					if (response.data.response) {
						swal({
							title: "Buen trabajo!",
							text: "Se ha guardado exitosamente!",
							type: "success",
							showCancelButton: false,
							confirmButtonClass: "btn-succes",
							confirmButtonText: "OK",
							closeOnConfirm: true
						},
						function(){
							$(".modal").modal('show');
							window.location = "{{ url('/admin/optometria?m=62') }}";
						});
					} else {
						swal("Error", "¡No se guardó!", "error");
					}
				});

				break;

			case 'update':

				$(".modal").modal('show');

				$http({
					url    : API_URL + 'optometria/{{$optometria->id}}',
					method : 'PUT',
					params : $scope.serializeObject($("#form_optometria")),
					headers: {
						'Content-Type': 'application/x-www-form-urlencoded'
					}
				}).then(function (response)
				{
					$(".modal").modal('hide');
					if (response.data.response) {
						swal({
							title: "Buen trabajo!",
							text: "Actualización exitosa!",
							type: "success",
							showCancelButton: false,
							confirmButtonClass: "btn-succes",
							confirmButtonText: "OK",
							closeOnConfirm: true
						},
						function(){
							$(".modal").modal('show');
							window.location = "{{ url('/admin/optometria?m=62') }}";
						});
						} else {
							swal("Error", "No se actualizó", "error");
						}
					});
					break;

			case 'finalizar':
		      $(".modal").modal('show');
		         console.log($scope.serializeObject($("#form_consulta")));
		        $http({
		          url    : API_URL + 'optometria/finalizar/{{$optometria->id}}',
		          method : 'GET',
		          headers: {
		            'Content-Type': 'application/x-www-form-urlencoded'
		          }
		        }).then(function (response)
		        {
		          $(".modal").modal('hide');
		          if (response.data.response) {
		            swal({
		              title: "Buen trabajo!",
		              text: "Consulta finalizada!",
		              type: "success",
		              showCancelButton: false,
		              confirmButtonClass: "btn-succes",
		              confirmButtonText: "OK",
		              closeOnConfirm: true,
		              showLoaderOnConfirm: true
		            },
		            function(){
		              $(".modal").modal('show');
		            //	document.location.reload();
		              window.location = "{{ url('/admin/optometria?m=62') }}";
		            });
		            } else {
		              swal("Error", "No se actualizó", "error");
		            }
		        });
		    break;
		}
	}
});


</script>
@endsection
