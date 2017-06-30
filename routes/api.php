<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// **************** --- REGLES DE NOMMAGE --- **************//
// ***  Route::XXXX('/YYYY/ZZZZ','contoller@fonction"); *** //
// *** XXXX = get / post                                    //
// *** YYYY = entitée concernée (magazine, client , ...) ** //
// *** ZZZZ = verbe à l'infinitif (ER)                      //
// ******************************************************** //

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


/* Route magazine */
Route::get('/magazine/lister',"APIMagazineController@lister" );

Route::get('/magazine/detail',"APIMagazineController@detail" );

/* Route authentification*/

Route::post('/client/authentifier',"APIClientController@authentifier" );

Route::post('/client/enregistrer',"APIClientController@enregistrer" );

Route::get('/client/moncompte/{id}',"APIClientController@Display" );
Route::get('/client/affichereditcompte/{id}',"APIClientController@DisplayEditCompte" );
Route::post('/client/edit',"APIClientController@EditCompte" );


/* Route abonnement*/

Route::get('/client/mesabonnements/{id}',"APIClientController@mesabonnements" );

Route::post('/client/sabonner',"APIClientController@sabonner" );

