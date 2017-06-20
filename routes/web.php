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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/publication', 'PublicationController@index')->name('home');
Route::get('/gestionclient', 'GestionClientController@index')->name('gestionclient');
Route::get('/historiqueclient', 'HistoriqueClientController@index')->name('historiquelient');
Route::get('/listemagazine', 'ListemagazineController@index')->name('listemagazine');

Route::post('ajouterPublication','PublicationController@ajouterPublication');
Route::get('/client/{id}',"GestionClientController@DisplayEditClient" );
Route::get('/deleteclient/{id}',"GestionClientController@DeleteClient" );
Route::post('/editclient',"GestionClientController@EditClient" );


Route::get('/listemagazine', "ListemagazineController@afficher");



/*
TRAVAIL POUR MARDI

Route::get('/EditerPublication/{id}',function ($id) {
    $id_publication = DB::where('id',$id)->firstOrFail();
    return View::make('modifpublication')->with('id', $id_publication);
});


*/
