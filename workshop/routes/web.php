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

Route::get('/', 'Test@pickup');
Route::get('/pickup', 'Test@pickupBarang');
Route::get('/return', 'Test@returnBarang');
Route::get('/log', 'Test@logBarang');

Route::get('/coba', 'Test@connect');
Route::post('/test', 'Test@tester');