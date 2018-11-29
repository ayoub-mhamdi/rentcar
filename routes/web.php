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
use App\Voiture;
use Illuminate\Support\Facades\Input;

Route::get('/', function () {
	$voitures= Voiture::all();
    return view('auth.login');
});


Route::get('/welcome', function () {
	$voitures= Voiture::all();
    return view('welcome',compact('voitures'));
});

//voiture

Route::get('/voiture','VoituresController@index');


Route::POST('/deleteVoiture','VoituresController@deleteVoiture');

Route::POST('/addVoiture','VoituresController@addVoiture');
Route::POST('/editVoiture','VoituresController@editVoiture');

Route::post('photoShow/{matricule}', 'VoituresController@photoShow');
//Route::post('/voiture','VoituresController@store');

//client

Route::get('/client','ClientsController@index');
//Route::post('/client','ClientsController@store');
Route::get('/client/{client}','ClientsController@view');

Route::POST('editClient','ClientsController@editClient');
Route::POST('deleteClient','ClientsController@deleteClient');
Route::POST('addClient','ClientsController@addClient');


Route::post('client/{cin}', 'ClientsController@getclientData');
Route::post('getInfraction/{cin}', 'ClientsController@infractions');

Route::post('photo/{cin}', 'ClientsController@getcinphoto');


Route::post('/addInfraction', 'ClientsController@addInfraction');



//parc

Route::get('/parc','VoituresController@index');



//parc
Route::get('/parc','LocationsController@indexV');

Route::post('voiture/{matricule}', 'LocationsController@getCarData');

Route::post('reservation/{matricule}', 'LocationsController@reservation');

Route::POST('/reserver','LocationsController@reserver');

Route::POST('/editReservation','LocationsController@editReservation');

//location

Route::get('/location','LocationsController@index');
Route::get('/voirplus/{id}','LocationsController@voirplus');

Route::get('/statistique/{matricule}/{mois}/{annee}','LocationsController@statistique');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
