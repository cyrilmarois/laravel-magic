<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your module. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => '/user', 'middleware' => 'api'], function() {
	Route::post('/create', 'UserController@create');
	Route::get('/', 'UserController@index');
	Route::get('/{id}', 'UserController@show');
	Route::patch('/{id}', 'UserController@update');
	Route::delete('/{id}', 'UserController@delete');
});
