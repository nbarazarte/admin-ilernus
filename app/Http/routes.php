<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::group(['middleware' => 'auth'], function () {

	Route::get('/', [
		'uses' => 'HomeController@index',
		'as' =>'home'
	]);

	Route::group(['middleware' => 'administrador'], function () {

		//Crear Usuario:
		Route::get('Crear-Cuenta', [
						'uses' => 'HomeController@crearCuenta',
						'as' =>'registrar'
		]);

		Route::post('Crear-Cuenta', 'HomeController@postCrearCuenta');

		//Buscar usuarios:
		Route::get('Buscar-Cuenta', [
						'uses' => 'HomeController@buscarCuenta',
						'as' =>'buscarCuenta'
		]);

		//Ver Usuario:
		Route::get('Ver-Cuenta-{id}', [
						'uses' => 'HomeController@verCuenta',
						'as' =>'cuenta'
		]);

		Route::post('Editar-Cuenta', [
						'uses' => 'HomeController@editarCuenta',
						'as' =>'editarCuenta'
		]);

		Route::post('Editar-Imagen', [
						'uses' => 'HomeController@editarImagen',
						'as' =>'editarImagen'
		]);


		Route::post('Eliminar-Cuenta', [
						'uses' => 'HomeController@eliminarCuenta',
						'as' =>'eliminarCuenta'
		]);

		Route::post('Eliminar-Imagen', [
						'uses' => 'HomeController@eliminarImagen',
						'as' =>'eliminarImagen'
		]);


		//Route::get('Ver-Cuenta/{id}','HomeController@verCuenta2');

		//Función "estatusUsuario(id,estatus)" en custom.js
		Route::get('usuario/{id}/estatus/{estatus}','HomeController@estatusUsuario');

	 });

 });

Route::get('Recuperar-Clave', [
				'uses' => 'HomeController@getRecuperar',
				'as' =>'recuperar'
]);

Route::post('Recuperar-Clave', 'HomeController@postRecuperar');

Route::get('Acceso-Restringido', [
				'uses' => 'HomeController@denegado',
				'as' =>'denegado'
]);

// Authentication routes...
Route::get('/Entrar', [
				'uses' => 'Auth\AuthController@getLogin',
				'as' =>'login'
]);
Route::post('/Entrar', [
				'uses' => 'Auth\AuthController@postLogin',
				'as' =>'login'
]);
Route::get('Salir', [
				'uses' => 'Auth\AuthController@getLogout',
				'as' =>'logout'
]);
