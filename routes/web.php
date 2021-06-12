<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\mainController@index')->name('Main');
Route::get('/ownLinks', 'App\Http\Controllers\mainController@getLinks')->middleware('auth')->name('OwnLinks');

Route::get('/done/{id}', 'App\Http\Controllers\linksController@done')->name('done');
Route::get('/exc/{type}', 'App\Http\Controllers\linksController@exc')->name('Exc');
Route::post('create', 'App\Http\Controllers\linksController@create')->name('create');
Route::get('/u/{url}', 'App\Http\Controllers\linksController@open')->name('open');
Route::get('/ban/{id}', 'App\Http\Controllers\linksController@ban')->name('ban')->middleware('auth', 'admin');
Route::get('/unban/{id}', 'App\Http\Controllers\linksController@unban')->name('unban')->middleware('auth', 'admin');
Route::get('edit/{id}', 'App\Http\Controllers\linksController@edit')->name('edit')->middleware('auth');
Route::post('update/{id}', 'App\Http\Controllers\linksController@update')->name('update')->middleware('auth');
Route::get('delete/{id}', 'App\Http\Controllers\linksController@delete')->name('delete')->middleware('auth');

Route::get('/admin', 'App\Http\Controllers\adminController@index')->name('admin.index')->middleware('auth', 'admin');

require __DIR__.'/auth.php';
