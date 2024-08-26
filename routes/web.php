<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForecastController;
use App\Http\Controllers\GeoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/weather/forecast', [ForecastController::class, 'showForecast']);
Route::get('/get-coordinates', [GeoController::class, 'getCoordinates']);
