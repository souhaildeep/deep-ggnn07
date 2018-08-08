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
    return view('layouts.app');
});


Route::get('excursion/list','ExcusionController@list');
Route::get('excursion/listcorbeille','ExcusionController@listcorbeille');
Route::get('excursion/add','ExcusionController@create');
Route::post('excursion/add','ExcusionController@store');
Route::get('excursion/{id}/{slug}','ExcusionController@show');
Route::put('excursion/{id}','ExcusionController@update');
Route::delete('excursion/destroyexcursions/{id}', 'ExcusionController@destroyExcursions');
Route::post('/excursion/addpics', 'ExcusionController@addImage');
Route::post('/excursion/destroypics', 'ExcusionController@destroyImages');

//Route::post('/add', '@store');
Route::get('notification', 'ExcusionController@notification');


// excursions active ou desactive 

Route::get('/update_active/{id}', 'ExcusionController@updateActive');

// excursions top ou bien non 

Route::get('/update_top/{id}', 'ExcusionController@updateTop');

//ville
Route::get('ville/list','ExcusionController@listVille');
Route::post('ville/add','ExcusionController@storeville');
Route::get('ville/listcorbeille','ExcusionController@villecorbeille');
Route::get('ville/modification/{id}','ExcusionController@afficherVille');
Route::put('ville/{id}','ExcusionController@editVille');
Route::delete('ville/destroyville/{id}', 'ExcusionController@destroyVille');
Route::get('ville/restore_ville/{id}', 'ExcusionController@restorVille');

//Circuit 
Route::get('circuit/list','CircuitController@list');
Route::get('circuit/listcorbeille','CircuitController@listcorbeille');
Route::get('circuit/add','CircuitController@create');
Route::post('circuit/add','CircuitController@store');
Route::get('circuit/{id}/{slug}','CircuitController@show');

Route::delete('circuit/destroycercuit/{id}', 'CircuitController@destroyCircuit');
Route::post('/circuit/addpics', 'CircuitController@addImage');
Route::post('/circuit/destroypics', 'CircuitController@destroyImages');
// Circuit active ou desactive 
Route::get('circuite/update_active/{id}', 'CircuitController@updateActive');

// Circuit top ou bien non 
Route::get('circuite/update_top/{id}', 'CircuitController@updateTop');

//circuit and  plans days => update
Route::post('circuit/updateall', 'CircuitController@updateAll');

//setting langue
Route::get('langue','LangueController@index');
Route::get('langue/activer/{id}', 'LangueController@updateActive');

//Reservation rout
Route::get('reservation/list','ReservationController@index');
Route::get('reservation/{type}/add/{id}','ReservationController@create');
//Route::get('reservation/{type}/add/{id}','ReservationController@create');
Route::post('reservation/add','ReservationController@store');
Route::delete('reservation/destroyreserv/{id}', 'ReservationController@destroyResv');
Route::get('reservation/corbeille','ReservationController@listcorbeille');
Route::get('reservation/facture/{id}','ReservationController@showfacture');


//setting Facture
Route::get('facture','FactureController@index');
Route::get('facture/add','FactureController@create');
Route::post('facture/add','FactureController@store');
Route::get('facture/modification/{id}','FactureController@show');
Route::put('facture/modification/{id}','FactureController@update');
Route::delete('facture/destroyfacture/{id}', 'FactureController@destroyVille');

//page contact 
Route::get('contact/list','ContacteController@index');
Route::get('contact/add','ContacteController@create');
Route::post('contact/add','ContacteController@store');
Route::get('contact/modification/{id}','ContacteController@show');
Route::put('contact/modification/{id}','ContacteController@update');

//page devis 
Route::get('devis/list','DeviController@index');
Route::get('devis/add','DeviController@create');
Route::post('devis/add','DeviController@store');
Route::get('devis/modification/{id}','DeviController@show');
Route::put('devis/modification/{id}','DeviController@update');




