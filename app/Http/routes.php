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

Route::pattern('id', '\d+');

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('/', 'PostController@index');

Route::get('post/{id}', [
	'uses' => 'PostController@show'
]);

Route::get('post/create', [
	'middleware' => 'auth',
	'uses' => 'PostController@create'
]);

Route::post('post/store', [
	'middleware' => 'auth',
	'before' => 'csrf',
	'uses' => 'PostController@store'
]);

Route::get('post/delete/{id}', [
	'uses' => 'PostController@destroy'
]);