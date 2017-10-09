<?php


//Route::resource('/admin/medico/agenda', 'AdminAgendaController');
Route::resource('/admin/medico/agenda', 'AdminAgendaController');
Route::post('/admin/medico/agenda/save','AdminAgendaController@save');
Route::put('/admin/medico/agenda/update/{id}','AdminAgendaController@update');
Route::put('/admin/medico/agenda/uptade/{id}','AdminAgendaController@updateEventDrop');
Route::get('/admin/medico/agenda/get/information/{id}', 'AdminAgendaController@getDataJson');
Route::get('/admin/medico/agenda/get/patient/{value}', 'AdminAgendaController@getPatients');
Route::get('/admin/medico/agenda/get/agreement/{business}', 'AdminAgendaController@getAgreements');
Route::get('/admin/medico/agenda/get/price/{business}/{specialty}', 'AdminAgendaController@getPrice');
Route::get('/admin/medico/agenda/event/{id}/{idNotification}', 'AdminAgendaController@showEvent');

Route::get('/admin/agenda_cirugia/salle/{id}', 'AdminAgendaQuirofanoCirugiaController@getAgendaSalle');
Route::get('/admin/quirofano/agenda/get/patient/{value}', 'AdminAgendaQuirofanoCirugiaController@getPatients');
Route::get('/admin/quirofano/agenda/get/doctor/{value}', 'AdminAgendaQuirofanoCirugiaController@getDoctors');
Route::get('/admin/quirofano/agenda/get/assistant/{value}/{type}', 'AdminAgendaQuirofanoCirugiaController@getAssistants');
Route::get('/admin/quirofano/agenda/get/salle/{value}', 'AdminAgendaQuirofanoCirugiaController@getSalles');
Route::get('/admin/quirofano/agenda/get/salles', 'AdminAgendaQuirofanoCirugiaController@getSallesForIndex');
Route::post('/admin/quirofano/agenda/save','AdminAgendaQuirofanoCirugiaController@save');
Route::put('/admin/quirofano/agenda/update/{id}','AdminAgendaQuirofanoCirugiaController@update');
Route::delete('/admin/quirofano/agenda/delete/{id}','AdminAgendaQuirofanoCirugiaController@destroy');
Route::get('/admin/quirofano/agenda/events/{idSalle}','AdminAgendaQuirofanoCirugiaController@getEvents');
Route::put('/admin/quirofano/agenda/uptade/{id}','AdminAgendaQuirofanoCirugiaController@updateEventDrop');

Route::get('/admin/medico/agenda/cirugia/index', 'AdminAgendaMedicoCirugiaController@getAgenda');
Route::get('/admin/medico/agenda/cirugia/events', 'AdminAgendaMedicoCirugiaController@getEvents');
Route::get('/admin/medico/agenda/cirugia/event/{id}/{idNotification}', 'AdminAgendaMedicoCirugiaController@show');

Route::get('/admin/medico/dashboard', 'AdminMedico1Controller@dashboard');
Route::get('/admin/medico/dashboard/{id}', 'AdminCitaController@medico_citas');
Route::resource('/admin/medico/cita','AdminCitaController');
Route::resource('admin/pacientes','PacienteController');
Route::get('admin/buscarMedico','PacienteController@search');
Route::post('admin/medico/update','AdminMedico1Controller@update');
Route::get('admin/todoMedico','PacienteController@allMedic');
Route::get('admin/todoMedico/{sucursal}','PacienteController@allMedicita');
Route::get('admin/todoMedicoU','PacienteController@allMedicU');
Route::get('admin/citaDisponible','PacienteController@citaDisponible');
Route::get('admin/citaDisponible/businessHours','PacienteController@getBusinessHours');
Route::resource('/admin/paciente/registro', 'RegistroController');
Route::get('admin/verifyPaciente','PacienteController@verifyPaciente');
Route::get('admin/getPaciente','PacienteController@getPaciente');
Route::resource('admin/user','CmsUserController');
Route::resource('admin/receta','AdminRecetaController');

//----- Start Route Orden_examen -----//
Route::get('admin/orden_examenes/{id}/print', 'AdminOrdenExamenesController@printPDF');
Route::post('admin/orden_examenes', 'AdminOrdenExamenesController@store');
Route::put('admin/orden_examenes/{id}', 'AdminOrdenExamenesController@update');
// ------  End Route orden_examen ----/////

//----- Start Route Orden_examen_ocupacional -----//
Route::post('admin/orden_examenes26', 'AdminOrdenExamenes26Controller@store');
Route::put('admin/orden_examenes26/{id}', 'AdminOrdenExamenes26Controller@update');
Route::get('admin/orden_examenes_carga/{id}/upload', 'AdminOrdenExamenesCargaController@uploadResult');
Route::post('admin/orden_examenes_carga/uploadSave/{id}',['as' => 'uploadSave', 'uses' => 'AdminOrdenExamenesCargaController@saveResult']); 
// ------  End Route Orden_examen_ocupacional ----/////

//----- Start Route Orden_examen_ocupacional -----//
Route::get('admin/examenes/price/add/{idEmpresa}', 'AdminPriceExamensConsultationController@index');
Route::post('admin/examenes/price/add/save/{idEmpresa}', 'AdminPriceExamensConsultationController@savePrice');
Route::put('admin/examenes/price/send/udate/{idEmpresa}', 'AdminPriceExamensConsultationController@updatePrice');
Route::post('admin/specialty/price/add/save/{idEmpresa}', 'AdminPriceExamensConsultationController@savePriceSpecialty');
Route::put('admin/specialty/price/send/udate/{idEmpresa}', 'AdminPriceExamensConsultationController@updatePriceSpecialty');
Route::get('admin/examenes/price/elements', 'AdminPriceExamensConsultationController@getExamens');
Route::get('admin/examenes/price/specialties', 'AdminPriceExamensConsultationController@getSpecialties');
Route::get('admin/examenes/price/business/{idEmpresa}', 'AdminPriceExamensConsultationController@getPrices');
Route::get('admin/examenes/price/specialties/{idEmpresa}', 'AdminPriceExamensConsultationController@getPricesSpecialties');
// ------  End Route Orden_examen_ocupacional ----/////
//----- Start Route Optometria -----//
Route::get('admin/optometria/print/{id}', 'AdminOptometriaController@printPDF');
Route::get('admin/optometria/print_r/{id}', 'AdminOptometriaController@print_rPDF');
Route::post('admin/optometria', 'AdminOptometriaController@store');
Route::get('admin/optometria/ingresar/{id}', 'AdminOptometriaController@ingresar');
Route::put('admin/optometria/{id}', 'AdminOptometriaController@update');
// ------  End Route Optometria ----/////

//----- Start Route consulta -----//
Route::post('admin/consulta', 'AdminConsultasController@store');
Route::get('admin/consulta/ingresar/{id}', 'AdminConsultasController@ingresar');
Route::get('admin/consulta/finalizar/{id}', 'AdminConsultasController@finalizar');
Route::get('admin/consultas/print_r/{id}', 'AdminConsultasController@print_rPDF');
Route::put('admin/consulta/{id}', 'AdminConsultasController@update');
Route::get('admin/receta/print/{id_consulta}/{descripcion}', 'AdminRecetaController@printPDF');
// ------  End Route consulta ----/////

//----- Start Route Empresa -----//
Route::post('admin/empresa', 'AdminEmpresaController@store');
Route::post('admin/empresa/{id}', 'AdminEmpresaController@update');
Route::get('admin/empresa/{id}/add/sucursal', 'AdminEmpresaController@addSucursal');
Route::get('admin/empresa/{id}/sucursales', 'AdminEmpresaController@getSucursales');
Route::delete('admin/empresa/delete/{id}','AdminEmpresaController@destroy');
// ------  End Route Empresa ----/////

//----- Start Route Paciente -----//
Route::get('admin/recetas/print_r/{id}', 'AdminRecetasController@print_rPDF');
Route::post('admin/paciente', 'AdminPaciente1Controller@store');
Route::get('admin/pacienteImportar/modelo', ['as'=>'getModelo','uses'=>'AdminPacienteImportarController@getModelo']);
//Route::get('admin/paciente_importar', 'AdminPaciente1Controller@getIndex');
Route::get('admin/paciente/historias', ['as' => 'indexHistoria', 'uses' =>'AdminPaciente1Controller@listHistoria']);
Route::put('admin/paciente/{id}', 'AdminPaciente1Controller@update');
Route::get('admin/paciente/{id}/historia', ['as' => 'getHistoria', 'uses' => 'AdminPaciente1Controller@getHistoria']);
Route::get('admin/paciente/resultado/{id}', ['as' => 'openPDF', 'uses' => 'AdminPaciente1Controller@openPDF']);
Route::get('admin/paciente/resultado/count/{id}', ['as' => 'countPDF', 'uses' => 'AdminPaciente1Controller@countPDF']);
// ------  End Route Paciente ----/////

Route::get('autocomplete',array('as'=>'autocomplete','uses'=>'SearchController@autocomplete'));
Route::get('autocompleteEspecialidad',array('as'=>'autocompleteEspecialidad','uses'=>'SearchController@autocompleteEspecialidad'));
Route::get('autocompleteCodigo',array('as'=>'autocompleteCodigo','uses'=>'SearchController@autocompleteCodigo'));

Route::get('searchCie',  array('as' =>'searchCie' ,'uses' => 'AdminCieController@getCieByDescription'));
Route::get('searchDescripcion',  array('as' =>'searchDescripcion' ,'uses' => 'AdminCieController@getDescriptionByCie'));

//----- Start Route chequeo de retiro -----//
Route::get('admin/medicina-ocupacional/retiro', 'AdminConsultasController@ingresar');
// ------  End Route chequeo de retiro ----/////