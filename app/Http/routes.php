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
Route::post('/loginapp', [
                'as' => 'loginapp.usuarios',
                'uses' => 'LoginController@store'
        ]);

Route::post('/materiasExistentes', [
                'as' => 'materiasExistentes.usuarios',
                'uses' => 'MateriasExistentesController@store'
        ]);
        


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
   Route::group(['middleware' => 'coor'], function () {
        /*
        * Inicio Rutas para Medalla
        */
        Route::resource('medallas','MedallaController');
        Route::get('medallas/{id}/destroy', [
                'as' => 'medallas.destroy',
                'uses' => 'MedallaController@destroy'
        ]);
        Route::post('medallas/default', [
                'as' => 'medallas.default',
                'uses' => 'MedallaController@default'
        ]);
        /*
        * Fin Rutas para Medalla
        */

        /*
        * Inicio Rutas para Cuestionario
        */
        Route::resource('cuestionarios','CuestionarioController');
        /*
        * Fin Rutas para Cuestionario
        */

        /*
        * Inicio Rutas para Categoria
        */
        Route::resource('categorias','CategoriaController');
        /*
        * Fin Rutas para Categoria
        */
   });
        
    //MddWARE DOCENTE
    Route::group(['middleware' => 'docente'], function () {
        /*
        * Inicio Rutas para Inscripcion
        */
        Route::get('inscripcion', [
                'as' => 'inscripcion.index',
                'uses' => 'InscripcionController@index'
        ]);
        
        Route::post('inscripcion/inscribir/{id}', [
                'as' => 'inscripcion.inscribir',
                'uses' => 'InscripcionController@inscribir'
        ]);

        Route::get('inscripcion/inscritos/{id}', [
                'as' => 'inscripcion.inscritos',
                'uses' => 'InscripcionController@inscritos'
        ]);

        Route::get('inscripcion/desinscribir/{id}/{grupo}', [
                'as' => 'inscripcion.desinscribir',
                'uses' => 'InscripcionController@desinscribir'
        ]);
        /*
        * Fin Rutas para Inscripcion
        */
    });

        
/*RUTAS RODRIGO APP*/
    Route::get('perfil/{id}',[
        'as' => 'perfil',
        'uses' => 'perfilController@buscarPerfil'
        ]);
/*RUTAS RODRIGO APP*/
   


