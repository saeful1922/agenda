<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return view('auth.login');
});
Route::get('/dasboard','UsersController@dasboard');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home/add', 'HomeController@store')->name('agenda.add');
Route::get('/home/destroy/{id}', 'HomeController@destroy');
Route::get('/home/status/{id}', 'HomeController@status');

Route::patch('/home/update/{id}', 'HomeController@update')->name('agenda.update');


