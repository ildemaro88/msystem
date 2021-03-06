<?php


Route::resource('/admin/medico/agenda', 'AdminAgendaController');
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

//----- Start Route Optometria -----//
//Route::get('admin/orden_examenes/{id}/print', 'AdminOrdenExamenesController@printPDF');
Route::get('admin/optometria/print/{id}', 'AdminOptometriaController@printPDF');
Route::get('admin/optometria/print_r/{id}', 'AdminOptometriaController@print_rPDF');
Route::post('admin/optometria', 'AdminOptometriaController@store');
Route::get('admin/optometria/ingresar/{id}', 'AdminOptometriaController@ingresar');
Route::get('admin/optometria/finalizar/{id}', 'AdminOptometriaController@finalizar');
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


Route::get('autocomplete',array('as'=>'autocomplete','uses'=>'SearchController@autocomplete'));
Route::get('autocompleteEspecialidad',array('as'=>'autocompleteEspecialidad','uses'=>'SearchController@autocompleteEspecialidad'));
Route::get('autocompleteCodigo',array('as'=>'autocompleteCodigo','uses'=>'SearchController@autocompleteCodigo'));

Route::get('searchCie',  array('as' =>'searchCie' ,'uses' => 'AdminCieController@getCieByDescription'));
Route::get('searchDescripcion',  array('as' =>'searchDescripcion' ,'uses' => 'AdminCieController@getDescriptionByCie'));