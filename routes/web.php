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

Route::get('/final', function () {
    return view('final');
});

Route::get('/{id}', 'Web\WebController@index');
Route::post('/choice/{id}', 'Web\WebController@store');
