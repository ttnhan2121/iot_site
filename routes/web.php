<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});
Route::get('/login', 'App\Http\Controllers\LoginController@getView');
Route::post('/login', 'App\Http\Controllers\LoginController@postLogin');
Route::get('/logout', 'App\Http\Controllers\LoginController@getLogout');
Route::get('/dashboard', 'App\Http\Controllers\DashboardController@getView');
Route::get('/chart', 'App\Http\Controllers\ChartController@getView');


Route::get('/temp', 'App\Http\Controllers\ChartController@getTemp');
Route::get('/humi', 'App\Http\Controllers\ChartController@getHumi');



\Illuminate\Support\Facades\URL::forceScheme('https');
