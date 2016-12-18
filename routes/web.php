<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::post('/calas', 'HomeController@storeCalas');
Route::post('/project', 'HomeController@storeProject');

Route::get('/profile/edit', 'HomeController@editProfile');
Route::post('/profile/edit', 'HomeController@postEditProfile');

Route::get('/project/edit', 'HomeController@editProject');
Route::post('/project/edit', 'HomeController@postEditProject');

Route::group(['prefix' => 'lepkom-admin'], function () {

    //Halaman yang bisa dibuka oleh semua admin

    Route::group(['middleware' => ['auth', 'admin']], function () {
        Route::get('/home', 'Admin\DashboardController@index');
    });
});

Route::post('/upload/zip', 'UploadController@storeZip');
Route::get('download', 'HomeController@download');
