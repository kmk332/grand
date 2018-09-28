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
    return view('welcome');
});
Route::resource('index', 'CRUDController');
Route::resource('crud', 'CRUDController');
Route::resource('weather', 'WeatherController');
Route::get('crud/{id}/complete', 'CRUDController@complete');
Route::get('crud/{id}/incomplete', 'CRUDController@incomplete');

Route::get('/crud/{id}/{category}/{name}', [
    'middleware' => 'RequestLogs',
     function () {
        return view('welcome');
}]);
