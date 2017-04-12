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

Route::get('/', function () {
    //return bcrypt('dariomotto');
    return view('welcome');
});


    Route::auth();
    Route::get('/admin', 'HomeController@index');
    
    Route::group(['middleware' => 'admin'], function () {

        /*
        * Inicio Rutas para User
        */
        Route::resource('users','UserController');
        Route::get('users/{id}/activar', [
            'as' => 'users.activar',
            'uses' => 'UserController@activar'
        ]);
        Route::get('users/{id}/inactivar', [
            'as' => 'users.inactivar',
            'uses' => 'UserController@inactivar'
        ]);
        /*
        * Fin Rutas para User
        */

        /*
        * Inicio Rutas para Ciclo
        */
        Route::resource('ciclos','CicloController');
        Route::get('ciclos/{id}/activar', [
            'as' => 'ciclos.activar',
            'uses' => 'CicloController@activar'
        ]);
        Route::get('ciclos/destroy/{id}', [
            'as' => 'ciclos.destroy',
            'uses' => 'CicloController@destroy'
        ]);
        Route::get('ciclos/asignar/{id}', [
            'as' => 'ciclos.asignar',
            'uses' => 'CicloController@asignar'
        ]);
        Route::post('ciclos/asignadas/{id}', [
            'as' => 'ciclos.asignadas',
            'uses' => 'CicloController@asignadas'
        ]);
        /*
        * Fin Rutas para Ciclo
        */

        /*
        * Inicio Rutas para Materia
        */
        Route::resource('materias','MateriaController');
        Route::get('materias/destroy/{id}', [
            'as' => 'materias.destroy',
            'uses' => 'MateriaController@destroy'
        ]);
        /*
        * Fin Rutas para Materia
        */

        /*
        * Inicio Rutas para Docente
        */
        Route::resource('grupos','GrupoController');
        Route::get('grupos/{id}/destroy', [
                'as' => 'grupos.destroy',
                'uses' => 'GrupoController@destroy'
        ]);
        /*
        * Fin Rutas para Materia
        */

        
    });

   //MddWARE COORDINADOR

        /*
        * Inicio Rutas para User
        */
        Route::resource('medallas','MedallaController');
        Route::get('medallas/{id}/destroy', [
                'as' => 'medallas.destroy',
                'uses' => 'MedallaController@destroy'
        ]);
        /*
        * Fin Rutas para User
        */



    


