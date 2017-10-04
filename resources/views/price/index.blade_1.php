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


<p><a title="Volver" id = "volver" href=""><i class="fa fa-chevron-circle-left"></i>&nbsp; Volver a la Lista de Órdenes</a><div id="message">
</div></p>

<div class = "box" ng-app="MyApp" ng-controller="controllerLaboratorio">
    <div class = "panel-footer">
        <div class="text-right">
            <input class = "btn btn-success" id="btnSave" type = "button" style = "margin-left: 10px" value = "Guardar"ng-click = "toggle('{{$operation}}')">
        </div>
    </div>
    <div class = "box-body">
        <form id="form_laboratorio" method="POST" action="" name="form_laboratorio" >
            {{ csrf_field()}}
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="laboratorio"><a data-toggle="tab" href="#laboratorio">LABORATORIO</a></li>
                    <li class="rayox"><a data-toggle="tab" href="#rayox">RAYOS X</a></li>
                    <li class="rayox_dental"><a data-toggle="tab" href="#rayox_dental">RAYOS X DENTAL</a></li>
                </ul>
            </div>
            <div class="tab-content">

                <!--Inicio pestaña Laboratorio-->
                <div id="laboratorio" class="tab-pane fade ">
                    <div class="panel-group col-md-5 laboratorio" id="accordion_laboratorio">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="opcion" data-parent="#accordion" data-toggle="collapse" href="#hematologia">
                                        HEMATOLOGÍA</a>
                                </h4>
                            </div>
                            <div id="hematologia" class="panel-collapse collapse in">
                                <table>
                                    <tbody><tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" id="bio_h" ng-checked="bio_h" name="examenes[1]">Biometría Hemática</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="hto_hb" ng-checked="hto_hb" name="examenes[2]">Hto Hb</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="reticulocitos" ng-checked="reticulocitos" name="examenes[3]">Reticulocitos</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="sedimentacion_ves" ng-checked="sedimentacion_ves" name="examenes[4]">Sedimentación V.E.S </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="formula_leuco" ng-checked="formula_leuco" name="examenes[5]">Fórmula Leucocitaria</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="plaquetas" ng-checked="plaquetas" name="examenes[6]">Plaquetas</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline"> <input type="checkbox" class="chkExamenes" id="grupo_sanguineo" ng-checked="grupo_sanguineo" name="examenes[7]">Grupo Sanguineo</label>
                                            </td>
                                        </tr>
                                    </tbody></table>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#orina">
                                        ORINA</a>
                                </h4>
                            </div>
                            <div id="orina" class="panel-collapse collapse">
                                <table>
                                    <tbody><tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="elemental_microscopico" ng-checked="elemental_microscopico" name="examenes[8]">Elemental y Microscópico </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="gota_fresca" ng-checked="gota_fresca" name="examenes[9]">Gota Fresca</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="gram_o" ng-checked="gram_o" name="examenes[10]">Gram</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="microalbuminuria" ng-checked="microalbuminuria" name="examenes[11]">Microalbuminuria</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="proteinuria24" ng-checked="proteinuria24" name="examenes[12]"> Proteinuria 24 horas</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="depuracion_creatinina" ng-checked="depuracion_creatinina" name="examenes[13]">Depuración Creatinina</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="sodio" ng-checked="sodio" name="examenes[14]">Sodio </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="potasio" ng-checked="potasio" name="examenes[15]">Potasio</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="cloro" ng-checked="cloro" name="examenes[16]">Cloro</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="ac_urico" ng-checked="ac_urico" name="examenes[17]">Ac. Urico</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="calcio" ng-checked="calcio" name="examenes[18]">Calcio</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="fosforo" ng-checked="fosforo" name="examenes[19]">Fósforo</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="magnesio" ng-checked="magnesio" name="examenes[20]">Magnesio</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="prueba_embarazo" ng-checked="prueba_embarazo" name="examenes[21]">Prueba de embarazo</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="panel_drogas" ng-checked="panel_drogas" name="examenes[22]">Panel de drogas (abuso)</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                Otros (Orina):<br> <textarea id="txt_otros_orina" type="text" class="textarea" cols="50" rows="2" ng-model="txt_otros_orina" name="examenes[23]"></textarea>
                                            </td>
                                        </tr>
                                    </tbody></table>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#marcadoreTumorales">
                                        MARCADORES TUMORALES</a>
                                </h4>
                            </div>
                            <div id="marcadoreTumorales" class="panel-collapse collapse">
                                <table>
                                    <tbody><tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="cea_carcino_embrionario" ng-checked="cea_carcino_embrionario" name="examenes[155]"> CEA -Carcino Embrionario </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="afp_alfa_feto_proteina" ng-checked="afp_alfa_feto_proteina" name="examenes[156]"> AFP - Alfa -feto Proteína </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="psa_antigeno_prostatico_especifico" ng-checked="psa_antigeno_prostatico_especifico" name="examenes[157]"> PSA - Antígeno Prostático Específico </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="psa_libre" ng-checked="psa_libre" name="examenes[158]"> PSA libre </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="ca_125" ng-checked="ca_125" name="examenes[159]"> Ca 125 </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="ca_19_9" ng-checked="ca_19_9" name="examenes[160]"> Ca 19 -9 </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="anti_tpo" ng-checked="anti_tpo" name="examenes[161]"> Anti TPO </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="neuroenolasa_especifica" ng-checked="neuroenolasa_especifica" name="examenes[162]"> Neuroenolasa específica </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="hcgb" ng-checked="hcgb" name="examenes[163]"> HCGB </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="ca_15_3" ng-checked="ca_15_3" name="examenes[164]"> Ca 15 -3 </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="ca_72_4" ng-checked="ca_72_4" name="examenes[165]"> Ca 72 -4 </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="tiroglobulina" ng-checked="tiroglobulina" name="examenes[166]"> Tiroglobulina </label>
                                            </td>
                                        </tr>
                                    </tbody></table>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#coagulacion">
                                        COAGULACIÓN</a>
                                </h4>
                            </div>
                            <div id="coagulacion" class="panel-collapse collapse">
                                <table>
                                    <tbody><tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="tp" ng-checked="tp" name="examenes[32]">TP </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="ttp" ng-checked="ttp" name="examenes[33]">TTP</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="tiempo_trombina" ng-checked="tiempo_trombina" name="examenes[34]">Tiempo Trombina</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="inr" ng-checked="inr" name="examenes[35]">INR </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="tiempo_coagulacion" ng-checked="tiempo_coagulacion" name="examenes[36]">Tiempo Coagulación</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="fibrinogeno" ng-checked="fibrinogeno" name="examenes[37]">Fibrinógeno</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="tiempo_hemorragia" ng-checked="tiempo_hemorragia" name="examenes[38]">Tiempo Hemorragia</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="antitrombina_iii" ng-checked="antitrombina_iii" name="examenes[39]">Antitrombina III </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="coombs_directo" ng-checked="coombs_directo" name="examenes[40]">Coombs Directo </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="coombs_indirecto" ng-checked="coombs_indirecto" name="examenes[41]">Coombs Indirecto</label>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="retraccion_coagulo" ng-checked="retraccion_coagulo" name="examenes[42]">Retracción de Coágulo </label>
                                            </td>
                                        </tr>
                                    </tbody></table>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#inmunodiagnostico">
                                        INMUNODIAGNÓSTICO</a>
                                </h4>
                            </div>
                            <div id="inmunodiagnostico" class="panel-collapse collapse">
                                <table>
                                    <tbody><tr>
                                            <td>
                                                <label class="checkbox-inline"> <input type="checkbox" class="chkExamenes" id="anti_toxoplasma" ng-checked="anti_toxoplasma" name="examenes[43]">Anti Toxoplasma </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="igg_anti_toxoplasma" ng-checked="igg_anti_toxoplasma" name="examenes[44]">IgG (Anti Toxoplasma)</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="igm_anti_toxoplasma" ng-checked="igm_anti_toxoplasma" name="examenes[45]">IgM (Anti Toxoplasma)</label>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="anti_rubeola" ng-checked="anti_rubeola" name="examenes[46]">Anti Rubeola</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="igg_anti_rubeola" ng-checked="igg_anti_rubeola" name="examenes[47]">IgG (Anti Rubeola)</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="igm_anti_rubeola" ng-checked="igm_anti_rubeola" name="examenes[48]">IgM (Anti Rubeola)</label>
                                            </td>
                                        </tr>
                                        <tr>

                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="anti_cmv" ng-checked="anti_cmv" name="examenes[49]">Anti CMV </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="igg_anti_cmv" ng-checked="igg_anti_cmv" name="examenes[50]">IgG (Anti CMV) </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="igm_anti_cmv" ng-checked="igm_anti_cmv" name="examenes[51]">IgM (Anti CMV)</label>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="anti_herpes_i" ng-checked="anti_herpes_i" name="examenes[52]">Anti Herpes I</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="igg_anti_herpes_i" ng-checked="igg_anti_herpes_i" name="examenes[53]">Ig (Anti Herpes I)</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="igm_anti_herpes_i" ng-checked="igm_anti_herpes_i" name="examenes[54]">IgM (Anti Herpes I)</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="anti_herpes_ii" ng-checked="anti_herpes_ii" name="examenes[55]">Anti Herpes II</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="igg_anti_herpes_ii" ng-checked="igg_anti_herpes_ii" name="examenes[56]">IgG (Anti Herpes II)</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="igm_anti_herpes_ii" ng-checked="igm_anti_herpes_ii" name="examenes[57]">IgM (Anti Herpes II)</label>
                                            </td>
                                        </tr>
                                        <tr>

                                        </tr>
                                        <tr>

                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="torch" ng-checked="torch" name="examenes[58]">TORCH</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="igg_torch" ng-checked="igg_torch" name="examenes[59]"> IgG (TORCH)</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="igm_torch" ng-checked="igm_torch" name="examenes[60]">IgM (TORCH)</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="c3" ng-checked="c3" name="examenes[61]">C3</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="c4" ng-checked="c4" name="examenes[62]">C4</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="igm" ng-checked="igm" name="examenes[63]">IgM</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="ige" ng-checked="ige" name="examenes[64]">IgE</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="iga" ng-checked="iga" name="examenes[65]">IgA</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="igd" ng-checked="igd" name="examenes[66]">IgD</label>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="igg" ng-checked="igg" name="examenes[67]">IgG</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="chlamidia" ng-checked="chlamidia" name="examenes[68]">Chlamidia</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="igg_chlamidia" ng-checked="igg_chlamidia" name="examenes[69]">IgG (Chlamidia)</label>
                                            </td>


                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="igm_chlamidia" ng-checked="igm_chlamidia" name="examenes[70]">IgM (Chlamidia)</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="iga_chlamidia" ng-checked="iga_chlamidia" name="examenes[71]">IgA (Chlamidia)</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="hepatitis_a" ng-checked="hepatitis_a" name="examenes[72]">Hepatitis A</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="igg_hepatitis_a" ng-checked="igg_hepatitis_a" name="examenes[73]"> IgG (Hepatitis A)</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="igm_hepatitis_a" ng-checked="igm_hepatitis_a" name="examenes[74]">IgM (Hepatitis A)</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="hepatitis_b" ng-checked="hepatitis_b" name="examenes[75]">Hepatitis B</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="hbsag_hepatitis_b" ng-checked="hbsag_hepatitis_b" name="examenes[76]"> HBsAg (Hepatitis B)</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="anti_hbs_hepatitis_b" ng-checked="anti_hbs_hepatitis_b" name="examenes[77]"> Anti HBs (Hepatitis B)</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="hbc_hepatitis_b" ng-checked="hbc_hepatitis_b" name="examenes[78]"> HBc (Hepatitis B)</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="igg_hepatitis_b" ng-checked="igg_hepatitis_b" name="examenes[79]"> IgG (Hepatitis B)</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="igm_hepatitis_b" ng-checked="igm_hepatitis_b" name="examenes[80]">Igm (Hepatitis B)</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="hbeag_hepatitis_b" ng-checked="hbeag_hepatitis_b" name="examenes[81]">HBeAg (Hepatitis B)</label>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="anti_hbe_hepatitis_b" ng-checked="anti_hbe_hepatitis_b" name="examenes[82]"> Anti HBe (Hepatitis B)</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="hepatitis_c" ng-checked="hepatitis_c" name="examenes[83]">Hepatitis C </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="tuberculosis_suero" ng-checked="tuberculosis_suero" name="examenes[84]">Tuberculosis en suero
                                                </label>
                                            </td>



                                        </tr>
                                    </tbody></table>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#autoinmunidad">
                                        AUTOINMUNIDAD</a>
                                </h4>
                            </div>
                            <div id="autoinmunidad" class="panel-collapse collapse">
                                <table>
                                    <tbody><tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="ac_antinucleares" ng-checked="ac_antinucleares" name="examenes[85]"> Ac. Antinucleares </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="ac_anti_dna" ng-checked="ac_anti_dna" name="examenes[86]"> Ac. Anti DNA </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="celulas_le" ng-checked="celulas_le" name="examenes[87]"> Células Le </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="anticitrulina_anti_ccp" ng-checked="anticitrulina_anti_ccp" name="examenes[88]"> Anticitrulina (Anti -CCP) </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="ac_antimicrosomales" ng-checked="ac_antimicrosomales" name="examenes[89]"> Ac. Antimicrosomales </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="ac_antitiroglobulinas" ng-checked="ac_antitiroglobulinas" name="examenes[90]"> Ac. Antitiroglobulinas </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="ana_biot" ng-checked="ana_biot" name="examenes[91]"> ANA -BIOT </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="antifosfolipidos" ng-checked="antifosfolipidos" name="examenes[92]"> Antifosfolípidos </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="autoinmunidad_igg " ng-checked="autoinmunidad_igg" name="examenes[93]"> IgG (Antifosfolípidos) </label>

                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="igm_antifosfolipidos" ng-checked="igm_antifosfolipidos" name="examenes[94]"> IgM (Antifosfolípidos)</label>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="anticardiolipinas" ng-checked="anticardiolipinas" name="examenes[95]"> Anticardiolipinas </label>

                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="igg_anticardiolipinas" ng-checked="igg_anticardiolipinas" name="examenes[96]"> IgG (Anticardiolipinas)</label>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="igm_anticardiolipinas" ng-checked="igm_anticardiolipinas" name="examenes[97]"> IgM (Anticardiolipinas)</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="anti_b2gp1" ng-checked="anti_b2gp1" name="examenes[98]"> ANTI B2GP1 </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="ancas" ng-checked="ancas" name="examenes[99]"> ANCAS</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="anti_mitocondriales" ng-checked="anti_mitocondriales" name="examenes[100]"> Anti mitocondriales </label>
                                            </td>
                                        </tr>
                                    </tbody></table>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#quimicaSanguinea">
                                        QUÍMICA SANGUÍNEA</a>
                                </h4>
                            </div>
                            <div id="quimicaSanguinea" class="panel-collapse collapse">
                                <table>
                                    <tbody><tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="quimica_sanguinea_glu_ayuna" ng-checked="quimica_sanguinea_glu_ayuna" name="examenes[101]"> Glucosa Ayunas </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="quimica_sanguinea_glu2h_post_p" ng-checked="quimica_sanguinea_glu2h_post_p" name="examenes[102]"> Glocosa 2horas Post Prandial </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="curva_glucosa" ng-checked="curva_glucosa" name="examenes[103]"> Curva de Glucosa </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="fructosamina" ng-checked="fructosamina" name="examenes[104]"> Fructosamina </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="urea_q" ng-checked="urea_q" name="examenes[105]"> Urea </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="creatinina_q" ng-checked="creatinina_q" name="examenes[106]"> Creatinina </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="bun" ng-checked="bun" name="examenes[107]"> Bun
                                                </label></td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="acido_urico" ng-checked="acido_urico" name="examenes[108]"> Ácido Úrico </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="colesterol" ng-checked="colesterol" name="examenes[109]"> Colesterol</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="hdl_colesterol" ng-checked="hdl_colesterol" name="examenes[110]"> HDL -Colesterol </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="ldl_colesterol" ng-checked="ldl_colesterol" name="examenes[111]"> LDL -Colesterol </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="trigliceridos_q" ng-checked="trigliceridos_q" name="examenes[112]"> Triglicéridos </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="apolipoproteina_a" ng-checked="apolipoproteina_a" name="examenes[113]"> Apolipoproteína A </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="apolipoproteina_b" ng-checked="apolipoproteina_b" name="examenes[114]"> Apolipoproteína B </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="vldl" ng-checked="vldl" name="examenes[115]"> VLDL </label>

                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="bilirrubinas_total" ng-checked="bilirrubinas_total" name="examenes[116]"> Bilirrubinas (Total -Directa -Indirecta) </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="proteinas_totales" ng-checked="proteinas_totales" name="examenes[117]"> Proteínas Totales </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="albumina" ng-checked="albumina" name="examenes[118]"> Albumina </label>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="globulina" ng-checked="globulina" name="examenes[119]"> Globulina </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="hb_glicosilada" ng-checked="hb_glicosilada" name="examenes[120]"> HB glicosilada </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="hierro_serico" ng-checked="hierro_serico" name="examenes[121]"> Hierro sérico</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="hierro_captacion_fijacion" ng-checked="hierro_captacion_fijacion" name="examenes[122]"> Hierro captaciòn fijación</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="vit_b12" ng-checked="vit_b12" name="examenes[123]"> Vit. B12</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="transferrina" ng-checked="transferrina" name="examenes[124]"> Transferrina </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="ferritina_q" ng-checked="ferritina_q" name="examenes[125]"> Ferritina </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="ac_folico" ng-checked="ac_folico" name="examenes[126]"> Ac. Fólico </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="ins_saturacion" ng-checked="ins_saturacion" name="examenes[127]"> Ins. Saturación </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="quimica_sanguinea_tgo_ast" ng-checked="quimica_sanguinea_tgo_ast" name="examenes[128]"> TGO /AST</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="tgp_alt" ng-checked="tgp_alt" name="examenes[129]"> TGP /ALT </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="cpk" ng-checked="cpk" name="examenes[130]"> CPK </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="cpk_mb" ng-checked="cpk_mb" name="examenes[131]"> CPK -MB </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="quimica_sanguinea_gamma_gt" ng-checked="quimica_sanguinea_gamma_gt" name="examenes[132]"> Gamma GT </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="troponina" ng-checked="troponina" name="examenes[133]"> Troponina </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="quimica_sanguinea_fosfatasa_alcalina" ng-checked="quimica_sanguinea_fosfatasa_alcalina" name="examenes[134]"> Fosfatasa Alcalina </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="aldolasa" ng-checked="aldolasa" name="examenes[135]"> Aldolasa </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="fosfatasa_acida" ng-checked="fosfatasa_acida" name="examenes[136]"> Fosfatasa Acida </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="fost_ac_prostatica" ng-checked="fost_ac_prostatica" name="examenes[137]"> Fost. Ac. Prostática</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="amilasa" ng-checked="amilasa" name="examenes[138]"> Amilasa </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="lipasa" ng-checked="lipasa" name="examenes[139]"> Lipasa </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="glucosa_6_fosfato_dh" ng-checked="glucosa_6_fosfato_dh" name="examenes[140]"> Glucosa 6 Fosfato DH </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="deshidrogenasa_lactica" ng-checked="deshidrogenasa_lactica" name="examenes[141]"> Deshidrogenasa Láctica </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="colinesterasa" ng-checked="colinesterasa" name="examenes[142]"> Colinesterasa </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="acido_lactico" ng-checked="acido_lactico" name="examenes[143]"> Acido Láctico </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="osmolaridad_serica" ng-checked="osmolaridad_serica" name="examenes[144]"> Osmolaridad Sèrica </label>
                                            </td>
                                        </tr>
                                    </tbody></table>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#estudiosHormonales">
                                        ESTUDIOS HORMONALES</a>
                                </h4>
                            </div>
                            <div id="estudiosHormonales" class="panel-collapse collapse">
                                <table>
                                    <tbody><tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="tsh_t3_ft3" ng-checked="tsh_t3_ft3" name="examenes[196]"> TSH..  T3..  FT3.. </label>

                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="t4_ft4" ng-checked="t4_ft4" name="examenes[197]"> T4 ..FT4... </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="lh" ng-checked="lh" name="examenes[198]"> LH </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="fsh" ng-checked="fsh" name="examenes[199]"> FSH </label>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="prl" ng-checked="prl" name="examenes[200]"> PRL </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="e2" ng-checked="e2" name="examenes[201]"> E2 </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="p4" ng-checked="p4" name="examenes[202]"> P4 </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="igf1" ng-checked="igf1" name="examenes[203]"> IGF1 </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="igbp3" ng-checked="igbp3" name="examenes[204]"> IGBP3 </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="pth" ng-checked="pth" name="examenes[205]"> PTH </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="estriol" ng-checked="estriol" name="examenes[206]"> ESTRIOL </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="androstendiona" ng-checked="androstendiona" name="examenes[207]"> ANDROSTENDIONA </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="cortisol_am" ng-checked="cortisol_am" name="examenes[208]"> CORTISOL AM  </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="cortisol_pm" ng-checked="cortisol_pm" name="examenes[209]"> CORTISOL PM </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="acth" ng-checked="acth" name="examenes[210]"> ACTH </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="testosterona_total" ng-checked="testosterona_total" name="examenes[211]"> TESTOSTERONA TOTAL </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="testosterona_libre" ng-checked="testosterona_libre" name="examenes[212]"> TESTOSTERONA LIBRE </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="hcg_cuantitativa" ng-checked="hcg_cuantitativa" name="examenes[213]"> HCG CUANTITATIVA </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="hormona_crecimiento_peptido_c" ng-checked="hormona_crecimiento_peptido_c" name="examenes[214]"> HORMONA CRECIMIENTO PEPTIDO C </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="ferritina" ng-checked="ferritina" name="examenes[215]"> FERRITINA </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="insulina_ayudas" ng-checked="insulina_ayudas" name="examenes[216]"> INSULINA AYUNAS </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="insulina_2_h" ng-checked="insulina_2_h" name="examenes[217]"> INSULINA 2 H </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="peptido_c" ng-checked="peptido_c" name="examenes[218]"> PEPTIDO C </label>
                                            </td>
                                        </tr>
                                    </tbody></table>
                            </div>
                        </div>
                    </div>
                    <!--Se divede el accordion en 3 partes de 9 categorias cada una-->
                    <div class="panel-group col-md-4 laboratorio" id="accordion_laboratorio">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#serologia">
                                        SEROLOGÍA</a>
                                </h4>
                            </div>
                            <div id="serologia" class="panel-collapse collapse">
                                <table>
                                    <tbody><tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="asto_cuantitativo" ng-checked="asto_cuantitativo" name="examenes[24]">Asto Cuantitativo</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="pcr_cualitativo" ng-checked="pcr_cualitativo" name="examenes[25]">PCR Cualitativo</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="latex" ng-checked="latex" name="examenes[26]">LATEX</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="vdrl" ng-checked="vdrl" name="examenes[27]">VDRL </label>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="aglutinaciones_febriles" ng-checked="aglutinaciones_febriles" name="examenes[28]">Aglutinaciones Febriles</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="helicobacter_pylori" ng-checked="helicobacter_pylori" name="examenes[29]">Helicobacter Pylori IGG ... IGM </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="peptido_citrulinado" ng-checked="peptido_citrulinado" name="examenes[30]">Peptido citrulinado</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="anti_citrulina" ng-checked="anti_citrulina" name="examenes[31]">Anti Citrulina</label>
                                            </td>
                                            <td></td>
                                        </tr>
                                    </tbody></table>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#electrolitos">
                                        ELECTROLITOS</a>
                                </h4>
                            </div>
                            <div id="electrolitos" class="panel-collapse collapse">
                                <table>
                                    <tbody><tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="sodio_e" ng-checked="sodio_e" name="examenes[167]"> Sodio </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="potasio_e" ng-checked="potasio_e" name="examenes[168]"> Potasio </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="cloro_e" ng-checked="cloro_e" name="examenes[169]"> Cloro </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="calcio_total" ng-checked="calcio_total" name="examenes[170]"> Calcio total</label>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="calcio_ionico" ng-checked="calcio_ionico" name="examenes[171]"> Calcio iónico</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="magnesio_e" ng-checked="magnesio_e" name="examenes[172]"> Magnesio </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="fosforo_e" ng-checked="fosforo_e" name="examenes[173]"> Fósforo </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="cobre" ng-checked="cobre" name="examenes[174]"> Cobre </label>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="litio" ng-checked="litio" name="examenes[175]"> Litio </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="amonio" ng-checked="amonio" name="examenes[176]"> Amonio </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="plomo" ng-checked="plomo" name="examenes[177]"> Plomo </label>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                Otros (Electrolitos): <textarea id="txtOtrosElectro" class="textarea" cols="48" rows="2" ng-model="txtOtrosElectro" name="examenes[268]"></textarea>
                                            </td>
                                        </tr>
                                    </tbody></table>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#estudiosEspeciales">
                                        ESTUDIOS ESPECIALES</a>
                                </h4>
                            </div>
                            <div id="estudiosEspeciales" class="panel-collapse collapse">
                                <table>
                                    <tbody><tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="espermatograma" ng-checked="espermatograma" name="examenes[178]"> Espermatograma</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="estudio_calculo" ng-checked="estudio_calculo" name="examenes[179]"> Estudio cálculo
                                                </label></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="citoquimico_lcr" ng-checked="citoquimico_lcr" name="examenes[180]"> Citoquímico LCR </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="pap_test" ng-checked="pap_test" name="examenes[181]"> Pap -Test </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                Estudio Líquidos: <textarea id="txtEstLiq" class="textarea" cols="48" rows="2" ng-model="txtEstLiq" name="examenes[269]"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                Muestra de: <textarea id="txtMuestra" class="textarea" cols="48" rows="2" ng-model="txtMuestra" name="examenes[270]"></textarea>
                                            </td>
                                        </tr>
                                    </tbody></table>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#bacteriologia">
                                        BACTERIOLOGÍA</a>
                                </h4>
                            </div>
                            <div id="bacteriologia" class="panel-collapse collapse">
                                <table>
                                    <tbody><tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="cultivo_antibiograma" ng-checked="cultivo_antibiograma" name="examenes[182]"> Cultivo y antibiograma </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="gram" ng-checked="gram" name="examenes[183]"> Gram </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="fresco" ng-checked="fresco" name="examenes[184]"> Fresco </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="baar" ng-checked="baar" name="examenes[185]"> BAAR </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="investigacion_hongos_koh" ng-checked="investigacion_hongos_koh" name="examenes[186]"> Investigacion de hongos (KOH) </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="control_tratamiento" ng-checked="control_tratamiento" name="examenes[187]"> Control tratamiento </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                Días No: <textarea id="txtDiasNo" cols="50" rows="2" class="textarea" ng-model="txtDiasNo" name="examenes[271]"></textarea>
                                            </td>
                                        </tr>
                                    </tbody></table>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#htaHipertension">
                                        HTA. HIPERTENSIÓN</a>
                                </h4>
                            </div>
                            <div id="htaHipertension" class="panel-collapse collapse">
                                <table>
                                    <tbody><tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="bh" ng-checked="bh" name="examenes[188]"> BH.</label>

                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="hdl" ng-checked="hdl" name="examenes[189]"> HDL </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="urea" ng-checked="urea" name="examenes[190]"> Urea </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="ldl" ng-checked="ldl" name="examenes[191]"> LDL </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="glucosa" ng-checked="glucosa" name="examenes[192]"> Glucosa. </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="creatinina" ng-checked="creatinina" name="examenes[193]"> Creatinina </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="tsh" ng-checked="tsh" name="examenes[194]"> TSH </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="trigliceridos" ng-checked="trigliceridos" name="examenes[195]"> Triglicéridos </label>
                                            </td>
                                        </tr>

                                    </tbody></table>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#heces">
                                        HECES</a>
                                </h4>
                            </div>
                            <div id="heces" class="panel-collapse collapse">
                                <table>
                                    <tbody><tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="coproparasitario_rutina" ng-checked="coproparasitario_rutina" name="examenes[145]"> Coproparasitario rutina </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="coproparasitario_seriado" ng-checked="coproparasitario_seriado" name="examenes[146]"> Coproparasitario Seriado </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="inv_polimorfonucleares" ng-checked="inv_polimorfonucleares" name="examenes[147]"> Inv. Polimorfonucleares</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="sangre_oculta" ng-checked="sangre_oculta" name="examenes[148]"> Sangre oculta</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="rotavirus" ng-checked="rotavirus" name="examenes[149]"> Rotavirus </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="ph" ng-checked="ph" name="examenes[150]"> pH </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="concentracion" ng-checked="concentracion" name="examenes[151]"> Concentración </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="andenovirus" ng-checked="andenovirus" name="examenes[152]"> Andenovirus </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="sudan_iii" ng-checked="sudan_iii" name="examenes[153]"> Sudan III </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="coprologico" ng-checked="coprologico" name="examenes[154]"> Coprológico</label>
                                            </td>
                                        </tr>

                                    </tbody></table>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#drogas">
                                        DROGAS</a>
                                </h4>
                            </div>
                            <div id="drogas" class="panel-collapse collapse">
                                <table>
                                    <tbody><tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="cocaina" ng-checked="cocaina" name="examenes[220]"> Cocaína</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="marihuana" ng-checked="marihuana" name="examenes[221]"> Marihuana </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="ac_valproico" ng-checked="ac_valproico" name="examenes[222]"> Ac valproico </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="carbamazepina" ng-checked="carbamazepina" name="examenes[223]"> Carbamazepina </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="ciclosporina_basal" ng-checked="ciclosporina_basal" name="examenes[224]"> Ciclosporina Basal
                                                </label></td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="ciclosporina_2horas" ng-checked="ciclosporina_2horas" name="examenes[225]"> Ciclosporina 2horas </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="digoxina" ng-checked="digoxina" name="examenes[226]"> Digoxina
                                                </label></td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="escopolamina" ng-checked="escopolamina" name="examenes[227]"> Escopolamina </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="fenitoina" ng-checked="fenitoina" name="examenes[228]"> Fenitoína </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="fenobarbital" ng-checked="fenobarbital" name="examenes[229]"> Fenobarbital </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="teofilina" ng-checked="teofilina" name="examenes[230]"> Teofilina </label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="vancomicina" ng-checked="vancomicina" name="examenes[231]"> Vancomicina </label>
                                            </td>
                                        </tr>
                                    </tbody></table>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#perfilGeneral">
                                        PERFIL GENERAL</a>
                                </h4>
                            </div>
                            <div id="perfilGeneral" class="panel-collapse collapse">
                                <table>
                                    <tbody><tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="perfil_general" ng-checked="perfil_general" name="examenes[219]"> Biometría Hemática, EMO, Coproparasitario, glucosa, urea, creatinina, ac. único, colesterol trigliceridos, HDL, LDL, VDRL.
                                                </label></td>

                                        </tr>
                                    </tbody></table>
                            </div>
                        </div>
                    </div>
                    <!--Se divede el accordion en 3 partes de 9 categorias cada una-->
                    <div class="panel-group col-md-3 laboratorio" id="accordion_laboratorio">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#perfilDeDiabetes">
                                        PERFIL DE DIABETES</a>
                                </h4>
                            </div>
                            <div id="perfilDeDiabetes" class="panel-collapse collapse">
                                <table>
                                    <tbody><tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="perfil_diabetes" ng-checked="perfil_diabetes" name="examenes[232]"> Biometría, glucosa, Hb glicosilada, fructosamina creatinina, acido úrico, colesterol, HDL, LDL, Triglicéridos, microalbuminuria, EMO.</label>
                                            </td>
                                        </tr>
                                    </tbody></table>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#perfilHepatico">
                                        PERFIL HEPÁTICO</a>
                                </h4>
                            </div>
                            <div id="perfilHepatico" class="panel-collapse collapse">
                                <table>
                                    <tbody><tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="pefil_hepatico" ng-checked="pefil_hepatico" name="examenes[233]">  Biometría, glucosa, colesterol, triglicéridos, proteínas, albúmina, bilirrubinas, TGO, TGP, GGT, fosfata alcalina, TP, TTP, Bilirrubina Totales y Parciales.  </label>
                                            </td>
                                        </tr>
                                    </tbody></table>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#perfilLipidico">
                                        PERFIL LIPÍDICO</a>
                                </h4>
                            </div>
                            <div id="perfilLipidico" class="panel-collapse collapse">
                                <table>
                                    <tbody><tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="perfil_lipidico" ng-checked="perfil_lipidico" name="examenes[234]"> Líquidos totales, Colesterol, Triglicéridos, HDL, LDL, Apo A, Apo B, fibrinógeno.  </label>
                                            </td>
                                        </tr>
                                    </tbody></table>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#perfilReumatico">
                                        PERFIL REUMÁTICO</a>
                                </h4>
                            </div>
                            <div id="perfilReumatico" class="panel-collapse collapse">
                                <table>
                                    <tbody><tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="perfil_reumatico" ng-checked="perfil_reumatico" name="examenes[235]"> BH, Glucosa, Creatinina, Asto, PCR, Latex </label>

                                            </td>
                                        </tr>
                                    </tbody></table>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#tiroiditis">
                                        TIROIDITIS</a>
                                </h4>
                            </div>
                            <div id="tiroiditis" class="panel-collapse collapse">
                                <table>
                                    <tbody><tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="tiroiditis" ng-checked="tiroiditis" name="examenes[236]">  Tiroiditis: Anti - Tiroglobulina, Anti - Peroxidasa, Tiroglobulina </label>
                                            </td>
                                        </tr>
                                    </tbody></table>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#prequirurgico">
                                        PREQUIRÚRGICO</a>
                                </h4>
                            </div>
                            <div id="prequirurgico" class="panel-collapse collapse">
                                <table>
                                    <tbody><tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="prequirurgico" ng-checked="prequirurgico" name="examenes[237]"> Biometría Hemática, Urea, Glucosa, Creatinina, TP, TTP, EMO </label>
                                            </td>
                                        </tr>
                                    </tbody></table>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#pruebasInmunologicas">
                                        PRUEBAS INMUNOLÓGICAS</a>
                                </h4>
                            </div>
                            <div id="pruebasInmunologicas" class="panel-collapse collapse">
                                <table>
                                    <tbody><tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="pruebas_inmunologicas" ng-checked="pruebas_inmunologicas" name="examenes[238]"> ANA, ANCAS, ANTI - ANA, C3, C4 </label>
                                            </td>
                                        </tr>
                                    </tbody></table>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#hipotirodismo">
                                        HIPOTIROIDISMO</a>
                                </h4>
                            </div>
                            <div id="hipotirodismo" class="panel-collapse collapse">
                                <table>
                                    <tbody><tr>
                                            <td>
                                                <label class="checkbox-inline">
                                                    <input type="checkbox" class="chkExamenes" id="hipotiroidismo" ng-checked="hipotiroidismo" name="examenes[239]">  TSH, FT4, FT3. </label>
                                            </td>
                                        </tr>
                                    </tbody></table>
                            </div>
                        </div>
                    </div>  
                </div>
                <!--Fin pestaña Laboratorio-->

                <!--Inicio pestaña Rayos X-->
                <div id="rayox" class="tab-pane fade">
                    <div class="panel-group col-md-4 rayox" id="accordion_rayox">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="opcion" data-parent="#accordion" data-toggle="collapse" href="#radiologia_digital_craneo">
                                        RADIOLOGÍA DIGITAL DE CRANEO</a>
                                </h4>
                            </div>
                            <div id="radiologia_digital_craneo" class="panel-collapse collapse in">
                                <table>
                                    <tbody><tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" id="craneo_2_posiciones" ng-checked="craneo_2_posiciones" name="examenes[272]">Cráneo 2 posiciones</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="articulacion_temporo_maxilar" ng-checked="articulacion_temporo_maxilar" name="examenes[273]">Articulación temporo-maxilar</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="macizo_facial" ng-checked="macizo_facial" name="examenes[274]">Macizo facial</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="huesos_propios_nariz" ng-checked="huesos_propios_nariz" name="examenes[275]">Huesos propios de la nariz </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="cavun_faringeo" ng-checked="cavun_faringeo" name="examenes[276]">Cavun faríngeo</label>
                                            </td>

                                        </tr>

                                    </tbody></table>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="opcion" data-parent="#accordion" data-toggle="collapse" href="#torax_abdomen">
                                        TORAX Y ABDOMEN</a>
                                </h4>
                            </div>
                            <div id="torax_abdomen" class="panel-collapse collapse ">
                                <table>
                                    <tbody><tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" id="estandar_torax" ng-checked="estandar_torax" name="examenes[277]">Estándar de tórax</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="torax_2_posiciones" ng-checked="torax_2_posiciones" name="examenes[278]">Tórax 2 posiciones</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="torax_oseo" ng-checked="torax_oseo" name="examenes[279]">Tórax óseo</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="abdomen_2_posiciones" ng-checked="abdomen_2_posiciones" name="examenes[280]">Abdomén 2 posiciones </label>
                                            </td>
                                        </tr>                                          
                                    </tbody></table>
                            </div>
                        </div>                
                    </div>

                    <div class="panel-group col-md-4 rayox" id="accordion_rayox">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="opcion" data-parent="#accordion" data-toggle="collapse" href="#miembro_superior">
                                        MIEMBRO SUPERIOR</a>
                                </h4>
                            </div>
                            <div id="miembro_superior" class="panel-collapse collapse ">
                                <table>
                                    <tbody><tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" id="clavicula" ng-checked="clavicula" name="examenes[281]">Clavícula</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="hombro" ng-checked="hombro" name="examenes[282]">Hombro</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="brazo_ap_lateral" ng-checked="brazo_ap_lateral" name="examenes[283]">Brazo AP y lateral</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="codo_ap_lateral" ng-checked="codo_ap_lateral" name="examenes[284]">Codo AP y lateral</label>
                                            </td>
                                        </tr>  
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="antebrazo_ap_lateral" ng-checked="antebrazo_ap_lateral" name="examenes[285]">Antebrazo AP y lateral</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="muneca_ap_lateral" ng-checked="muneca_ap_lateral" name="examenes[286]">Muñeca AP y lateral</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="mano_ap_oblicua" ng-checked="mano_ap_oblicua" name="examenes[287]">Mano AP y oblicua</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="edad_osea" ng-checked="edad_osea" name="examenes[288]">Edad ósea</label>
                                            </td>
                                        </tr>                                            
                                    </tbody></table>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="opcion" data-parent="#accordion" data-toggle="collapse" href="#columna">
                                        COLUMNA</a>
                                </h4>
                            </div>
                            <div id="columna" class="panel-collapse collapse ">
                                <table>
                                    <tbody><tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" id="cervical_ap_lateral" ng-checked="cervical_ap_lateral" name="examenes[289]">Cervical AP y lateral</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="cervical_funcionales" ng-checked="cervical_funcionales" name="examenes[290]">Cervical funcionales</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="dorsal_ap_lateral" ng-checked="dorsal_ap_lateral" name="examenes[291]">Dorsal AP y lateral</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="lumbar_ap_lateral" ng-checked="lumbar_ap_lateral" name="examenes[292]">Lumbar AP y lateral</label>
                                            </td>
                                        </tr>  
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="sacro_coxis_ap_lateral" ng-checked="sacro_coxis_ap_lateral" name="examenes[293]">Sacro-coxis AP y lateral</label>
                                            </td>                        
                                        </tr>

                                    </tbody></table>
                            </div>
                        </div>
                    </div>   
                    <div class="panel-group col-md-4 rayox" id="accordion_rayox">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="opcion" data-parent="#accordion" data-toggle="collapse" href="#miembro_inferior">
                                        MIEMBRO INFERIOR</a>
                                </h4>
                            </div>
                            <div id="miembro_inferior" class="panel-collapse collapse ">
                                <table>
                                    <tbody><tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" id="pelvis" ng-checked="pelvis" name="examenes[294]">Pelvis</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="cadera_rn" ng-checked="cadera_rn" name="examenes[295]">Cadera RN</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="femur_ap_lateral" ng-checked="femur_ap_lateral" name="examenes[296]">Fémur AP y lateral</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="rodilla_ap_lateral" ng-checked="rodilla_ap_lateral" name="examenes[297]">Rodilla AP y lateral</label>
                                            </td>
                                        </tr>  
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="rodilla_ap_lateral_axial" ng-checked="rodilla_ap_lateral_axial" name="examenes[298]">Rodilla AP y lateral y axial</label>
                                            </td>     
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="pierna_ap_lateral" ng-checked="pierna_ap_lateral" name="examenes[299]">Pierna AP y lateral</label>
                                            </td>                       
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="tobillo_ap_lateral" ng-checked="tobillo_ap_lateral" name="examenes[300]">Tobillo AP y lateral</label>
                                            </td>     
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="pie_ap_lateral" ng-checked="pie_ap_lateral" name="examenes[301]">Pie AP y lateral</label>
                                            </td>                       
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="calcaneo" ng-checked="calcaneo" name="examenes[300]">Calcáneo</label>
                                            </td>                                                 
                                        </tr>

                                    </tbody></table>
                            </div>
                        </div>
                    </div>            
                </div>

                <!--Fin pestaña Rayos X-->

                <!--Inicio pestaña Rayos X dental-->
                <div id="rayox_dental" class="tab-pane fade">
                    <div class="panel-group col-md-5 rayox_dental" id="accordion_rayox_dental">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="opcion" data-parent="#accordion" data-toggle="collapse" href="#rayosx_dental">
                                        RAYOS X DENTAL</a>
                                </h4>
                            </div>
                            <div id="rayosx_dental" class="panel-collapse collapse in">
                                <table>
                                    <tbody><tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" id="panoramica_maxilares" ng-checked="panoramica_maxilares" name="examenes[303]">Panorámica de Maxilares</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="cefalica_perfil" ng-checked="cefalica_perfil" name="examenes[304]">Cefálica (Perfil)</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="atm_bilateral_ba_bc" ng-checked="atm_bilateral_ba_bc" name="examenes[305]">A.T.M. Bilateral BA / BC</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="postero_anterior_craneo" ng-checked="postero_anterior_craneo" name="examenes[306]">Postero-anterior Cráneo</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="edad_osea_carpo" ng-checked="edad_osea_carpo" name="examenes[307]">Edad Ósea (Carpo)</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="periapical" ng-checked="periapical" name="examenes[308]">Periapical</label>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="bite_wing" ng-checked="bite_wing" name="examenes[309]">Bite Wing</label>
                                            </td>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="oclusal_pequena" ng-checked="oclusal_pequena" name="examenes[310]">Oclusal pequeña</label>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="checkbox-inline"><input type="checkbox" class="chkExamenes" id="oclusal_grande" ng-checked="oclusal_grande" name="examenes[311]">Oclusal grande</label>
                                            </td>

                                        </tr>

                                    </tbody></table>
                            </div>                
                        </div>            
                    </div>
                </div>
                <!--Fin pestaña Rayos X dental-->
        </form>
    </div>      
</div>
</div>

<!-- HTML del Modal de Loading-->

<div class = "modal" style = "display: none" align = "center">
    <div class = "center">
        <img alt = "" src = "{{asset('img/loading_animation.gif')}}" />
    </div>
</div>
<script src="{{ asset ('js/price/app.js') }}"></script>
<script src="{{ asset ('js/price/services.js') }}"></script>
<script src="{{ asset ('js/price/controller.js') }}"></script>

@endsection
