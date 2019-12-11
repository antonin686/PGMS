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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('/', 'welcome')->name('root');

Route::get('/login', 'LoginController@index')->name('log');
Route::post('/login', 'LoginController@verify');
Route::get('/api/{api_key}', 'Api_keyController@index')->name('api.index');

// Route::group([
//     'middleware' => ['api', 'cors'],
//     'prefix' => 'api',
// ], function ($router) {
//      //Add you routes here, for example:
//      Route::apiResource('/{api_key}','Api_keyController');
// });

Route::group(['middleware' => 'checkSession'], function() {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/image/list', 'ImgController@index')->name('image.index');
    Route::get('/image/create', 'ImgController@create')->name('image.create');
    Route::post('/image/store', 'ImgController@store');
    Route::get('/image/edit/{id}', 'ImgController@edit')->name('image.edit');
    Route::post('/image/edit/{id}', 'ImgController@update')->name('image.update');
    Route::get('/image/destroy/{id}', 'ImgController@destroy')->name('image.destroy');
    Route::get('/galleryImage', 'GalleryImageController@index')->name('galleryImage.index');
    Route::post('/galleryImage', 'GalleryImageController@update');
    Route::get('/galleryImage/create', 'GalleryImageController@create')->name('galleryImage.create');
    Route::post('/galleryImage/create', 'GalleryImageController@store'); 
    Route::get('/logout', 'LoginController@destroy')->name('logt'); 

});

