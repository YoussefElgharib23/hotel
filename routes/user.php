<?php

use App\Http\Controllers\HotelController;
use Illuminate\Support\Facades\Route;

Route::get('hotel', [HotelController::class, 'userHotel'])->name('hotel');
