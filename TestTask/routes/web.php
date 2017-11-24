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


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/journeys/search', 'JourneysController@search');
Route::post('/journeys/check', 'JourneysController@check');
Route::resource('journeys', 'JourneysController');
Route::resource('vehicles', 'VehiclesController');
Route::resource('users', 'UsersController');

