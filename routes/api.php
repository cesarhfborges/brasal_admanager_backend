<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::group([
//    'middleware' => 'api',
    'prefix' => 'auth',
    'namespace' => 'App\Http\Controllers\Api\Auth',
], function () {

    Route::post('login', 'AuthController@login');

    Route::get('logout', 'AuthController@logout')->middleware('jwt.auth');
});

Route::group([
    'middleware' => 'jwt.auth',
    'namespace' => 'App\Http\Controllers\Api',
], function () {

    Route::resource('usuarios', 'UsuariosController')->only(['index', 'update']);

});
