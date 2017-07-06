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
Route::post('/gestionclient', 'GestionClientController@FiltreClient'); // Rechercher un client

/* Route client gestion abonnement */
Route::get('/arreteraboencours/{id}/{idclient}',"AbonnementClientController@ArretAboEnCours" );
Route::get('/pauseaboencours/{id}/{idclient}',"AbonnementClientController@PauseAboEnCours" );
Route::get('/redemarreraboenpause/{id}/{idclient}',"AbonnementClientController@RedemarrerAboEnPause" );
Route::get('/arreteraboenpause/{id}/{idclient}',"AbonnementClientController@ArreterAboEnPause" );
Route::get('/redemarrerabostopper/{id}/{idclient}',"AbonnementClientController@RedemarrerAboStopper" );
Route::get('/displayajoutabonnement/{id}', 'AbonnementClientController@DisplayAjouterAbonnementClient'); // Formulaire Historique
Route::post('/ajoutabonnementclient', 'AbonnementClientController@AjoutAbonnementClient'); // Validation Formulaire Historique

/* Route magazine */
Route::get('/publication/{id}',"PublicationController@DisplayEditPublication" );
Route::post('/editpublication',"PublicationController@EditPublication");
Route::post('ajouterPublication','PublicationController@ajouterPublication'); // Validation Formulaire Création publications
Route::get('/listemagazine', "PublicationController@afficher");
Route::get('/creerpublication', 'PublicationController@index')->name('home'); // Formulaire Création publications
Route::post('/listemagazine', 'PublicationController@FiltreMagazine');

/* Routes historique */
Route::get('/historiqueclient', 'HistoriqueClientController@DisplayHistorique');

/* Route historique Vincent (Global)*/
Route::get('/creerhistoriqueglobal', 'HistoriqueClientController@formulaireAjoutHistoriqueGlobal'); // Formulaire Création Historique
Route::post('/ajouthistoriqueglobal', 'HistoriqueClientController@ajouterHistoriqueGlobal'); // Validation Formulaire Historique

/* Route historique Loick*/
Route::get('/displayajouthistoriqueclient/{id}', 'HistoriqueClientController@DisplayAjouterHistoriqueClient'); // Formulaire Historique
Route::post('/ajouthistoriqueclient', 'HistoriqueClientController@AjoutHistoriqueClient'); // Validation Formulaire Historique

/* gestion remboursement */
Route::get('/client/remboursement/{id}', 'APIPanierController@Remboursement'); // Formulaire Historique


