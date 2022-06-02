<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HotelController;
use Illuminate\Support\Facades\Route;

Route::get('hotel', [HotelController::class, 'userHotel'])->name('hotel');
Route::post('hotel', [HotelController::class, 'updateHotel'])->name('hotel');


// Categories
Route::resource('categories', CategoryController::class);
