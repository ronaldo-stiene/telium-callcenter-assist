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

Route::get('/', 'CallcenterController@index');
Route::post('/chamada-normal', 'CallcenterController@normal')->name('normal-call');
Route::post('/chamada-por-engano', 'CallcenterController@invalid')->name('invalid-call');
