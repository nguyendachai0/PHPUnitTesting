<?php

use App\Http\Controllers\BeverageController;
use App\Http\Controllers\PurchaseController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return 'About';
});
Route::resource(
    '/beverage',
    BeverageController::class

);
Route::post(
    '/beverage/buy',
    [PurchaseController::class, 'buy']

);
