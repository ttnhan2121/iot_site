<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});
Route::get('/login', 'App\Http\Controllers\LoginController@getView');
Route::post('/postLogin', 'App\Http\Controllers\LoginController@postLogin');
Route::get('/temp', 'App\Http\Controllers\ChartController@getTemp');
Route::get('/humi', 'App\Http\Controllers\ChartController@getHumi');

Route::get('/dashboard', 'App\Http\Controllers\DashboardController@getView');
Route::get('/chart', 'App\Http\Controllers\ChartController@getView');

\Illuminate\Support\Facades\URL::forceScheme('https');
