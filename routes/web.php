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
Route::get('/','albumsController@index');

Route::get('/albums','albumsController@index');

Route::get('/albums/create','albumsController@create');

Route::post('/albums/store','albumsController@store');

Route::get('/albums/{id}','albumsController@show');

Route::get('/photos/create/{id}','photosController@create');

Route::post('/photos/store','photosController@store');

Route::get('/photos/{id}','photosController@show');

Route::delete('/photos/{id}','photosController@destroy');



