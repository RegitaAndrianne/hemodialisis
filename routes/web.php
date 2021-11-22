<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return view('welcome');
});

Auth::routes();

// Auth::routes([
//   // 'register' => false,
//   'verify' => true,
//   // 'reset' => false
// ]);


Route::middleware('auth')->group(function () {

	Route::get('/home', 'HomeController@index');

	Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

	Route::group(['middleware' => ['checkRoles:admin']], function () {

		Route::resource('users', 'UserController');
	});

	Route::group(['middleware' => ['checkRoles:medis,paramedis,admin']], function () {

		Route::resource('patients', 'PatientController');

		Route::resource('machines', 'MachineController');

		Route::resource('reports', 'ReportController');

		Route::resource('parameters', 'ParameterController');

		Route::get('reports-with-machine-ID/{machine_id}', 'ReportController@index_report_filterV1')->name('reports.filterV1');


		Route::get('machines-with-patient-ID/{patient_id}', 'MachineController@index_machine_filter')->name('machines.filter');

	});
	Route::group(['middleware' => ['checkRoles:patient,admin,medis,paramedis']], function () {


		Route::get('machine-for-patient','MachineController@index_machine_role_patient')->name('machines.patient');



		Route::get('reports-with-machine-ID/{machine_id}/patient-id/{patient_id}', 'ReportController@index_report_filter')->name('reports.filter');


		Route::get('parameters-with-report-ID/{report_id}', 'ParameterController@index_parameter_filter')->name('parameters.filter');

		Route::get('/parameters/cetak_pdf/{report_id}', 'ParameterController@cetak_pdf');

	});


});

