<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'FileController@home');

Auth::routes();
Route::get('home', 'HomeController@index');
Route::resource('post', 'FileController');
Route::get('/profile', function () {
	return view('profile');
});
Route::post('/edit', 'UserController@edit');
Route::get('/admin', 'AdminController@index');
Route::get('/admin/users', 'AdminController@users');
Route::get('/admin/files', 'AdminController@files');
Route::get('/user/{id}', 'AdminController@block');
Route::get('/admin/{id}', 'AdminController@destroy');