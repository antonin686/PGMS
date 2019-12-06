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

Route::get('/login', 'LoginController@index')->name('log');
Route::post('/login', 'LoginController@verify');

Route::view('/home', 'home')->name('home');
Route::get('/image/list', 'ImgController@index')->name('image.index');
Route::get('/image/create', 'ImgController@create')->name('image.create');
Route::post('/image/store', 'ImgController@store');
Route::get('/image/edit/{id}', 'ImgController@edit')->name('image.edit');
Route::post('/image/edit/{id}', 'ImgController@update')->name('image.update');
Route::get('/layout/list', 'LayoutController@index')->name('layout.index');
Route::get('/layoutImage/create', 'LayoutImageController@create')->name('LayoutImage.add');
Route::post('/layoutImage/create', 'LayoutImageController@store')->name('LayoutImage.store');