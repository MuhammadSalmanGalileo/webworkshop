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

//Route::get('/', 'TestController@showLog');

Route::get('/md5', function(){
    // $curr_time = date('d/m/y');
    // $data = env('REG_PWD').$curr_time;
    // return hash("md5", $data).' '.$data;
    $date = new DateTime('2000-01-01');
    return $date->format('Y-m-d H:i:s');
});

Route::get('/update', 'Test@tester');

Route::get('/pickup', 'DashboardController@pickupBarang')->name('pickup');
Route::get('/return', 'DashBoardController@returnBarang')->name('return');
Route::get('/log','DashBoardController@logBarang')->name('log');
Route::post('/pickuppost', 'DashBoardController@pickupPost');
Route::post('/returnpost', 'DashBoardController@returnPost');
Route::get('/signout','DashBoardController@logoutAdmin');

/*
Route::get('/', 'Test@pickup');
Route::get('/pickup', 'Test@pickupBarang');
Route::get('/return', 'Test@returnBarang');
Route::get('/log', 'Test@logBarang');

Route::get('/coba', 'Test@connect');
*/
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
