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

Route::get('/', 'JobController@index');

Route::post('/job/category-search/{id}', 'JobController@searchByCategory');
Route::get('/job/category-search/{id}', 'JobController@searchByCategory');

Route::post('/job/location-search/{id}', 'JobController@searchByLocation');
Route::get('/job/location-search/{id}', 'JobController@searchByLocation');

Route::post('/job/view/{id}', 'JobController@show');


