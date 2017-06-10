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

	//Para los Usuarios del Sistema:
		
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

		//Editar Usuario
		Route::post('Editar-Cuenta', [
						'uses' => 'HomeController@editarCuenta',
						'as' =>'editarCuenta'
		]);

		//Editar Imágen
		Route::post('Editar-Imagen', [
						'uses' => 'HomeController@editarImagen',
						'as' =>'editarImagen'
		]);

		//Eliminar Cuenta
		Route::post('Eliminar-Cuenta', [
						'uses' => 'HomeController@eliminarCuenta',
						'as' =>'eliminarCuenta'
		]);

		//Eliminar Imágen
		Route::post('Eliminar-Imagen', [
						'uses' => 'HomeController@eliminarImagen',
						'as' =>'eliminarImagen'
		]);

		//Route::get('Ver-Cuenta/{id}','HomeController@verCuenta2');

		//Cambia el estatus del usuario por ajax en la Función "estatusUsuario(id,estatus)" en custom.js
		Route::get('usuario/{id}/estatus/{estatus}','HomeController@estatusUsuario');

	 });

	//Para el Equipo de Ilernus:

		//Crear Director o Gerente:
		Route::get('Crear-Persona-Ilernus', [
						'uses' => 'EquipoIlernusController@crearCuenta',
						'as' =>'registrarPi'
		]);

		Route::post('Crear-Persona-Ilernus', 'EquipoIlernusController@postCrearCuenta');

		//Buscar Director o Gerente:
		Route::get('Buscar-Persona-Ilernus', [
						'uses' => 'EquipoIlernusController@buscarCuenta',
						'as' =>'buscarCuentaPi'
		]);

		//Ver Director o Gerente:
		Route::get('Ver-Persona-Ilernus-{id}', [
						'uses' => 'EquipoIlernusController@verCuenta',
						'as' =>'cuentaPi'
		]);

		//Editar Director o Gerente
		Route::post('Editar-Persona-Ilernus', [
						'uses' => 'EquipoIlernusController@editarCuenta',
						'as' =>'editarCuentaPi'
		]);

		//Editar Director o Gerente
		Route::post('Editar-Imagen-Persona-Ilernus', [
						'uses' => 'EquipoIlernusController@editarImagen',
						'as' =>'editarImagenPi'
		]);

		//Eliminar Director o Gerente
		Route::post('Eliminar-Cuenta-Persona-Ilernus', [
						'uses' => 'EquipoIlernusController@eliminarCuenta',
						'as' =>'eliminarCuentaPi'
		]);

		//Eliminar Director o Gerente
		Route::post('Eliminar-Imagen-Persona-Ilernus', [
						'uses' => 'EquipoIlernusController@eliminarImagen',
						'as' =>'eliminarImagenPi'
		]);

	//Para los Instructores de Ilernus:


		//Crear Instructores:
		Route::get('Crear-Instructor-Ilernus', [
						'uses' => 'InstructoresIlernusController@crearCuenta',
						'as' =>'registrarIns'
		]);

		Route::post('Crear-Instructor-Ilernus', 'InstructoresIlernusController@postCrearCuenta');

		//Buscar Instructores:
		Route::get('Buscar-Instructor-Ilernus', [
						'uses' => 'InstructoresIlernusController@buscarCuenta',
						'as' =>'buscarCuentaIns'
		]);

		//Ver Instructores:
		Route::get('Ver-Instructor-Ilernus-{id}', [
						'uses' => 'InstructoresIlernusController@verCuenta',
						'as' =>'cuentaIns'
		]);

		//Editar Instructores
		Route::post('Editar-Instructor-Ilernus', [
						'uses' => 'InstructoresIlernusController@editarCuenta',
						'as' =>'editarCuentaIns'
		]);

		//Editar Instructores
		Route::post('Editar-Imagen-Instructor-Ilernus', [
						'uses' => 'InstructoresIlernusController@editarImagen',
						'as' =>'editarImagenIns'
		]);

		//Eliminar Instructores
		Route::post('Eliminar-Cuenta-Instructor-Ilernus', [
						'uses' => 'InstructoresIlernusController@eliminarCuenta',
						'as' =>'eliminarCuentaIns'
		]);

		//Eliminar Instructores
		Route::post('Eliminar-Imagen-Instructor-Ilernus', [
						'uses' => 'InstructoresIlernusController@eliminarImagen',
						'as' =>'eliminarImagenIns'
		]);



























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
