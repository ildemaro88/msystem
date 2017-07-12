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
<p><a title="Volver" id = "volver" href=""><i class="fa fa-chevron-circle-left"></i>&nbsp; Volver a la Lista de Consultas</a><div id="message">
</div></p>

<div class = "box" ng-app="MyApp" ng-controller="controllerConsulta">
	<div class = "box-body">
		<form id="form_consulta" method="POST" action="" name="form_consulta" >
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
						    <input type="hidden"  class="form-control" value="{{$paciente->id}}" id="id_paciente" placeholder="Select a state"  ng-model="id_paciente" name="id_paciente">          
			        	</td>
					    <td colspan="4">
					    	<label for="id_medico" style="margin-left: 45px" class="control-label">{{$medico->nombre." ".$medico->apellido}}</label>
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
				    	<td class="active"><strong>A</strong></td>
				    	<td colspan="9"><input type="text" style="border-width:0px; width:95%" value="" id="motivoConsA" ng-model="motivoConsA" name="motivoConsA"></td>
					    <td class="active"><strong>C</strong></td>
					    <td colspan="9"><input type="text" style="border-width:0px; width:95%" value="" id="motivoConsC" ng-model="motivoConsC" name="motivoConsC"></td>
				  	</tr>
				  	<tr>
					    <td class="active"><strong>B</strong></td>
					    <td colspan="9"><input type="text" style="border-width:0px; width:95%" value="" id="motivoConsB" ng-model="motivoConsB" name="motivoConsB"></td>
					    <td class="active"><strong>D</strong></td>
					    <td colspan="9"><input type="text" style="border-width:0px; width:95%" value="" id="motivoConsD" ng-model="motivoConsD" name="motivoConsD"></td>
				  	</tr>
				  	<tr>
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
				    	<td colspan="20" class="active"><strong> 4. ENFERMEDAD O PROBLEMA ACTUAL</strong></td>
				  	</tr>
				  	<tr height="10px">
				    	<td colspan="20"><textarea id="txtProbActual" style=" border-width:0px; height:100%; width:98%" ng-model="txtProbActual" name="txtProbActual"></textarea></td>
				  	</tr>
			  		<tr>
					    <td colspan="20" class="active"><strong>5. REVISIÓN ACTUAL DE ÓRGANOS Y SISTEMAS</strong></td>
					</tr>
				  	<tr align="center">
					    <td colspan="2">&nbsp;</td>
					    <td class="active">CP</td>
					    <td class="active">SP</td>
					    <td colspan="2">&nbsp;</td>
					    <td class="active">CP</td>
					    <td class="active">SP</td>
					    <td colspan="2">&nbsp;</td>
					    <td class="active">CP</td>
					    <td class="active">SP</td>
					    <td colspan="2">&nbsp;</td>
					    <td class="active">CP</td>
					    <td class="active">SP</td>
					    <td colspan="2">&nbsp;</td>
					    <td class="active">CP</td>
					    <td class="active">SP</td>
				  	</tr>
				  	<tr style="font-size:10px; " align="center">
					    <td colspan="2" class="active">1. ÓRGANOS DE LOS SENTIDOS</td>
					    <td><input type="checkbox" id="cb_1CP" ng-checked="cb_1CP" name="cb_1CP"></td>
					    <td><input type="checkbox" id="cb_1SP" ng-checked="cb_1SP" name="cb_1SP"></td>
					    <td colspan="2" class="active">3. CARDIOVASCULAR</td>
					    <td><input type="checkbox" id="cb_3CP" ng-checked="cb_3CP" name="cb_3CP"></td>
					    <td><input type="checkbox" id="cb_3SP" ng-checked="cb_3SP" name="cb_3SP"></td>
					    <td colspan="2" class="active">5. GENITAL</td>
					    <td><input type="checkbox" id="cb_5CP" ng-checked="cb_5CP" name="cb_5CP"></td>
					    <td><input type="checkbox" id="cb_5SP" ng-checked="cb_5SP" name="cb_5SP"></td>
					    <td colspan="2" class="active">7. MÚSCULO ESQUELÉTICO</td>
					    <td><input type="checkbox" id="cb_7CP" ng-checked="cb_7CP" name="cb_7CP"></td>
					    <td><input type="checkbox" id="cb_7SP" ng-checked="cb_7SP" name="cb_7SP"></td>
					    <td colspan="2" class="active">9. HEMO LINFÁTICO</td>
					    <td><input type="checkbox" id="cb_9CP" ng-checked="cb_9CP" name="cb_9CP"></td>
					    <td><input type="checkbox" id="cb_9SP" ng-checked="cb_9SP" name="cb_9SP"></td>
				  	</tr>
				 	<tr style="font-size:10px; " align="center">
					    <td colspan="2" class="active">2. RESPIRATORIO</td>
					    <td><input type="checkbox" id="cb_2CP" ng-checked="cb_2CP" name="cb_2CP"></td>
					    <td><input type="checkbox" id="cb_2SP" ng-checked="cb_2SP" name="cb_2SP"></td>
					    <td colspan="2" class="active">4. DIGESTIVOS</td>
					    <td><input type="checkbox" id="cb_4CP" ng-checked="cb_4CP" name="cb_4CP"></td>
					    <td><input type="checkbox" id="cb_4SP" ng-checked="cb_4SP" name="cb_4SP"></td>
					    <td colspan="2" class="active">6. URINARIO</td>
					    <td><input type="checkbox" id="cb_6CP" ng-checked="cb_6CP" name="cb_6CP"></td>
					    <td><input type="checkbox" id="cb_6SP" ng-checked="cb_6SP" name="cb_6SP"></td>
					    <td colspan="2" class="active">8. ENDOCRINO</td>
					    <td><input type="checkbox" id="cb_8CP" ng-checked="cb_8CP" name="cb_8CP"></td>
					    <td><input type="checkbox" id="cb_8SP" ng-checked="cb_8SP" name="cb_8SP"></td>
					    <td colspan="2" class="active">10. NERVIOSO</td>
					    <td><input type="checkbox" id="cb_10CP" ng-checked="cb_10CP" name="cb_10CP"></td>
					    <td><input type="checkbox" id="cb_10SP" ng-checked="cb_10SP" name="cb_10SP"></td>
				  	</tr>
				  	<tr height="10px">
				    	<td colspan="20"><textarea id="txtRevisOrgs" style=" border-width:0px; height:100%; width:98%" ng-model="txtRevisOrgs" name="txtRevisOrgs"></textarea></td>
				  	</tr>
				  	<tr>
				    	<td colspan="20" class="active"><strong>6. SIGNOS VITALES</strong></td>
				  	</tr>
				  	<tr align="center">
					    <td colspan="17">&nbsp;</td>
					    <td class="active">M</td>
					    <td class="active">O</td>
					    <td class="active">V</td>
				  	</tr>
				  	<tr style="font-size:10px; " align="cneter">
					    <td class="active" width="5%">TA</td>
					    <td width="5%"><input id="ta" type="text" style="border-width:0px; width:78%" value="" ng-model="ta" name="ta"></td>
					    <td class="active" width="5%">F.C</td>
					    <td width="5%"><input id="fc" type="text" style="border-width:0px; width:78%" value="" ng-model="fc" name="fc"></td>
					    <td class="active" width="5%">F.R</td>
					    <td width="5%"><input id="fr" type="text" style="border-width:0px; width:78%" value="" ng-model="fr" name="fr"></td>
					    <td class="active" width="5%">SAT O2</td>
					    <td width="5%"><input id="sato2" type="text" style="border-width:0px; width:78%" value="" ng-model="sato2" name="sato2"></td>
					    <td class="active" width="5%">TEMP BUCAL</td>
					    <td width="5%"><input id="tempbuc" type="text" style="border-width:0px; width:78%" value="" ng-model="tempbuc" name="tempbuc"></td>
					    <td class="active" width="5%">PESO</td>
					    <td width="5%"><input id="peso" type="text" style="border-width:0px; width:78%" value="" ng-model="peso" name="peso"></td>
					    <td class="active" width="5%">GLUCEMIA</td>
					    <td width="5%"><input id="glucem" type="text" style="border-width:0px; width:78%" value="" ng-model="glucem" name="glucem"></td>
					    <td class="active" width="5%">TALLA</td>
					    <td width="5%"><input id="talla" type="text" style="border-width:0px; width:78%" value="" ng-model="talla" name="talla"></td>
					    <td class="active" width="10%">ESCALA DE COMA DE GLASGOW</td>
					    <td width="3%"><input id="gm" type="text" style="border-width:0px; width:78%" value="" ng-model="gm" name="gm"></td>
					    <td width="3%"><input id="go" type="text" style="border-width:0px; width:60%" value="" ng-model="go" name="go"></td>
					    <td width="3%"><input id="gv" type="text" style="border-width:0px; width:60%" value="" ng-model="gv" name="gv"></td>
				  	</tr>
				  	<tr>
				    	<td colspan="20" class="active"><strong>7. EXAMEN FÍSICO</strong></td>
				  	</tr>
			  		<tr align="center">
					    <td colspan="2">&nbsp;</td>
					    <td class="active">CP</td>
					    <td class="active">SP</td>
					    <td colspan="2">&nbsp;</td>
					    <td class="active">CP</td>
					    <td class="active">SP</td>
					    <td colspan="2">&nbsp;</td>
					    <td class="active">CP</td>
					    <td class="active">SP</td>
					    <td colspan="2">&nbsp;</td>
					    <td class="active">CP</td>
					    <td class="active">SP</td>
					    <td colspan="2">&nbsp;</td>
					    <td class="active">CP</td>
					    <td class="active">SP</td>
					</tr>
					<tr style="font-size:10px;" align="center">
					    <td colspan="2" class="active">1.R PIEL Y FANERAS</td>
					    <td><input type="checkbox" id="cb_1RCP" ng-checked="cb_1RCP" name="cb_1RCP"></td>
					    <td><input type="checkbox" id="cb_1RSP" ng-checked="cb_1RSP" name="cb_1RSP"></td>
					    <td colspan="2" class="active">6.R BOCA</td>
					    <td><input type="checkbox" id="cb_6RCP" ng-checked="cb_6RCP" name="cb_6RCP"></td>
					    <td><input type="checkbox" id="cb_6RSP" ng-checked="cb_6RSP" name="cb_6RSP"></td>
					    <td colspan="2" class="active">11.R ABDOMEN</td>
					    <td><input type="checkbox" id="cb_11RCP" ng-checked="cb_11RCP" name="cb_11RCP"></td>
					    <td><input type="checkbox" id="cb_11RSP" ng-checked="cb_11RSP" name="cb_11RSP"></td>
					    <td colspan="2" class="active">1. S ORGANOS DE LOS SENTIDOS</td>
					    <td><input type="checkbox" id="cb_1SCP" ng-checked="cb_1SCP" name="cb_1SCP"></td>
					    <td><input type="checkbox" id="cb_1SSP" ng-checked="cb_1SSP" name="cb_1SSP"></td>
					    <td colspan="2" class="active">6. S URINARIO</td>
					    <td><input type="checkbox" id="cb_6SCP" ng-checked="cb_6SCP" name="cb_6SCP"></td>
					    <td><input type="checkbox" id="cb_6SSP" ng-checked="cb_6SSP" name="cb_6SSP"></td>
					</tr>
				  	<tr style="font-size:10px;" align="center">
					    <td colspan="2" class="active">2.R CABEZA</td>
					    <td><input type="checkbox" id="cb_2RCP" ng-checked="cb_2RCP" name="cb_2RCP"></td>
					    <td><input type="checkbox" id="cb_2RSP" ng-checked="cb_2RSP" name="cb_2RSP"></td>
					    <td colspan="2" class="active">7.R OROFARINGE</td>
					    <td><input type="checkbox" id="cb_7RCP" ng-checked="cb_7RCP" name="cb_7RCP"></td>
					    <td><input type="checkbox" id="cb_7RSP" ng-checked="cb_7RSP" name="cb_7RSP"></td>
					    <td colspan="2" class="active">12.R COLUMNA VERTEBRAL</td>
					    <td><input type="checkbox" id="cb_12RCP" ng-checked="cb_12RCP" name="cb_12RCP"></td>
					    <td><input type="checkbox" id="cb_12RSP" ng-checked="cb_12RSP" name="cb_12RSP"></td>
					    <td colspan="2" class="active">2. S RESPIRATORIO</td>
					    <td><input type="checkbox" id="cb_2SCP" ng-checked="cb_2SCP" name="cb_2SCP"></td>
					    <td><input type="checkbox" id="cb_2SSP" ng-checked="cb_2SSP" name="cb_2SSP"></td>
					    <td colspan="2" class="active">7. S MÚSCULO ESQUELÉTICO</td>
					    <td><input type="checkbox" id="cb_7SCP" ng-checked="cb_7SCP" name="cb_7SCP"></td>
					    <td><input type="checkbox" id="cb_7SSP" ng-checked="cb_7SSP" name="cb_7SSP"></td>
				  	</tr>
					<tr style="font-size:10px;" align="center">
					    <td colspan="2" class="active">3.R OJOS</td>
					    <td><input type="checkbox" id="cb_3RCP" ng-checked="cb_3RCP" name="cb_3RCP"></td>
					    <td><input type="checkbox" id="cb_3RSP" ng-checked="cb_3RSP" name="cb_3RSP"></td>
					    <td colspan="2" class="active">8.R CUELLO</td>
					    <td><input type="checkbox" id="cb_8RCP" ng-checked="cb_8RCP" name="cb_8RCP"></td>
					    <td><input type="checkbox" id="cb_8RSP" ng-checked="cb_8RSP" name="cb_8RSP"></td>
					    <td colspan="2" class="active">13.R INGLE-PERINE</td>
					    <td><input type="checkbox" id="cb_13RCP" ng-checked="cb_13RCP" name="cb_13RCP"></td>
					    <td><input type="checkbox" id="cb_13RSP" ng-checked="cb_13RSP" name="cb_13RSP"></td>
					    <td colspan="2" class="active">3. S CARDIOVASCULAR</td>
					    <td><input type="checkbox" id="cb_3SCP" ng-checked="cb_3SCP" name="cb_3SCP"></td>
					    <td><input type="checkbox" id="cb_3SSP" ng-checked="cb_3SSP" name="cb_3SSP"></td>
					    <td colspan="2" class="active">8.S ENDOCRINO</td>
					    <td><input type="checkbox" id="cb_8SCP" ng-checked="cb_8SCP" name="cb_8SCP"></td>
					    <td><input type="checkbox" id="cb_8SSP" ng-checked="cb_8SSP" name="cb_8SSP"></td>
					</tr>
					<tr style="font-size:10px;" align="center">
					    <td colspan="2" class="active">4.R OIDOS</td>
					    <td><input type="checkbox" id="cb_4RCP" ng-checked="cb_4RCP" name="cb_4RCP"></td>
					    <td><input type="checkbox" id="cb_4RSP" ng-checked="cb_4RSP" name="cb_4RSP"></td>
					    <td colspan="2" class="active">9.R AXILAS MAMAS</td>
					    <td><input type="checkbox" id="cb_9RCP" ng-checked="cb_9RCP" name="cb_9RCP"></td>
					    <td><input type="checkbox" id="cb_9RSP" ng-checked="cb_9RSP" name="cb_9RSP"></td>
					    <td colspan="2" class="active">14.R MIEMBROS SUPERIORES</td>
					    <td><input type="checkbox" id="cb_14RCP" ng-checked="cb_14RCP" name="cb_14RCP"></td>
					    <td><input type="checkbox" id="cb_14RSP" ng-checked="cb_14RSP" name="cb_14RSP"></td>
					    <td colspan="2" class="active">4. S DIGESTIVOS</td>
					    <td><input type="checkbox" id="cb_4SCP" ng-checked="cb_4SCP" name="cb_4SCP"></td>
					    <td><input type="checkbox" id="cb_4SSP" ng-checked="cb_4SSP" name="cb_4SSP"></td>
					    <td colspan="2" class="active">9. S HEMOLINFÁTICOS</td>
					    <td><input type="checkbox" id="cb_9SCP" ng-checked="cb_9SCP" name="cb_9SCP"></td>
					    <td><input type="checkbox" id="cb_9SSP" ng-checked="cb_9SSP" name="cb_9SSP"></td>
					</tr>
					<tr style="font-size:10px;" align="center">
					    <td colspan="2" class="active">5.R NARIZ</td>
					    <td><input type="checkbox" id="cb_5RCP" ng-checked="cb_5RCP" name="cb_5RCP"></td>
					    <td><input type="checkbox" id="cb_5RSP" ng-checked="cb_5RSP" name="cb_5RSP"></td>
					    <td colspan="2" class="active">10.R TORAX</td>
					    <td><input type="checkbox" id="cb_10RCP" ng-checked="cb_10RCP" name="cb_10RCP"></td>
					    <td><input type="checkbox" id="cb_10RSP" ng-checked="cb_10RSP" name="cb_10RSP"></td>
					    <td colspan="2" class="active">15.R MIEMBROS</td>
					    <td><input type="checkbox" id="cb_15RCP" ng-checked="cb_15RCP" name="cb_15RCP"></td>
					    <td><input type="checkbox" id="cb_15RSP" ng-checked="cb_15RSP" name="cb_15RSP"></td>
					    <td colspan="2" class="active">5.S GENITAL</td>
					    <td><input type="checkbox" id="cb_5sCP" ng-checked="cb_5sCP" name="cb_5sCP"></td>
					    <td><input type="checkbox" id="cb_5sSP" ng-checked="cb_5sSP" name="cb_5sSP"></td>
					    <td colspan="2" class="active">10.S NEUROLÓGICO</td>
					    <td><input type="checkbox" id="cb_10sCP" ng-checked="cb_10sCP" name="cb_10sCP"></td>
					    <td><input type="checkbox" id="cb_10sSP" ng-checked="cb_10sSP" name="cb_10sSP"></td>
					</tr>
					<tr height="10px">
					    <td colspan="20"><textarea id="txtExaFisico" style=" border-width:0px; height:100%; width:98%" ng-model="txtExaFisico" name="txtExaFisico"></textarea></td>
					</tr>
				 	<tr>
				    	<td colspan="20" class="active"><strong>8. DIAGNÓSTICO</strong></td>
				 	</tr>
				  	<tr align="center">
					    <td colspan="8">DESCRIPCIÓN</td>
					    <td class="active">CIE</td>
					    <td class="active">PRE</td>
					    <td class="active">DEF</td>
					    <td colspan="6">DESCRIPCIÓN</td>
					    <td class="active">CIE</td>
					    <td class="active">PRE</td>
					    <td class="active">DEF</td>
				  	</tr>
					<tr align="center">
					    <td class="active">1</td>
					    <td colspan="7">

					    	<input type="text" class="typeahead " id="t1" style="border-width:0px; width:80%" value="" ng-model="txtCie1" name="txtCie1">
						    <!--a  onclick="verDiagnostico(3)" data-toggle="modal" data-target="#modalCie" href="#myModal"  class="btn btn-xs btn-info" role="button"><i class="glyphicon glyphicon-plus-sign"></i></a-->
						    <a  onclick="deleteDiagnostico(this.id)"  href="#myModal" id="d1" data-toggle="modal" class="btn btn-xs btn-danger menos" role="button"><i class="glyphicon glyphicon-minus-sign"></i></a>
					    </td>
					    <td style="width:8%">
					    	<input type="text" id="c1" class="typeaheadCodigo" style="border-width:0px; width:70%" value="" ng-model="txtCod1" name="txtCod1">
					    </td>
					    <td>
					    	<input type="checkbox" id="cb_1PRE" ng-checked="cb_1PRE" name="cb_1PRE">
					    </td>
					    <td>
					    	<input type="checkbox" id="cb_1DEF" ng-checked="cb_1DEF" name="cb_1DEF">
					    </td>
					    <td class="active">4</td>
					    <td colspan="5">
					    	<input type="text" id="t4" class="typeahead " style="border-width:0px; width:80%" value="" ng-model="txtCie4" name="txtCie4">
						    <!--a  onclick="verDiagnostico(6)" href="#myModal" data-toggle="modal" class="btn btn-xs btn-info" role="button"><i class="glyphicon glyphicon-plus-sign"></i></a-->
						    <a  onclick="deleteDiagnostico(this.id)" href="#myModal" id="d4" data-toggle="modal" class="btn btn-xs btn-danger menos" role="button"><i class="glyphicon glyphicon-minus-sign"></i></a>
					    </td>
					    <td style="width:8%">
					    	<input type="text" id="c4" class="typeaheadCodigo" style="border-width:0px; width:70%" value="" ng-model="txtCod4" name="txtCod4">
					    </td>
					    <td>
					    	<input type="checkbox" id="cb_4PRE" ng-checked="cb_4PRE" name="cb_4PRE">
					    </td>
					    <td>
					    	<input type="checkbox" id="cb_4DEF" ng-checked="cb_4DEF" name="cb_4DEF">
					    </td>
					</tr>
					<tr align="center">
					    <td class="active">2</td>
					    <td colspan="7">
					    	<input type="text" id="t2" class="typeahead" style="border-width:0px; width:80%" value="" ng-model="txtCie2" name="txtCie2">
					    	<!--a  onclick="verDiagnostico(4)" href="#myModal" data-toggle="modal" class="btn btn-xs btn-info" role="button"><i class="glyphicon glyphicon-plus-sign"></i></a-->
						    <a  onclick="deleteDiagnostico(this.id)" href="#myModal" id="d2" data-toggle="modal" class="btn btn-xs btn-danger menos" role="button"><i class="glyphicon glyphicon-minus-sign"></i></a>
					    </td>
					    <td>
					    	<input type="text" id="c2"  class="typeaheadCodigo" style="border-width:0px; width:70%" value="" ng-model="txtCod2" name="txtCod2">
					    </td>
					    <td>
					    	<input type="checkbox" id="cb_2PRE" ng-checked="cb_2PRE" name="cb_2PRE">
					    </td>
					    <td>
					    	<input type="checkbox" id="cb_2DEF" ng-checked="cb_2DEF" name="cb_2DEF">
					    </td>
					    <td class="active">5</td>
					    <td colspan="5">
					    	<input type="text" id="t5" class="typeahead" style="border-width:0px; width:80%" value="" ng-model="txtCie5" name="txtCie5">
					    	<!--a  onclick="verDiagnostico(7)" href="#myModal" data-toggle="modal" class="btn btn-xs btn-info" role="button"><i class="glyphicon glyphicon-plus-sign"></i></a-->
						    <a  onclick="deleteDiagnostico(this.id)" href="#myModal" id="d5" data-toggle="modal" class="btn btn-xs btn-danger menos" role="button"><i class="glyphicon glyphicon-minus-sign"></i></a>
					    </td>
					    <td>
					    	<input type="text" id="c5" class="typeaheadCodigo" style="border-width:0px; width:70%" value="" ng-model="txtCod5" name="txtCod5"></td>
					    <td>
					    	<input type="checkbox" id="cb_5PRE" ng-checked="cb_5PRE" name="cb_5PRE">
					    </td>
					    <td>
					    	<input type="checkbox" id="cb_5DEF" ng-checked="cb_5DEF" name="cb_5DEF">
					    </td>
					</tr>
					<tr align="center">
					    <td class="active">3</td>
					    <td colspan="7">
					    	<input type="text" id="t3" class="typeahead" style="border-width:0px; width:80%" value="" ng-model="txtCie3" name="txtCie3">
					    	<!--a  onclick="verDiagnostico(5)" href="#myModal" data-toggle="modal" class="btn btn-xs btn-info" role="button"><i class="glyphicon glyphicon-plus-sign"></i></a-->
						    <a  onclick="deleteDiagnostico(this.id)" href="#myModal" id="d3" data-toggle="modal" class="btn btn-xs btn-danger menos" role="button"><i class="glyphicon glyphicon-minus-sign"></i></a>						      
						</td>
					    <td>
					    	<input type="text" id="c3" class="typeaheadCodigo" style="border-width:0px; width:70%" value="" ng-model="txtCod3" name="txtCod3">
					    </td>
					    <td>
					    	<input type="checkbox" id="cb_3PRE" ng-checked="cb_3PRE" name="cb_3PRE">
					    </td>
					    <td>
					    	<input type="checkbox" id="cb_3DEF" ng-checked="cb_3DEF" name="cb_3DEF">
					    </td>
					    <td class="active">6</td>
					    <td colspan="5">
					    	<input type="text" id="t6" class="typeahead" style="border-width:0px; width:80%" value="" ng-model="txti3" name="txti3">
					    	<!--a  onclick="verDiagnostico(8)" href="#myModal" data-toggle="modal" class="btn btn-xs btn-info" role="button"><i class="glyphicon glyphicon-plus-sign"></i></a-->
						    <a  onclick="deleteDiagnostico(this.id)" href="#myModal" id="d6" data-toggle="modal" class="btn btn-xs btn-danger menos" role="button"><i class="glyphicon glyphicon-minus-sign"></i></a>
					      	
					    </td>
					    <td>
					    	<input type="text" id="c6" class="typeaheadCodigo" style="border-width:0px; width:70%" value="" ng-model="txtic3" name="txtic3">
					    </td>
					    <td>
					    	<input type="checkbox" id="cb_6PRE" ng-checked="cb_6PRE" name="cb_6PRE">
					    </td>
					    <td>
					    	<input type="checkbox" id="cb_6DEF" ng-checked="cb_6DEF" name="cb_6DEF">
					    </td>
					</tr>
					<tr>
					    <td colspan="20" class="active">&nbsp;</td>
					</tr>
					<!--tr height="10px">
					    <td colspan="20"><textarea id="txtPlanTrat" class="typeahead" style=" border-width:0px; height:100%; width:98%" ng-model="txtPlanTrat" name="txtPlanTrat"></textarea></td>
					</tr-->
				   	<tr>
				    	<td colspan="20" class="active"><strong>9. PLANES DE DIAGNÓSTICO, TERAPEÚTICOS Y EDUCACIONALES</strong></td>
				  	</tr>
					<tr align="center">
					    <td colspan="12"><textarea id="txtPlanDiagnostico" class="typeahead form-control" style=" border-width:0px; height:100%; width:98%" ng-model="txtPlanDiagnostico" name="txtPlanDiagnostico"></textarea>
					    </td>
					    @if(Session::get('operation') == 'guardado' || !empty($recetas[0]))
					    <td>
					    	<a   id="imprimir_r" target="_blank" data-toggle="modal" class="btn btn-xs btn-info imprimir " role="button"><i class="fa fa-print "></i> Imprimir Receta</a>
					    	<input type="hidden" name="id" id="id">
					    </td>
					    @endif
	
					    @if(!empty($recetas[0]))
					    	
					    <td colspan="3">

					    	<div>Lista de recetas</div>
					    	
					    </td>

					    <td colspan="2" >
					    <div class="pre-scrollable" style="max-height: 70px">
					    @foreach($recetas as $receta)
					    	<a  onclick="verReceta(this.id)"  id="{{$receta->id}}" data-toggle="modal" class="btn btn-xs btn-default  " role="button"><i class="fa fa-reply "></i>&nbsp;&nbsp;{{$receta->created_at}}</a>
					    	
					    @endforeach
					    </div>
					    </td>

					    @endif
					</tr>
					<tr height="50PX" align="center">
					    <td colspan="2" class="active" style="font-size:12px;">FECHA</td>
			    		<td colspan="4">
				            <div class="input-group date">
				              <input  data-date-format="yyyy-mm-dd"   class="form-control" id="txtFechaAgendDoct"  ng-model="txtFechaAgendDoct" name="txtFechaAgendDoct">
				              <div class="input-group-addon">
				                  <span class="glyphicon glyphicon-th"></span>
				              </div>
				            </div>
	        			</td>
			    		<td colspan="2" class="active" style="font-size:12px;">NOMBRE DEL PROFESIONAL</td>
			    		<td colspan="4"><input type="text" style="border-width:0px; width:95%" value='{{$medico->nombre." ".$medico->apellido}}' id="nombremedico" ng-model="nombremedico" name="nombremedico"></td>
			    		<td colspan="2" class="active" style="font-size:12px;">FIRMA</td>
			    		<td colspan="6"><input type="text" style="border-width:0px; width:95%" value="" id="firmaDoc" ng-model="firmaDoc" name="firmaDoc"></td>
			  		</tr>
				</tbody>
			</table>
		</form>
	</div>
	<div class = "panel-footer">
	    <div >
          <input class = "btn btn-success imprimir" id="btnSave" type = "button" style = "margin-left: 10px" value = "Guardar"ng-click = "toggle('{{$operation}}')">
          @if($operation == 'update')
          <input class = "btn btn-danger" id="btnSave" type = "button" style = "margin-left: 10px" value = "Finalizar"ng-click = "toggle('finalizar')">
          @endif
	    </div>
	</div>
</div>


<!-- HTML del Modal de Loading-->

<div class = "modal_l" style = "display: none" align = "center">
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
		

	// se carga la última receta que se creo en la consulta
	var descripcion =$("#txtPlanDiagnostico").val();
	descripcion=JSON.stringify(descripcion);
	descripcion= descripcion.replace(/"/g, "");
    descripcion= descripcion.replace(/\r\n|\r|\n|\n/g, "\n");
	descripcion = descripcion.replace('/','@');
	descripcion = descripcion.replace('\\n','<');
	console.log(descripcion);
	$("#imprimir_r").attr("href",URL_BASE+"receta/print/{{$consulta->id}}/"+descripcion);

});

function verReceta(id){
	var path = URL_BASE+"receta/"+id;
    $.get(path, function (data) {
    	textarea_line1 = data.descripcion;
    	textarea_line =  (textarea_line1.split('\\n')).join('\n');    	
    	$("#txtPlanDiagnostico").val(textarea_line);
    	var descripcion =$("#txtPlanDiagnostico").val();
    	console.log(textarea_line1);
    	descripcion = textarea_line1.replace('/','@');
    	descripcion = descripcion.replace('\\n','<');
    	console.log(descripcion);
    	$("#imprimir_r").attr("href",URL_BASE+"receta/print/{{$consulta->id}}/"+descripcion);
    });              

}

function printReceta(){
	var path = URL_BASE+"receta/print/{{$consulta->id}}/"+$("#txtPlanDiagnostico").val();
    $.get(path, function (data) {
    	
    });         
}

function deleteDiagnostico(id){
	
	var id = id.substring(2, 1);
            	
    swal({
  		title: "Eliminar Diagnóstico "+$("#c"+id).val(),
		text: "¿Realmente desea eliminar este diagnóstico? <br/><br/> <p style='color:black'>"+$("#t"+id).val()+"</p>",
		type: "warning",
		html:true,
		showCancelButton: true,
		confirmButtonClass: "btn-danger",
		confirmButtonText: "OK",
		closeOnConfirm: true,
		showLoaderOnConfirm: true
	},
	function(){
		$("#t"+id).val('');
		$("#c"+id).val('');
		$('#d'+id).removeAttr('style');
	});

}

var vademecums =  "{{$allVademecum}}";

vademecums=vademecums.replace(/&quot;/g,'"');

vademecums = JSON.stringify(eval("(" + vademecums + ")"));
vademecums= JSON.parse(vademecums);
var jsonVademecum = [];
            
jQuery.each(vademecums, function(i, val) {
	jsonVademecum.push(val.descripcion);	 
});


var path = "{{ route('autocomplete') }}";
$('input.typeahead').typeahead({
    source:  function (query, process) {
    return $.get(path, { query: query }, function (data) {
            return process(data);
        });
    }
});

var pathCodigo = "{{ route('autocompleteCodigo') }}";
    $('input.typeaheadCodigo').typeahead({
        source:  function (query, process) {
        return $.get(pathCodigo, { query: query }, function (data) {
                return process(data);
            });
        }
    });    
  
 $('#txtPlanDiagnostico').textcomplete([{
    match: /(^|\b)(\w{1,})$/,
    search: function (term, callback) {
        
        callback($.map(jsonVademecum, function (word) {

            return word.indexOf(term.toUpperCase()) === 0 ? word : null;
        }));
    },
    replace: function (word) {
        return word + ' ';
    }
}]);
$(document).on('ajaxComplete ajaxReady ready', function () {
        $('ul.pagination li a').off('click').on('click', function (e) {
            $("#modalCie").modal('show');
            $('#modalCie').load($(this).attr('href'));
            $('#modalLgTitle').html($(this).attr('title'));
            //e.preventDefault();
        });
    $('#txtFechaAgendDoct').datepicker({
       autoclose: true,
       language: "es",
    }).trigger('blur');

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

  app.controller("controllerConsulta", function ($scope, $http, API_URL)
  {

  //Como inician los campos

  $scope.init = function ()
  {
  	





    $("#volver").attr("href","{{ url('/admin/consultas?m=38') }}");
    //if("{{$paciente_ingresado}}"){
    	
    
	    if("{{$operation == 'update'}}"){
	      	$("#id_medico").val("{{$consulta->id_medico}}").trigger("change");
	     	$("#id_paciente").val("{{$consulta->id_paciente}}").trigger("change");
	    }else{
	      	$("#id_medico").val("").trigger("change");
	    	$("#id_medico").val("{{$medico->id}}");
	      	$("#id_paciente").val("{{$paciente->id}}");
	      //$("#id_paciente").val("").trigger("change");	      
	    }
	    
   // }
   
    $scope.id_paciente = "{{($operation == 'update')?$consulta->id_paciente :$paciente->id}}";
    $scope.id_medico = "{{($operation == 'update')?$consulta->id_medico :$medico->id}}";
    $scope.motivoConsA = "{{($operation == 'update')?$consulta->motivoConsA :''}}";
    $scope.motivoConsC = "{{($operation == 'update')?$consulta->motivoConsC :''}}";
    $scope.motivoConsB = "{{($operation == 'update')?$consulta->motivoConsB :''}}";
    $scope.motivoConsD = "{{($operation == 'update')?$consulta->motivoConsD :''}}";
    $scope.cb_vacunas = "{{($operation == 'update')?$consulta->cb_vacunas :''}}";
    $scope.cb_alergica = "{{($operation == 'update')?$consulta->cb_alergica :''}}";
    $scope.cb_neurologica = "{{($operation == 'update')?$consulta->cb_neurologica :''}}";
    $scope.cb_traumatologica = "{{($operation == 'update')?$consulta->cb_traumatologica :''}}";
    $scope.cb_tendsexual = "{{($operation == 'update')?$consulta->cb_tendsexual :''}}";
    $scope.cb_actsexual = "{{($operation == 'update')?$consulta->cb_actsexual :''}}";
    $scope.cb_perinatal = "{{($operation == 'update')?$consulta->cb_perinatal :''}}";
    $scope.cb_cardiaca = "{{($operation == 'update')?$consulta->cb_cardiaca :''}}";
    $scope.cb_metabolica = "{{($operation == 'update')?$consulta->cb_metabolica :''}}";
    $scope.cb_quirurgica = "{{($operation == 'update')?$consulta->cb_quirurgica :''}}";
    $scope.cb_riesgosocial = "{{($operation == 'update')?$consulta->cb_riesgosocial :''}}";
    $scope.cb_dietahabitos = "{{($operation == 'update')?$consulta->cb_dietahabitos :''}}";
    $scope.cb_infancia = "{{($operation == 'update')?$consulta->cb_infancia :''}}";
    $scope.cb_respiratoria = "{{($operation == 'update')?$consulta->cb_respiratoria :''}}";
    $scope.cb_hemolinf = "{{($operation == 'update')?$consulta->cb_hemolinf :''}}";
    $scope.cb_mental = "{{($operation == 'update')?$consulta->cb_mental :''}}";
    $scope.cb_riesgolaboral = "{{($operation == 'update')?$consulta->cb_riesgolaboral :''}}";
    $scope.cb_religioncultura = "{{($operation == 'update')?$consulta->cb_religioncultura :''}}";
    $scope.cb_adolecente = "{{($operation == 'update')?$consulta->cb_adolecente :''}}";
    $scope.cb_digestiva = "{{($operation == 'update')?$consulta->cb_digestiva :''}}";
    $scope.cb_urinaria = "{{($operation == 'update')?$consulta->cb_urinaria :''}}";
    $scope.cb_tsexual = "{{($operation == 'update')?$consulta->cb_tsexual :''}}";
    $scope.cb_riesgofamiliar = "{{($operation == 'update')?$consulta->cb_riesgofamiliar :''}}";
    $scope.cb_otro = "{{($operation == 'update')?$consulta->cb_otro :''}}";
    $scope.cb_cardiopatia = "{{($operation == 'update')?$consulta->cb_cardiopatia :''}}";
    $scope.cb_diabetes = "{{($operation == 'update')?$consulta->cb_diabetes :''}}";
    $scope.cb_enfvasculares = "{{($operation == 'update')?$consulta->cb_enfvasculares :''}}";
    $scope.cb_hta = "{{($operation == 'update')?$consulta->cb_hta :''}}";
    $scope.cb_cancer = "{{($operation == 'update')?$consulta->cb_cancer :''}}";
    $scope.cb_tuberculosis = "{{($operation == 'update')?$consulta->cb_tuberculosis :''}}";
    $scope.cb_enfenfmental = "{{($operation == 'update')?$consulta->cb_enfenfmental :''}}";
    $scope.cb_enfinfecciosa = "{{($operation == 'update')?$consulta->cb_enfinfecciosa :''}}";
    $scope.cb_malformacion = "{{($operation == 'update')?$consulta->cb_malformacion :''}}";
    $scope.cb_afotro = "{{($operation == 'update')?$consulta->cb_afotro :''}}";
    $scope.cb_1CP = "{{($operation == 'update')?$consulta->cb_1CP :''}}";
    $scope.cb_1SP = "{{($operation == 'update')?$consulta->cb_1SP :''}}";
    $scope.cb_3CP = "{{($operation == 'update')?$consulta->cb_3CP :''}}";
    $scope.cb_3SP = "{{($operation == 'update')?$consulta->cb_3SP :''}}";
    $scope.cb_5CP = "{{($operation == 'update')?$consulta->cb_5CP :''}}";
    $scope.cb_5SP = "{{($operation == 'update')?$consulta->cb_5SP :''}}";
    $scope.cb_7CP = "{{($operation == 'update')?$consulta->cb_7CP :''}}";
    $scope.cb_7SP = "{{($operation == 'update')?$consulta->cb_7SP :''}}";
    $scope.cb_9CP = "{{($operation == 'update')?$consulta->cb_9CP :''}}";
    $scope.cb_9SP = "{{($operation == 'update')?$consulta->cb_9SP :''}}";
    $scope.cb_2CP = "{{($operation == 'update')?$consulta->cb_2CP :''}}";
    $scope.cb_2SP = "{{($operation == 'update')?$consulta->cb_2SP :''}}";
    $scope.cb_4CP = "{{($operation == 'update')?$consulta->cb_4CP :''}}";
    $scope.cb_4SP = "{{($operation == 'update')?$consulta->cb_4SP :''}}";
    $scope.cb_6CP = "{{($operation == 'update')?$consulta->cb_6CP :''}}";
    $scope.cb_6SP = "{{($operation == 'update')?$consulta->cb_6SP :''}}";
    $scope.cb_8CP = "{{($operation == 'update')?$consulta->cb_8CP :''}}";
    $scope.cb_8SP = "{{($operation == 'update')?$consulta->cb_8SP :''}}";
    $scope.cb_10CP = "{{($operation == 'update')?$consulta->cb_10CP :''}}";
    $scope.cb_10SP = "{{($operation == 'update')?$consulta->cb_10SP :''}}";
    $scope.ta = "{{($operation == 'update')?$consulta->ta :''}}";
    $scope.fc = "{{($operation == 'update')?$consulta->fc :''}}";
    $scope.fr = "{{($operation == 'update')?$consulta->fr :''}}";
    $scope.sato2 = "{{($operation == 'update')?$consulta->sato2 :''}}";
    $scope.tempbuc = "{{($operation == 'update')?$consulta->tempbuc :''}}";
    $scope.peso = "{{($operation == 'update')?$consulta->peso :''}}";
    $scope.glucem = "{{($operation == 'update')?$consulta->glucem :''}}";
    $scope.talla = "{{($operation == 'update')?$consulta->talla :''}}";
    $scope.gm = "{{($operation == 'update')?$consulta->gm :''}}";
    $scope.go = "{{($operation == 'update')?$consulta->go :''}}";
    $scope.gv = "{{($operation == 'update')?$consulta->gv :''}}";
    $scope.cb_1RCP = "{{($operation == 'update')?$consulta->cb_1RCP :''}}";
    $scope.cb_1RSP = "{{($operation == 'update')?$consulta->cb_1RSP :''}}";
    $scope.cb_6RCP = "{{($operation == 'update')?$consulta->cb_6RCP :''}}";
    $scope.cb_6RSP = "{{($operation == 'update')?$consulta->cb_6RSP :''}}";
    $scope.cb_11RCP = "{{($operation == 'update')?$consulta->cb_11RCP :''}}";
    $scope.cb_11RSP = "{{($operation == 'update')?$consulta->cb_11RSP :''}}";
    $scope.cb_1SCP = "{{($operation == 'update')?$consulta->cb_1SCP :''}}";
    $scope.cb_1SSP = "{{($operation == 'update')?$consulta->cb_1SSP :''}}";
    $scope.cb_6SCP = "{{($operation == 'update')?$consulta->cb_6SCP :''}}";
    $scope.cb_6SSP = "{{($operation == 'update')?$consulta->cb_6SSP :''}}";
    $scope.cb_2RCP = "{{($operation == 'update')?$consulta->cb_2RCP :''}}";
    $scope.cb_2RSP = "{{($operation == 'update')?$consulta->cb_2RSP :''}}";
    $scope.cb_7RCP = "{{($operation == 'update')?$consulta->cb_7RCP :''}}";
    $scope.cb_7RSP = "{{($operation == 'update')?$consulta->cb_7RSP :''}}";
    $scope.cb_12RCP = "{{($operation == 'update')?$consulta->cb_12RCP :''}}";
    $scope.cb_12RSP = "{{($operation == 'update')?$consulta->cb_12RSP :''}}";
    $scope.cb_2SCP = "{{($operation == 'update')?$consulta->cb_2SCP :''}}";
    $scope.cb_2SSP = "{{($operation == 'update')?$consulta->cb_2SSP :''}}";
    $scope.cb_7SCP = "{{($operation == 'update')?$consulta->cb_7SCP :''}}";
    $scope.cb_7SSP = "{{($operation == 'update')?$consulta->cb_7SSP :''}}";
    $scope.cb_3RCP = "{{($operation == 'update')?$consulta->cb_3RCP :''}}";
    $scope.cb_3RSP = "{{($operation == 'update')?$consulta->cb_3RSP :''}}";
    $scope.cb_8RCP = "{{($operation == 'update')?$consulta->cb_8RCP :''}}";
    $scope.cb_8RSP = "{{($operation == 'update')?$consulta->cb_8RSP :''}}";

    $scope.cb_13RCP = "{{($operation == 'update')?$consulta->cb_13RCP :''}}";
    $scope.cb_13RSP = "{{($operation == 'update')?$consulta->cb_13RSP :''}}";
    $scope.cb_3SCP = "{{($operation == 'update')?$consulta->cb_3SCP :''}}";
    $scope.cb_3SSP = "{{($operation == 'update')?$consulta->cb_3SSP :''}}";
    $scope.cb_8SCP = "{{($operation == 'update')?$consulta->cb_8SCP :''}}";
    $scope.cb_8SSP = "{{($operation == 'update')?$consulta->cb_8SSP :''}}";
    $scope.cb_4RCP = "{{($operation == 'update')?$consulta->cb_4RCP :''}}";
    $scope.cb_4RSP = "{{($operation == 'update')?$consulta->cb_4RSP :''}}";
    $scope.cb_9RCP = "{{($operation == 'update')?$consulta->cb_9RCP :''}}";
    $scope.cb_9RSP = "{{($operation == 'update')?$consulta->cb_9RSP :''}}";
    $scope.cb_14RCP = "{{($operation == 'update')?$consulta->cb_14RCP :''}}";
    $scope.cb_14RSP = "{{($operation == 'update')?$consulta->cb_14RSP :''}}";
    $scope.cb_4SCP = "{{($operation == 'update')?$consulta->cb_4SCP :''}}";
    $scope.cb_4SSP = "{{($operation == 'update')?$consulta->cb_4SSP :''}}";
    $scope.cb_9SCP = "{{($operation == 'update')?$consulta->cb_9SCP :''}}";
    $scope.cb_9SSP = "{{($operation == 'update')?$consulta->cb_9SSP :''}}";
    $scope.cb_5RCP = "{{($operation == 'update')?$consulta->cb_5RCP :''}}";
    $scope.cb_5RSP = "{{($operation == 'update')?$consulta->cb_5RSP :''}}";
    $scope.cb_10RCP = "{{($operation == 'update')?$consulta->cb_10RCP :''}}";
    $scope.cb_10RSP = "{{($operation == 'update')?$consulta->cb_10RSP :''}}";
    $scope.cb_15RCP = "{{($operation == 'update')?$consulta->cb_15RCP :''}}";
    $scope.cb_15RSP = "{{($operation == 'update')?$consulta->cb_15RSP :''}}";
    $scope.cb_5sCP = "{{($operation == 'update')?$consulta->cb_5sCP :''}}";
    $scope.cb_5sSP = "{{($operation == 'update')?$consulta->cb_5sSP :''}}";
    $scope.cb_10sCP = "{{($operation == 'update')?$consulta->cb_10sCP :''}}";
    $scope.cb_10sSP = "{{($operation == 'update')?$consulta->cb_10sSP :''}}";
    $scope.txtCie1 = "{{($operation == 'update')?$consulta->txtCie1 :''}}";
    $scope.txtCod1 = "{{($operation == 'update')?$consulta->txtCod1 :''}}";
    $scope.cb_1PRE = "{{($operation == 'update')?$consulta->cb_1PRE :''}}";
    $scope.cb_1DEF = "{{($operation == 'update')?$consulta->cb_1DEF :''}}";
    $scope.txtCie4 = "{{($operation == 'update')?$consulta->txtCie4 :''}}";
    $scope.txtCod4 = "{{($operation == 'update')?$consulta->txtCod4 :''}}";
    $scope.cb_4PRE = "{{($operation == 'update')?$consulta->cb_4PRE :''}}";
    $scope.cb_4DEF = "{{($operation == 'update')?$consulta->cb_4DEF :''}}";
    $scope.txtCie2 = "{{($operation == 'update')?$consulta->txtCie2 :''}}";
    $scope.txtCod2 = "{{($operation == 'update')?$consulta->txtCod2 :''}}";
    $scope.cb_2PRE = "{{($operation == 'update')?$consulta->cb_2PRE :''}}";
    $scope.cb_2DEF = "{{($operation == 'update')?$consulta->cb_2DEF :''}}";
    $scope.txtCie5 = "{{($operation == 'update')?$consulta->txtCie5 :''}}";
    $scope.txtCod5 = "{{($operation == 'update')?$consulta->txtCod5 :''}}";
    $scope.cb_5PRE = "{{($operation == 'update')?$consulta->cb_5PRE :''}}";
    $scope.cb_5DEF = "{{($operation == 'update')?$consulta->cb_5DEF :''}}";
    $scope.txtCie3 = "{{($operation == 'update')?$consulta->txtCie3 :''}}";
    $scope.txtCod3 = "{{($operation == 'update')?$consulta->txtCod3 :''}}";
    $scope.cb_3PRE = "{{($operation == 'update')?$consulta->cb_3PRE :''}}";

    $scope.cb_3DEF = "{{($operation == 'update')?$consulta->cb_3DEF :''}}";
    $scope.txti3 = "{{($operation == 'update')?$consulta->txti3 :''}}";
    $scope.txtic3 = "{{($operation == 'update')?$consulta->txtic3 :''}}";
    $scope.cb_6PRE = "{{($operation == 'update')?$consulta->cb_6PRE :''}}";
    $scope.cb_6DEF = "{{($operation == 'update')?$consulta->cb_6DEF :''}}";
    $scope.txtFechaAgendDoct = "{{($operation == 'update')?$consulta->txtFechaAgendDoct :''}}";
    $scope.nombremedico = "{{$medico->nombre." ".$medico->apellido}}";
    $scope.firmaDoc = "{{($operation == 'update')?$consulta->firmaDoc :''}}";
    $scope.txtAntePer = "{{($operation == 'update')?$consulta->txtAntePer :''}}";

    $scope.txtNoRef = "{{($operation == 'update')?$consulta->txtNoRef :''}}";
    $scope.txtProbActual = "{{($operation == 'update')?$consulta->txtProbActual :''}}";
    $scope.txtRevisOrgs = "{{($operation == 'update')?$consulta->txtRevisOrgs :''}}";
    $scope.txtExaFisico = "{{($operation == 'update')?$consulta->txtExaFisico :''}}";
    $scope.txtPlanTrat = "{{($operation == 'update')?$consulta->txtPlanTrat :''}}";
    $scope.txtPlanDiagnostico = "{{($operation == 'update')?$consulta->txtPlanDiagnostico :''}}";


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
        console.log($scope.serializeObject($("#form_consulta")));
        $http({
          url    : API_URL + 'consulta',
          method : 'POST',
          params : $scope.serializeObject($("#form_consulta")),
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
              closeOnConfirm: true,
              showLoaderOnConfirm: true
            },
            function(){
            	
             // $(".modal").modal('show');
              document.location.reload();
            });
          } else {
            swal("Error", "¡No se guardó!", "error");
          }
        });

        break;

      case 'update':

        $(".modal").modal('show');
         console.log($scope.serializeObject($("#form_consulta")));
        $http({
          url    : API_URL + 'consulta/{{$consulta->id}}',
          method : 'PUT',
          params : $scope.serializeObject($("#form_consulta")),
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
              closeOnConfirm: true,
              showLoaderOnConfirm: true
            },
            function(){
              $(".modal").modal('show');
            	document.location.reload();
             // window.location = "{{ url('/admin/consultas?m=38') }}";
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
