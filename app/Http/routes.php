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
        //////////////////////////////////////
        //////////CUESTIONARIO
        //////////////////////////////////////
        /*
        * Inicio Rutas para Cuestionario
        */
        Route::resource('cuestionarios','CuestionarioController');
        Route::get('cuestionarios/asignarcategorias/{id}', [
                'as' => 'cuestionarios.asignarCategorias',
                'uses' => 'CuestionarioController@asignarCategorias'
        ]);
        Route::get('cuestionarios/asignarcategoriaporcentaje/{id}', [
                'as' => 'cuestionarios.asignarCategoriaPorcentaje',
                'uses' => 'CuestionarioController@asignarCategoriaPorcentaje'
        ]);
        Route::post('cuestionarios/guardarcategorias/{id}', [
                'as' => 'cuestionarios.guardarCategorias',
                'uses' => 'CuestionarioController@guardarCategorias'
        ]);
        /*
        * Fin Rutas para Cuestionario
        */

        /*
        * Inicio Rutas para Categoria
        */
        Route::resource('categorias','CategoriaController');
        Route::post('categorias/pregunta/{id}', [
                'as' => 'categoria.importarPreguntas',
                'uses' => 'CategoriaController@importarPreguntas'
        ]);
        Route::get('categorias/eliminarcategoria/{id}', [
                'as' => 'categorias.eliminarCategoria',
                'uses' => 'CategoriaController@eliminarCategoria'
        ]);
        
        
        /*
        * Fin Rutas para Categoria
        */

        /*
        * Inicio Rutas para Preguntas
        */
        Route::resource('preguntas','PreguntaController');
        Route::get('preguntas/verpreguntas/{id}', [
                'as' => 'preguntas.verPreguntas',
                'uses' => 'PreguntaController@verPreguntas'
        ]);
        Route::get('preguntas/borrarpregunta/{id}', [
                'as' => 'preguntas.borrarPregunta',
                'uses' => 'PreguntaController@borrarPregunta'
        ]);
        /*
        * Fin Rutas para Preguntas
        */
        //////////////////////////////////////
        //////////FIN CUESTIONARIO
        //////////////////////////////////////
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
        



    


