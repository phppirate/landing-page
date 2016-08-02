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

Route::group(['middleware' => ['web']], function(){
    Route::get('/', function () {
        return view('welcome');
    });

    Route::auth();

    Route::get('/dashboard', 'DashboardController@index');
    Route::post('/signup', 'SignUpController@store');
    Route::get('/thank-you', 'SignUpController@thankYou');
});

Route::group(['prefix' => 'api/v1', 'middleware' => ['api']], function(){
    Route::resource('permission', 'PermissionController', ['only' => 'index']);
    Route::resource('role', 'RoleController', ['only' => ['index', 'store']]);
    Route::patch('role/{role}/attach-permission', 'RoleController@attachPermission');
    Route::delete('role/{role}/permission', 'RoleController@detachPermission');

    Route::resource('user', 'UserController');
});
