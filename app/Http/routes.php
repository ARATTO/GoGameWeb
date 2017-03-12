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

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/admin', 'HomeController@index');
    Route::group(['middleware' => 'admin'], function () {
        
        
        Route::resource('users','UserController');
        Route::get('users/{id}/destroy', [
            'as' => 'users.destroy',
            'uses' => 'UserController@destroy'
        ]);

        
    });

    

});
