<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ModLaboratorio;
use App\ModMedico;
use App\ModPaciente;

class AdminCustomLaboratorioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
     	$operation = 'add';
      $medicos =  ModMedico::all();
      $pacientes = ModPaciente::all();
      //$medicos = $medico->all();
     	$page_title = 'Laboratorio';
     	return view("laboratorio.index",compact('page_title', 'operation','medicos','pacientes'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {
     	$laboratorio =  new ModLaboratorio;
     	$laboratorio->id_medico = $request->get('id_medico');
     	$laboratorio->id_paciente = $request->get('id_paciente');
     	$laboratorio->fecha = $request->get('fecha');
     	$laboratorio->bio_h = $request->get('bio_h');
     	$laboratorio->hto_hb = $request->get('hto_hb');
     	$laboratorio->reticulocitos = $request->get('reticulocitos');
     	$laboratorio->sedimentacion_ves = $request->get('sedimentacion_ves');
     	$laboratorio->formula_leuco = $request->get('formula_leuco');
     	$laboratorio->plaquetas = $request->get('plaquetas');
     	$laboratorio->grupo_sanguineo = $request->get('grupo_sanguineo');
     	$laboratorio->elemental_microscopico = $request->get('elemental_microscopico');
     	$laboratorio->gota_fresca = $request->get('gota_fresca');
     	$laboratorio->gram_o = $request->get('gram_o');
     	$laboratorio->microalbuminuria = $request->get('microalbuminuria');
     	$laboratorio->proteinuria24 = $request->get('proteinuria24');
     	$laboratorio->depuracion_creatinina = $request->get('depuracion_creatinina');
     	$laboratorio->sodio = $request->get('sodio');
     	$laboratorio->potasio = $request->get('potasio');
     	$laboratorio->cloro = $request->get('cloro');
     	$laboratorio->ac_urico = $request->get('ac_urico');
     	$laboratorio->calcio = $request->get('calcio');
     	$laboratorio->fosforo = $request->get('fosforo');
     	$laboratorio->magnesio = $request->get('magnesio');
     	$laboratorio->prueba_embarazo = $request->get('prueba_embarazo');
     	$laboratorio->panel_drogas = $request->get('panel_drogas');
     	$laboratorio->asto_cuantitativo = $request->get('asto_cuantitativo');
     	$laboratorio->pcr_cualitativo = $request->get('pcr_cualitativo');
     	$laboratorio->latex = $request->get('latex');
     	$laboratorio->vdrl = $request->get('vdrl');
     	$laboratorio->aglutinaciones_febriles = $request->get('aglutinaciones_febriles');
     	$laboratorio->helicobacter_pylori = $request->get('helicobacter_pylori');
     	$laboratorio->peptido_citrulinado = $request->get('peptido_citrulinado');
     	$laboratorio->anti_citrulina = $request->get('anti_citrulina');
     	$laboratorio->tp = $request->get('tp');
     	$laboratorio->ttp = $request->get('ttp');
     	$laboratorio->tiempo_trombina = $request->get('tiempo_trombina');
     	$laboratorio->inr = $request->get('inr');
     	$laboratorio->tiempo_coagulacion = $request->get('tiempo_coagulacion');
     	$laboratorio->fibrinogeno = $request->get('fibrinogeno');
     	$laboratorio->tiempo_hemorragia = $request->get('tiempo_hemorragia');
     	$laboratorio->antitrombina_iii = $request->get('antitrombina_iii');
     	$laboratorio->coombs_directo = $request->get('coombs_directo');
     	$laboratorio->coombs_indirecto = $request->get('coombs_indirecto');
     	$laboratorio->retraccion_coagulo = $request->get('retraccion_coagulo');
     	$laboratorio->anti_toxoplasma = $request->get('anti_toxoplasma');
     	$laboratorio->igg_anti_toxoplasma = $request->get('igg_anti_toxoplasma');
     	$laboratorio->igm_anti_toxoplasma = $request->get('igm_anti_toxoplasma');
     	$laboratorio->anti_rubeola = $request->get('anti_rubeola');
     	$laboratorio->igg_anti_rubeola = $request->get('igg_anti_rubeola');
     	$laboratorio->igm_anti_rubeola = $request->get('igm_anti_rubeola');
     	$laboratorio->anti_cmv = $request->get('anti_cmv');
     	$laboratorio->igg_anti_cmv = $request->get('igg_anti_cmv');
     	$laboratorio->igm_anti_cmv = $request->get('igm_anti_cmv');
     	$laboratorio->anti_herpes_i = $request->get('anti_herpes_i');
     	$laboratorio->igg_anti_herpes_i = $request->get('igg_anti_herpes_i');
     	$laboratorio->igm_anti_herpes_i = $request->get('igm_anti_herpes_i');
     	$laboratorio->anti_herpes_ii = $request->get('anti_herpes_ii');
     	$laboratorio->igg_anti_herpes_ii = $request->get('igg_anti_herpes_ii');
     	$laboratorio->igm_anti_herpes_ii = $request->get('igm_anti_herpes_ii');
     	$laboratorio->torch = $request->get('torch');
     	$laboratorio->igg_torch = $request->get('igg_torch');
     	$laboratorio->igm_torch = $request->get('igm_torch');
     	$laboratorio->c3 = $request->get('c3');
     	$laboratorio->c4 = $request->get('c4');
     	$laboratorio->igm = $request->get('igm');
     	$laboratorio->ige = $request->get('ige');
     	$laboratorio->iga = $request->get('iga');
     	$laboratorio->igd = $request->get('igd');
     	$laboratorio->igg = $request->get('igg');
     	$laboratorio->chlamidia = $request->get('chlamidia');
     	$laboratorio->igg_chlamidia = $request->get('igg_chlamidia');
     	$laboratorio->igm_chlamidia = $request->get('igm_chlamidia');
     	$laboratorio->iga_chlamidia = $request->get('iga_chlamidia');
     	$laboratorio->hepatitis_a = $request->get('hepatitis_a');
     	$laboratorio->igg_hepatitis_a = $request->get('igg_hepatitis_a');
     	$laboratorio->igm_hepatitis_a = $request->get('igm_hepatitis_a');
     	$laboratorio->hepatitis_b = $request->get('hepatitis_b');
     	$laboratorio->hbsag_hepatitis_b = $request->get('hbsag_hepatitis_b');
     	$laboratorio->anti_hbs_hepatitis_b = $request->get('anti_hbs_hepatitis_b');
     	$laboratorio->hbc_hepatitis_b = $request->get('hbc_hepatitis_b');
     	$laboratorio->igg_hepatitis_b = $request->get('igg_hepatitis_b');
     	$laboratorio->igm_hepatitis_b = $request->get('igm_hepatitis_b');
     	$laboratorio->hbeag_hepatitis_b = $request->get('hbeag_hepatitis_b');
     	$laboratorio->anti_hbe_hepatitis_b = $request->get('anti_hbe_hepatitis_b');
     	$laboratorio->hepatitis_c = $request->get('hepatitis_c');
     	$laboratorio->tuberculosis_suero = $request->get('tuberculosis_suero');
     	$laboratorio->ac_antinucleares = $request->get('ac_antinucleares');
     	$laboratorio->ac_anti_dna = $request->get('ac_anti_dna');
     	$laboratorio->celulas_le = $request->get('celulas_le');
     	$laboratorio->anticitrulina_anti_ccp = $request->get('anticitrulina_anti_ccp');
     	$laboratorio->ac_antimicrosomales = $request->get('ac_antimicrosomales');
     	$laboratorio->ac_antitiroglobulinas = $request->get('ac_antitiroglobulinas');
     	$laboratorio->ana_biot = $request->get('ana_biot');
     	$laboratorio->antifosfolipidos = $request->get('antifosfolipidos');
     	$laboratorio->autoinmunidad_igg  = $request->get('autoinmunidad_igg ');
     	$laboratorio->igm_antifosfolipidos = $request->get('igm_antifosfolipidos');
     	$laboratorio->anticardiolipinas = $request->get('anticardiolipinas');
     	$laboratorio->igg_anticardiolipinas = $request->get('igg_anticardiolipinas');
     	$laboratorio->igm_anticardiolipinas = $request->get('igm_anticardiolipinas');
     	$laboratorio->anti_b2gp1 = $request->get('anti_b2gp1');
     	$laboratorio->ancas = $request->get('ancas');
     	$laboratorio->anti_mitocondriales = $request->get('anti_mitocondriales');
     	$laboratorio->quimica_sanguinea_glu_ayuna = $request->get('quimica_sanguinea_glu_ayuna');
     	$laboratorio->quimica_sanguinea_glu2h_post_p = $request->get('quimica_sanguinea_glu2h_post_p');
     	$laboratorio->curva_glucosa = $request->get('curva_glucosa');
     	$laboratorio->fructosamina = $request->get('fructosamina');
     	$laboratorio->urea_q = $request->get('urea_q');
     	$laboratorio->creatinina_q = $request->get('creatinina_q');
     	$laboratorio->bun = $request->get('bun');
     	$laboratorio->acido_urico = $request->get('acido_urico');
     	$laboratorio->colesterol = $request->get('colesterol');
     	$laboratorio->hdl_colesterol = $request->get('hdl_colesterol');
     	$laboratorio->ldl_colesterol = $request->get('ldl_colesterol');
     	$laboratorio->trigliceridos_q = $request->get('trigliceridos_q');
     	$laboratorio->apolipoproteina_a = $request->get('apolipoproteina_a');
     	$laboratorio->apolipoproteina_b = $request->get('apolipoproteina_b');
     	$laboratorio->vldl = $request->get('vldl');
     	$laboratorio->bilirrubinas_total = $request->get('bilirrubinas_total');
     	$laboratorio->proteinas_totales = $request->get('proteinas_totales');
     	$laboratorio->albumina = $request->get('albumina');
     	$laboratorio->globulina = $request->get('globulina');
     	$laboratorio->hb_glicosilada = $request->get('hb_glicosilada');
     	$laboratorio->hierro_serico = $request->get('hierro_serico');
     	$laboratorio->hierro_captacion_fijacion = $request->get('hierro_captacion_fijacion');
     	$laboratorio->vit_b12 = $request->get('vit_b12');
     	$laboratorio->transferrina = $request->get('transferrina');
     	$laboratorio->ferritina_q = $request->get('ferritina_q');
     	$laboratorio->ac_folico = $request->get('ac_folico');
     	$laboratorio->ins_saturacion = $request->get('ins_saturacion');
     	$laboratorio->quimica_sanguinea_tgo_ast = $request->get('quimica_sanguinea_tgo_ast');
     	$laboratorio->tgp_alt = $request->get('tgp_alt');
     	$laboratorio->cpk = $request->get('cpk');
     	$laboratorio->cpk_mb = $request->get('cpk_mb');
     	$laboratorio->quimica_sanguinea_gamma_gt = $request->get('quimica_sanguinea_gamma_gt');
     	$laboratorio->troponina = $request->get('troponina');
     	$laboratorio->quimica_sanguinea_fosfatasa_alcalina = $request->get('quimica_sanguinea_fosfatasa_alcalina');
     	$laboratorio->aldolasa = $request->get('aldolasa');
     	$laboratorio->fosfatasa_acida = $request->get('fosfatasa_acida');
     	$laboratorio->fost_ac_prostatica = $request->get('fost_ac_prostatica');
     	$laboratorio->amilasa = $request->get('amilasa');
     	$laboratorio->lipasa = $request->get('lipasa');
     	$laboratorio->glucosa_6_fosfato_dh = $request->get('glucosa_6_fosfato_dh');
     	$laboratorio->deshidrogenasa_lactica = $request->get('deshidrogenasa_lactica');
     	$laboratorio->colinesterasa = $request->get('colinesterasa');
     	$laboratorio->acido_lactico = $request->get('acido_lactico');
     	$laboratorio->osmolaridad_serica = $request->get('osmolaridad_serica');
     	$laboratorio->coproparasitario_rutina = $request->get('coproparasitario_rutina');
     	$laboratorio->coproparasitario_seriado = $request->get('coproparasitario_seriado');
     	$laboratorio->inv_polimorfonucleares = $request->get('inv_polimorfonucleares');
     	$laboratorio->sangre_oculta = $request->get('sangre_oculta');
     	$laboratorio->rotavirus = $request->get('rotavirus');
     	$laboratorio->ph = $request->get('ph');
     	$laboratorio->concentracion = $request->get('concentracion');
     	$laboratorio->andenovirus = $request->get('andenovirus');
     	$laboratorio->sudan_iii = $request->get('sudan_iii');
     	$laboratorio->coprologico = $request->get('coprologico');
     	$laboratorio->cea_carcino_embrionario = $request->get('cea_carcino_embrionario');
     	$laboratorio->afp_alfa_feto_proteina = $request->get('afp_alfa_feto_proteina');
     	$laboratorio->psa_antigeno_prostatico_especifico = $request->get('psa_antigeno_prostatico_especifico');
     	$laboratorio->psa_libre = $request->get('psa_libre');
     	$laboratorio->ca_125 = $request->get('ca_125');
     	$laboratorio->ca_19_9 = $request->get('ca_19_9');
     	$laboratorio->anti_tpo = $request->get('anti_tpo');
     	$laboratorio->neuroenolasa_especifica = $request->get('neuroenolasa_especifica');
     	$laboratorio->hcgb = $request->get('hcgb');
     	$laboratorio->ca_15_3 = $request->get('ca_15_3');
     	$laboratorio->ca_72_4 = $request->get('ca_72_4');
     	$laboratorio->tiroglobulina = $request->get('tiroglobulina');
     	$laboratorio->sodio_e = $request->get('sodio_e');
     	$laboratorio->potasio_e = $request->get('potasio_e');
     	$laboratorio->cloro_e = $request->get('cloro_e');
     	$laboratorio->calcio_total = $request->get('calcio_total');
     	$laboratorio->calcio_ionico = $request->get('calcio_ionico');
     	$laboratorio->magnesio_e = $request->get('magnesio_e');
     	$laboratorio->fosforo_e = $request->get('fosforo_e');
     	$laboratorio->cobre = $request->get('cobre');
     	$laboratorio->litio = $request->get('litio');
     	$laboratorio->amonio = $request->get('amonio');
     	$laboratorio->plomo = $request->get('plomo');
     	$laboratorio->espermatograma = $request->get('espermatograma');
     	$laboratorio->estudio_calculo = $request->get('estudio_calculo');
     	$laboratorio->citoquimico_lcr = $request->get('citoquimico_lcr');
     	$laboratorio->pap_test = $request->get('pap_test');
     	$laboratorio->cultivo_antibiograma = $request->get('cultivo_antibiograma');
     	$laboratorio->gram = $request->get('gram');
     	$laboratorio->fresco = $request->get('fresco');
     	$laboratorio->baar = $request->get('baar');
     	$laboratorio->investigacion_hongos_koh = $request->get('investigacion_hongos_koh');
     	$laboratorio->control_tratamiento = $request->get('control_tratamiento');
     	$laboratorio->bh = $request->get('bh');
     	$laboratorio->hdl = $request->get('hdl');
     	$laboratorio->urea = $request->get('urea');
     	$laboratorio->ldl = $request->get('ldl');
     	$laboratorio->glucosa = $request->get('glucosa');
     	$laboratorio->creatinina = $request->get('creatinina');
     	$laboratorio->tsh = $request->get('tsh');
     	$laboratorio->trigliceridos = $request->get('trigliceridos');
     	$laboratorio->tsh_t3_ft3 = $request->get('tsh_t3_ft3');
     	$laboratorio->t4_ft4 = $request->get('t4_ft4');
     	$laboratorio->lh = $request->get('lh');
     	$laboratorio->fsh = $request->get('fsh');
     	$laboratorio->prl = $request->get('prl');
     	$laboratorio->e2 = $request->get('e2');
     	$laboratorio->p4 = $request->get('p4');
     	$laboratorio->igf1 = $request->get('igf1');
     	$laboratorio->igbp3 = $request->get('igbp3');
     	$laboratorio->pth = $request->get('pth');
     	$laboratorio->estriol = $request->get('estriol');
     	$laboratorio->androstendiona = $request->get('androstendiona');
     	$laboratorio->cortisol_am = $request->get('cortisol_am');
     	$laboratorio->cortisol_pm = $request->get('cortisol_pm');
     	$laboratorio->acth = $request->get('acth');
     	$laboratorio->testosterona_total = $request->get('testosterona_total');
     	$laboratorio->testosterona_libre = $request->get('testosterona_libre');
     	$laboratorio->hcg_cuantitativa = $request->get('hcg_cuantitativa');
     	$laboratorio->hormona_crecimiento_peptido_c = $request->get('hormona_crecimiento_peptido_c');
     	$laboratorio->ferritina = $request->get('ferritina');
     	$laboratorio->insulina_ayudas = $request->get('insulina_ayudas');
     	$laboratorio->insulina_2_h = $request->get('insulina_2_h');
     	$laboratorio->peptido_c = $request->get('peptido_c');
     	$laboratorio->perfil_general = $request->get('perfil_general');
     	$laboratorio->cocaina = $request->get('cocaina');
     	$laboratorio->marihuana = $request->get('marihuana');
     	$laboratorio->ac_valproico = $request->get('ac_valproico');
     	$laboratorio->carbamazepina = $request->get('carbamazepina');
     	$laboratorio->ciclosporina_basal = $request->get('ciclosporina_basal');
     	$laboratorio->ciclosporina_2horas = $request->get('ciclosporina_2horas');
     	$laboratorio->digoxina = $request->get('digoxina');
     	$laboratorio->escopolamina = $request->get('escopolamina');
     	$laboratorio->fenitoina = $request->get('fenitoina');
     	$laboratorio->fenobarbital = $request->get('fenobarbital');
     	$laboratorio->teofilina = $request->get('teofilina');
     	$laboratorio->vancomicina = $request->get('vancomicina');
     	$laboratorio->perfil_diabetes = $request->get('perfil_diabetes');
     	$laboratorio->pefil_hepatico = $request->get('pefil_hepatico');
     	$laboratorio->perfil_lipidico = $request->get('perfil_lipidico');
     	$laboratorio->perfil_reumatico = $request->get('perfil_reumatico');
     	$laboratorio->tiroiditis = $request->get('tiroiditis');
     	$laboratorio->prequirurgico = $request->get('prequirurgico');
     	$laboratorio->pruebas_inmunologicas = $request->get('pruebas_inmunologicas');
     	$laboratorio->hipotiroidismo = $request->get('hipotiroidismo');
     	$laboratorio->copia_cefalica = $request->get('copia_cefalica');
     	$laboratorio->copia_cefalometria = $request->get('copia_cefalometria');
     	$laboratorio->panoramico_digital_shick = $request->get('panoramico_digital_shick');
     	$laboratorio->cdrpank_schick_panoramico_digital = $request->get('cdrpank_schick_panoramico_digital');
     	$laboratorio->schick_panoramico_digital = $request->get('schick_panoramico_digital');
     	$laboratorio->tomografia_dental_3d = $request->get('tomografia_dental_3d');
     	$laboratorio->tomografia_senos_nasales = $request->get('tomografia_senos_nasales');
     	$laboratorio->tomografia_atm = $request->get('tomografia_atm');
     	$laboratorio->oclusal_superior = $request->get('oclusal_superior');
     	$laboratorio->oclusal_inferior = $request->get('oclusal_inferior');
     	$laboratorio->rx_panoramica = $request->get('rx_panoramica');
     	$laboratorio->rx_cefalica_perfil = $request->get('rx_cefalica_perfil');
     	$laboratorio->cefalometria = $request->get('cefalometria');
     	$laboratorio->modelos_ortodoncia = $request->get('modelos_ortodoncia');
     	$laboratorio->fotografia_ortodoncia = $request->get('fotografia_ortodoncia');
     	$laboratorio->estudio_ortodoncia = $request->get('estudio_ortodoncia');
     	$laboratorio->copia_tomografia = $request->get('copia_tomografia');
     	$laboratorio->informe_examen = $request->get('informe_examen');
     	$laboratorio->planificacion_implantes = $request->get('planificacion_implantes');
     	$laboratorio->copia_rx_panoramico = $request->get('copia_rx_panoramico');
     	$laboratorio->rx_anteroposterior_cara = $request->get('rx_anteroposterior_cara');
     	$laboratorio->rx_posteroanterior_cara = $request->get('rx_posteroanterior_cara');
     	$laboratorio->rx_articulacion_tmp_mandibular_ba = $request->get('rx_articulacion_tmp_mandibular_ba');
     	$laboratorio->rx_articulacion_tmp_mandibular_bc = $request->get('rx_articulacion_tmp_mandibular_bc');
     	$laboratorio->informe_radiologico_simple = $request->get('informe_radiologico_simple');
     	$laboratorio->informe_radiologico_completo = $request->get('informe_radiologico_completo');
     	$laboratorio->servicios_varios = $request->get('servicios_varios');
     	$laboratorio->trazado_cefalometrico_sin_placa = $request->get('trazado_cefalometrico_sin_placa');
     	$laboratorio->txt_otros_orina = $request->get('txt_otros_orina');
     	$laboratorio->txtOtrosElectro = $request->get('txtOtrosElectro');
     	$laboratorio->txtEstLiq = $request->get('txtEstLiq');
     	$laboratorio->txtMuestra = $request->get('txtMuestra');
     	$laboratorio->txtDiasNo = $request->get('txtDiasNo');

     	$response = $laboratorio->save();
     	return response()->json([
     		"response" => $response,
     		"laboratorio" =>$laboratorio]);
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


     $operation = 'update';
     $page_title = 'Laboratorio';
     $laboratorio = ModLaboratorio::findOrFail($id);
     $medicos =  ModMedico::all();
     $pacientes = ModPaciente::all();
     return view("laboratorio.index", ["laboratorio"=>$laboratorio],compact('page_title', 'operation','medicos','pacientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function update(Request $request, $id)
     {
      $laboratorio = ModLaboratorio::findOrFail($id);
     	$laboratorio->id_medico = $request->get('id_medico');
     	$laboratorio->id_paciente = $request->get('id_paciente');
     	$laboratorio->fecha = $request->get('fecha');
     	$laboratorio->bio_h = $request->get('bio_h');
     	$laboratorio->hto_hb = $request->get('hto_hb');
     	$laboratorio->reticulocitos = $request->get('reticulocitos');
     	$laboratorio->sedimentacion_ves = $request->get('sedimentacion_ves');
     	$laboratorio->formula_leuco = $request->get('formula_leuco');
     	$laboratorio->plaquetas = $request->get('plaquetas');
     	$laboratorio->grupo_sanguineo = $request->get('grupo_sanguineo');
     	$laboratorio->elemental_microscopico = $request->get('elemental_microscopico');
     	$laboratorio->gota_fresca = $request->get('gota_fresca');
     	$laboratorio->gram_o = $request->get('gram_o');
     	$laboratorio->microalbuminuria = $request->get('microalbuminuria');
     	$laboratorio->proteinuria24 = $request->get('proteinuria24');
     	$laboratorio->depuracion_creatinina = $request->get('depuracion_creatinina');
     	$laboratorio->sodio = $request->get('sodio');
     	$laboratorio->potasio = $request->get('potasio');
     	$laboratorio->cloro = $request->get('cloro');
     	$laboratorio->ac_urico = $request->get('ac_urico');
     	$laboratorio->calcio = $request->get('calcio');
     	$laboratorio->fosforo = $request->get('fosforo');
     	$laboratorio->magnesio = $request->get('magnesio');
     	$laboratorio->prueba_embarazo = $request->get('prueba_embarazo');
     	$laboratorio->panel_drogas = $request->get('panel_drogas');
     	$laboratorio->asto_cuantitativo = $request->get('asto_cuantitativo');
     	$laboratorio->pcr_cualitativo = $request->get('pcr_cualitativo');
     	$laboratorio->latex = $request->get('latex');
     	$laboratorio->vdrl = $request->get('vdrl');
     	$laboratorio->aglutinaciones_febriles = $request->get('aglutinaciones_febriles');
     	$laboratorio->helicobacter_pylori = $request->get('helicobacter_pylori');
     	$laboratorio->peptido_citrulinado = $request->get('peptido_citrulinado');
     	$laboratorio->anti_citrulina = $request->get('anti_citrulina');
     	$laboratorio->tp = $request->get('tp');
     	$laboratorio->ttp = $request->get('ttp');
     	$laboratorio->tiempo_trombina = $request->get('tiempo_trombina');
     	$laboratorio->inr = $request->get('inr');
     	$laboratorio->tiempo_coagulacion = $request->get('tiempo_coagulacion');
     	$laboratorio->fibrinogeno = $request->get('fibrinogeno');
     	$laboratorio->tiempo_hemorragia = $request->get('tiempo_hemorragia');
     	$laboratorio->antitrombina_iii = $request->get('antitrombina_iii');
     	$laboratorio->coombs_directo = $request->get('coombs_directo');
     	$laboratorio->coombs_indirecto = $request->get('coombs_indirecto');
     	$laboratorio->retraccion_coagulo = $request->get('retraccion_coagulo');
     	$laboratorio->anti_toxoplasma = $request->get('anti_toxoplasma');
     	$laboratorio->igg_anti_toxoplasma = $request->get('igg_anti_toxoplasma');
     	$laboratorio->igm_anti_toxoplasma = $request->get('igm_anti_toxoplasma');
     	$laboratorio->anti_rubeola = $request->get('anti_rubeola');
     	$laboratorio->igg_anti_rubeola = $request->get('igg_anti_rubeola');
     	$laboratorio->igm_anti_rubeola = $request->get('igm_anti_rubeola');
     	$laboratorio->anti_cmv = $request->get('anti_cmv');
     	$laboratorio->igg_anti_cmv = $request->get('igg_anti_cmv');
     	$laboratorio->igm_anti_cmv = $request->get('igm_anti_cmv');
     	$laboratorio->anti_herpes_i = $request->get('anti_herpes_i');
     	$laboratorio->igg_anti_herpes_i = $request->get('igg_anti_herpes_i');
     	$laboratorio->igm_anti_herpes_i = $request->get('igm_anti_herpes_i');
     	$laboratorio->anti_herpes_ii = $request->get('anti_herpes_ii');
     	$laboratorio->igg_anti_herpes_ii = $request->get('igg_anti_herpes_ii');
     	$laboratorio->igm_anti_herpes_ii = $request->get('igm_anti_herpes_ii');
     	$laboratorio->torch = $request->get('torch');
     	$laboratorio->igg_torch = $request->get('igg_torch');
     	$laboratorio->igm_torch = $request->get('igm_torch');
     	$laboratorio->c3 = $request->get('c3');
     	$laboratorio->c4 = $request->get('c4');
     	$laboratorio->igm = $request->get('igm');
     	$laboratorio->ige = $request->get('ige');
     	$laboratorio->iga = $request->get('iga');
     	$laboratorio->igd = $request->get('igd');
     	$laboratorio->igg = $request->get('igg');
     	$laboratorio->chlamidia = $request->get('chlamidia');
     	$laboratorio->igg_chlamidia = $request->get('igg_chlamidia');
     	$laboratorio->igm_chlamidia = $request->get('igm_chlamidia');
     	$laboratorio->iga_chlamidia = $request->get('iga_chlamidia');
     	$laboratorio->hepatitis_a = $request->get('hepatitis_a');
     	$laboratorio->igg_hepatitis_a = $request->get('igg_hepatitis_a');
     	$laboratorio->igm_hepatitis_a = $request->get('igm_hepatitis_a');
     	$laboratorio->hepatitis_b = $request->get('hepatitis_b');
     	$laboratorio->hbsag_hepatitis_b = $request->get('hbsag_hepatitis_b');
     	$laboratorio->anti_hbs_hepatitis_b = $request->get('anti_hbs_hepatitis_b');
     	$laboratorio->hbc_hepatitis_b = $request->get('hbc_hepatitis_b');
     	$laboratorio->igg_hepatitis_b = $request->get('igg_hepatitis_b');
     	$laboratorio->igm_hepatitis_b = $request->get('igm_hepatitis_b');
     	$laboratorio->hbeag_hepatitis_b = $request->get('hbeag_hepatitis_b');
     	$laboratorio->anti_hbe_hepatitis_b = $request->get('anti_hbe_hepatitis_b');
     	$laboratorio->hepatitis_c = $request->get('hepatitis_c');
     	$laboratorio->tuberculosis_suero = $request->get('tuberculosis_suero');
     	$laboratorio->ac_antinucleares = $request->get('ac_antinucleares');
     	$laboratorio->ac_anti_dna = $request->get('ac_anti_dna');
     	$laboratorio->celulas_le = $request->get('celulas_le');
     	$laboratorio->anticitrulina_anti_ccp = $request->get('anticitrulina_anti_ccp');
     	$laboratorio->ac_antimicrosomales = $request->get('ac_antimicrosomales');
     	$laboratorio->ac_antitiroglobulinas = $request->get('ac_antitiroglobulinas');
     	$laboratorio->ana_biot = $request->get('ana_biot');
     	$laboratorio->antifosfolipidos = $request->get('antifosfolipidos');
     	$laboratorio->autoinmunidad_igg  = $request->get('autoinmunidad_igg ');
     	$laboratorio->igm_antifosfolipidos = $request->get('igm_antifosfolipidos');
     	$laboratorio->anticardiolipinas = $request->get('anticardiolipinas');
     	$laboratorio->igg_anticardiolipinas = $request->get('igg_anticardiolipinas');
     	$laboratorio->igm_anticardiolipinas = $request->get('igm_anticardiolipinas');
     	$laboratorio->anti_b2gp1 = $request->get('anti_b2gp1');
     	$laboratorio->ancas = $request->get('ancas');
     	$laboratorio->anti_mitocondriales = $request->get('anti_mitocondriales');
     	$laboratorio->quimica_sanguinea_glu_ayuna = $request->get('quimica_sanguinea_glu_ayuna');
     	$laboratorio->quimica_sanguinea_glu2h_post_p = $request->get('quimica_sanguinea_glu2h_post_p');
     	$laboratorio->curva_glucosa = $request->get('curva_glucosa');
     	$laboratorio->fructosamina = $request->get('fructosamina');
     	$laboratorio->urea_q = $request->get('urea_q');
     	$laboratorio->creatinina_q = $request->get('creatinina_q');
     	$laboratorio->bun = $request->get('bun');
     	$laboratorio->acido_urico = $request->get('acido_urico');
     	$laboratorio->colesterol = $request->get('colesterol');
     	$laboratorio->hdl_colesterol = $request->get('hdl_colesterol');
     	$laboratorio->ldl_colesterol = $request->get('ldl_colesterol');
     	$laboratorio->trigliceridos_q = $request->get('trigliceridos_q');
     	$laboratorio->apolipoproteina_a = $request->get('apolipoproteina_a');
     	$laboratorio->apolipoproteina_b = $request->get('apolipoproteina_b');
     	$laboratorio->vldl = $request->get('vldl');
     	$laboratorio->bilirrubinas_total = $request->get('bilirrubinas_total');
     	$laboratorio->proteinas_totales = $request->get('proteinas_totales');
     	$laboratorio->albumina = $request->get('albumina');
     	$laboratorio->globulina = $request->get('globulina');
     	$laboratorio->hb_glicosilada = $request->get('hb_glicosilada');
     	$laboratorio->hierro_serico = $request->get('hierro_serico');
     	$laboratorio->hierro_captacion_fijacion = $request->get('hierro_captacion_fijacion');
     	$laboratorio->vit_b12 = $request->get('vit_b12');
     	$laboratorio->transferrina = $request->get('transferrina');
     	$laboratorio->ferritina_q = $request->get('ferritina_q');
     	$laboratorio->ac_folico = $request->get('ac_folico');
     	$laboratorio->ins_saturacion = $request->get('ins_saturacion');
     	$laboratorio->quimica_sanguinea_tgo_ast = $request->get('quimica_sanguinea_tgo_ast');
     	$laboratorio->tgp_alt = $request->get('tgp_alt');
     	$laboratorio->cpk = $request->get('cpk');
     	$laboratorio->cpk_mb = $request->get('cpk_mb');
     	$laboratorio->quimica_sanguinea_gamma_gt = $request->get('quimica_sanguinea_gamma_gt');
     	$laboratorio->troponina = $request->get('troponina');
     	$laboratorio->quimica_sanguinea_fosfatasa_alcalina = $request->get('quimica_sanguinea_fosfatasa_alcalina');
     	$laboratorio->aldolasa = $request->get('aldolasa');
     	$laboratorio->fosfatasa_acida = $request->get('fosfatasa_acida');
     	$laboratorio->fost_ac_prostatica = $request->get('fost_ac_prostatica');
     	$laboratorio->amilasa = $request->get('amilasa');
     	$laboratorio->lipasa = $request->get('lipasa');
     	$laboratorio->glucosa_6_fosfato_dh = $request->get('glucosa_6_fosfato_dh');
     	$laboratorio->deshidrogenasa_lactica = $request->get('deshidrogenasa_lactica');
     	$laboratorio->colinesterasa = $request->get('colinesterasa');
     	$laboratorio->acido_lactico = $request->get('acido_lactico');
     	$laboratorio->osmolaridad_serica = $request->get('osmolaridad_serica');
     	$laboratorio->coproparasitario_rutina = $request->get('coproparasitario_rutina');
     	$laboratorio->coproparasitario_seriado = $request->get('coproparasitario_seriado');
     	$laboratorio->inv_polimorfonucleares = $request->get('inv_polimorfonucleares');
     	$laboratorio->sangre_oculta = $request->get('sangre_oculta');
     	$laboratorio->rotavirus = $request->get('rotavirus');
     	$laboratorio->ph = $request->get('ph');
     	$laboratorio->concentracion = $request->get('concentracion');
     	$laboratorio->andenovirus = $request->get('andenovirus');
     	$laboratorio->sudan_iii = $request->get('sudan_iii');
     	$laboratorio->coprologico = $request->get('coprologico');
     	$laboratorio->cea_carcino_embrionario = $request->get('cea_carcino_embrionario');
     	$laboratorio->afp_alfa_feto_proteina = $request->get('afp_alfa_feto_proteina');
     	$laboratorio->psa_antigeno_prostatico_especifico = $request->get('psa_antigeno_prostatico_especifico');
     	$laboratorio->psa_libre = $request->get('psa_libre');
     	$laboratorio->ca_125 = $request->get('ca_125');
     	$laboratorio->ca_19_9 = $request->get('ca_19_9');
     	$laboratorio->anti_tpo = $request->get('anti_tpo');
     	$laboratorio->neuroenolasa_especifica = $request->get('neuroenolasa_especifica');
     	$laboratorio->hcgb = $request->get('hcgb');
     	$laboratorio->ca_15_3 = $request->get('ca_15_3');
     	$laboratorio->ca_72_4 = $request->get('ca_72_4');
     	$laboratorio->tiroglobulina = $request->get('tiroglobulina');
     	$laboratorio->sodio_e = $request->get('sodio_e');
     	$laboratorio->potasio_e = $request->get('potasio_e');
     	$laboratorio->cloro_e = $request->get('cloro_e');
     	$laboratorio->calcio_total = $request->get('calcio_total');
     	$laboratorio->calcio_ionico = $request->get('calcio_ionico');
     	$laboratorio->magnesio_e = $request->get('magnesio_e');
     	$laboratorio->fosforo_e = $request->get('fosforo_e');
     	$laboratorio->cobre = $request->get('cobre');
     	$laboratorio->litio = $request->get('litio');
     	$laboratorio->amonio = $request->get('amonio');
     	$laboratorio->plomo = $request->get('plomo');
     	$laboratorio->espermatograma = $request->get('espermatograma');
     	$laboratorio->estudio_calculo = $request->get('estudio_calculo');
     	$laboratorio->citoquimico_lcr = $request->get('citoquimico_lcr');
     	$laboratorio->pap_test = $request->get('pap_test');
     	$laboratorio->cultivo_antibiograma = $request->get('cultivo_antibiograma');
     	$laboratorio->gram = $request->get('gram');
     	$laboratorio->fresco = $request->get('fresco');
     	$laboratorio->baar = $request->get('baar');
     	$laboratorio->investigacion_hongos_koh = $request->get('investigacion_hongos_koh');
     	$laboratorio->control_tratamiento = $request->get('control_tratamiento');
     	$laboratorio->bh = $request->get('bh');
     	$laboratorio->hdl = $request->get('hdl');
     	$laboratorio->urea = $request->get('urea');
     	$laboratorio->ldl = $request->get('ldl');
     	$laboratorio->glucosa = $request->get('glucosa');
     	$laboratorio->creatinina = $request->get('creatinina');
     	$laboratorio->tsh = $request->get('tsh');
     	$laboratorio->trigliceridos = $request->get('trigliceridos');
     	$laboratorio->tsh_t3_ft3 = $request->get('tsh_t3_ft3');
     	$laboratorio->t4_ft4 = $request->get('t4_ft4');
     	$laboratorio->lh = $request->get('lh');
     	$laboratorio->fsh = $request->get('fsh');
     	$laboratorio->prl = $request->get('prl');
     	$laboratorio->e2 = $request->get('e2');
     	$laboratorio->p4 = $request->get('p4');
     	$laboratorio->igf1 = $request->get('igf1');
     	$laboratorio->igbp3 = $request->get('igbp3');
     	$laboratorio->pth = $request->get('pth');
     	$laboratorio->estriol = $request->get('estriol');
     	$laboratorio->androstendiona = $request->get('androstendiona');
     	$laboratorio->cortisol_am = $request->get('cortisol_am');
     	$laboratorio->cortisol_pm = $request->get('cortisol_pm');
     	$laboratorio->acth = $request->get('acth');
     	$laboratorio->testosterona_total = $request->get('testosterona_total');
     	$laboratorio->testosterona_libre = $request->get('testosterona_libre');
     	$laboratorio->hcg_cuantitativa = $request->get('hcg_cuantitativa');
     	$laboratorio->hormona_crecimiento_peptido_c = $request->get('hormona_crecimiento_peptido_c');
     	$laboratorio->ferritina = $request->get('ferritina');
     	$laboratorio->insulina_ayudas = $request->get('insulina_ayudas');
     	$laboratorio->insulina_2_h = $request->get('insulina_2_h');
     	$laboratorio->peptido_c = $request->get('peptido_c');
     	$laboratorio->perfil_general = $request->get('perfil_general');
     	$laboratorio->cocaina = $request->get('cocaina');
     	$laboratorio->marihuana = $request->get('marihuana');
     	$laboratorio->ac_valproico = $request->get('ac_valproico');
     	$laboratorio->carbamazepina = $request->get('carbamazepina');
     	$laboratorio->ciclosporina_basal = $request->get('ciclosporina_basal');
     	$laboratorio->ciclosporina_2horas = $request->get('ciclosporina_2horas');
     	$laboratorio->digoxina = $request->get('digoxina');
     	$laboratorio->escopolamina = $request->get('escopolamina');
     	$laboratorio->fenitoina = $request->get('fenitoina');
     	$laboratorio->fenobarbital = $request->get('fenobarbital');
     	$laboratorio->teofilina = $request->get('teofilina');
     	$laboratorio->vancomicina = $request->get('vancomicina');
     	$laboratorio->perfil_diabetes = $request->get('perfil_diabetes');
     	$laboratorio->pefil_hepatico = $request->get('pefil_hepatico');
     	$laboratorio->perfil_lipidico = $request->get('perfil_lipidico');
     	$laboratorio->perfil_reumatico = $request->get('perfil_reumatico');
     	$laboratorio->tiroiditis = $request->get('tiroiditis');
     	$laboratorio->prequirurgico = $request->get('prequirurgico');
     	$laboratorio->pruebas_inmunologicas = $request->get('pruebas_inmunologicas');
     	$laboratorio->hipotiroidismo = $request->get('hipotiroidismo');
     	$laboratorio->copia_cefalica = $request->get('copia_cefalica');
     	$laboratorio->copia_cefalometria = $request->get('copia_cefalometria');
     	$laboratorio->panoramico_digital_shick = $request->get('panoramico_digital_shick');
     	$laboratorio->cdrpank_schick_panoramico_digital = $request->get('cdrpank_schick_panoramico_digital');
     	$laboratorio->schick_panoramico_digital = $request->get('schick_panoramico_digital');
     	$laboratorio->tomografia_dental_3d = $request->get('tomografia_dental_3d');
     	$laboratorio->tomografia_senos_nasales = $request->get('tomografia_senos_nasales');
     	$laboratorio->tomografia_atm = $request->get('tomografia_atm');
     	$laboratorio->oclusal_superior = $request->get('oclusal_superior');
     	$laboratorio->oclusal_inferior = $request->get('oclusal_inferior');
     	$laboratorio->rx_panoramica = $request->get('rx_panoramica');
     	$laboratorio->rx_cefalica_perfil = $request->get('rx_cefalica_perfil');
     	$laboratorio->cefalometria = $request->get('cefalometria');
     	$laboratorio->modelos_ortodoncia = $request->get('modelos_ortodoncia');
     	$laboratorio->fotografia_ortodoncia = $request->get('fotografia_ortodoncia');
     	$laboratorio->estudio_ortodoncia = $request->get('estudio_ortodoncia');
     	$laboratorio->copia_tomografia = $request->get('copia_tomografia');
     	$laboratorio->informe_examen = $request->get('informe_examen');
     	$laboratorio->planificacion_implantes = $request->get('planificacion_implantes');
     	$laboratorio->copia_rx_panoramico = $request->get('copia_rx_panoramico');
     	$laboratorio->rx_anteroposterior_cara = $request->get('rx_anteroposterior_cara');
     	$laboratorio->rx_posteroanterior_cara = $request->get('rx_posteroanterior_cara');
     	$laboratorio->rx_articulacion_tmp_mandibular_ba = $request->get('rx_articulacion_tmp_mandibular_ba');
     	$laboratorio->rx_articulacion_tmp_mandibular_bc = $request->get('rx_articulacion_tmp_mandibular_bc');
     	$laboratorio->informe_radiologico_simple = $request->get('informe_radiologico_simple');
     	$laboratorio->informe_radiologico_completo = $request->get('informe_radiologico_completo');
     	$laboratorio->servicios_varios = $request->get('servicios_varios');
     	$laboratorio->trazado_cefalometrico_sin_placa = $request->get('trazado_cefalometrico_sin_placa');
     	$laboratorio->txt_otros_orina = $request->get('txt_otros_orina');
     	$laboratorio->txtOtrosElectro = $request->get('txtOtrosElectro');
     	$laboratorio->txtEstLiq = $request->get('txtEstLiq');
     	$laboratorio->txtMuestra = $request->get('txtMuestra');
     	$laboratorio->txtDiasNo = $request->get('txtDiasNo');

     	$response = $laboratorio->save();
     	return response()->json([
     		"response" => $response,
     		"laboratorio" =>$laboratorio]);
     }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
