<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});
Route::get('/dashboard', 'App\Http\Controllers\DashboardController@getView');
