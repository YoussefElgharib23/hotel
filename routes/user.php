<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

Route::get('hotel', [HotelController::class, 'userHotel'])->name('hotel');
Route::post('hotel', [HotelController::class, 'updateHotel'])->name('hotel');


// Categories
Route::resource('categories', CategoryController::class);

// Rooms
Route::resource('rooms', RoomController::class);


// Reservation
Route::get('reservations', [ReservationController::class, 'index'])->name('reserations.index');
Route::get('reservations/{reservation}/accept', [ReservationController::class, 'accept'])->name('reserations.accept');
Route::get('reservations/{reservation}/refuse', [ReservationController::class, 'refuse'])->name('reserations.refuse');
