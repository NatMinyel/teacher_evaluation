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

Route::group(['prefix' => 'auth'], function ($router) {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});
Route::group(['prefix' => 'courses'], function ($router) {
    Route::post('create', 'CourseController@create');
    Route::get('', 'CourseController@index');

    Route::get('{id}', 'CourseController@show');
    // Route::put('{id}', 'CourseController@show');
    Route::put('{id}', 'CourseController@update');
    Route::delete('{id}', 'CourseController@destroy');
});

// Route::resource('/courses', 'CourseController', [
//     'except' => ['edit', 'show', 'store']
// ]);

