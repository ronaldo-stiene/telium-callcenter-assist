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
Route::post('/normal', 'CallcenterController@normal')->name('normal-call');
Route::post('/invalid', 'CallcenterController@invalid')->name('invalid-call');
