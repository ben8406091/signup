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

Route::get('/', 'ActionController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/action', 'ActionController@index')
    ->name('action.index');

Route::get('/action/create', 'ActionController@create')
    ->name('action.create');
Route::post('/action', 'ActionController@store')
    ->name('action.store');
//顯示
Route::get('/action/{id}', 'ActionController@show')->name('action.show');
