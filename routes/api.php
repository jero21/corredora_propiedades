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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['jwt.auth']], function () {

	Route::apiResource('empresa', 'EmpresaController');

	Route::apiResource('usuario', 'UserController');

	Route::apiResource('propiedad', 'PropiedadController');

	Route::apiResource('reserva_visita', 'ReservaVisitaController');
	Route::get('reservas_propiedades', 'ReservaVisitaController@reservasPropiedad');
	Route::get('reservas/prop', 'ReservaVisitaController@diasRestantesReserva');

	Route::apiResource('cliente', 'ClienteController');
	Route::get('cliente/reservas/{id_cliente}', 'ClienteController@getReservas');
	Route::get('cliente/reservas/abiertas/{id_cliente}', 'ClienteController@getReservasAbiertas');

});

Route::post('login', 'AuthenticateController@authenticate');
