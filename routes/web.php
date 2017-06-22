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

Route::get('/home', 'PublicationController@afficher');

/* Route client */
Route::get('/client/{id}',"GestionClientController@DisplayEditClient" );
Route::get('/deleteclient/{id}',"GestionClientController@DeleteClient" );
Route::post('/editclient',"GestionClientController@EditClient" );
Route::get('/gestionclient', 'GestionClientController@index')->name('gestionclient');

/* Route magazine */
Route::get('/publication/{id}',"PublicationController@DisplayEditPublication" );
Route::post('/editpublication',"PublicationController@EditPublication");
Route::post('ajouterPublication','PublicationController@ajouterPublication'); // Validation Formulaire Création publications
Route::get('/listemagazine', "PublicationController@afficher");
Route::get('/creerpublication', 'PublicationController@index')->name('home'); // Formulaire Création publications

/* Routes historique */
Route::get('/historiqueclient', 'HistoriqueClientController@DisplayHistorique');


/* Route historique Vincent (Global)*/
Route::get('/creerhistoriqueglobal', 'HistoriqueClientController@formulaireAjoutHistoriqueGlobal'); // Formulaire Création Historique
Route::post('/ajouthistoriqueglobal', 'HistoriqueClientController@ajouterHistoriqueGlobal'); // alidation Formulaire Historique

/* Route historique Loick*/
Route::get('/displayajouthistoriqueclient/{id}', 'HistoriqueClientController@DisplayAjouterHistoriqueClient'); // Formulaire Historique
Route::post('/ajouthistoriqueclient', 'HistoriqueClientController@AjoutHistoriqueClient'); // Validation Formulaire Historique



