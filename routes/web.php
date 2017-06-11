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
Route::pattern('id', '[0-9]+');

Route::get('/', 'ActionController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/action', 'ActionController@index')
    ->name('action.index');
//新增
Route::get('/action/create', 'ActionController@create')
    ->name('action.create');
//儲存
Route::post('/action', 'ActionController@store')
    ->name('action.store');
//顯示
Route::get('/action/{id}', 'ActionController@show')
    ->name('action.show');
//編輯
Route::get('/action/{id}/edit', 'ActionController@edit')
    ->name('action.edit');
//更新
Route::patch('/action/{id}', 'ActionController@update')
    ->name('action.update');
//刪除
Route::delete('/action/{id}', 'ActionController@destroy')
    ->name('action.destroy');

//報名
Route::get('/signup/create/{id}', 'SignupController@create')
    ->name('signup.create');
//儲存報名
Route::post('/signup/store', 'SignupController@store')
    ->name('signup.store');
//取出報名名單
Route::get('/action/{id}', 'ActionController@show')
    ->name('action.show');
