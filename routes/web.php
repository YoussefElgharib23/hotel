<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HotelController;
use Illuminate\Support\Facades\Route;
use Laravel\Telescope\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('index');
});

// Auth routes
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);


// Hotel
Route::get('hotels', [HotelController::class, 'showAllHotels'])->name('hotels');


// Search
Route::get('search', [HotelController::class, 'searchForHotels'])->name('search');
Route::get('/search/{hotel}/chambres', [HotelController::class, 'hotelRooms'])->name('hotel.rooms');
Route::post('/search/{hotel}/chambres', [HotelController::class, 'reserver'])->name('hotel.rooms');


// Contact us
Route::get('contact', [HotelController::class, 'contactUs']);
Route::post('contact', [HotelController::class, 'postContactUs'])->name('contact');


// Admin dashboard

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('index');
    Route::get('users', [AdminController::class, 'users'])->name('users.index');
    Route::post('users', [AdminController::class, 'storeUsers'])->name('users.store');
    Route::get('users/{user}/edit', [AdminController::class, 'editUser'])->name('users.edit');
    Route::post('users/{user}', [AdminController::class, 'updateUser'])->name('users.update');
    Route::delete('users/{user}/detele', [AdminController::class, 'deleteUser'])->name('users.delete');

    Route::get('contact', [AdminController::class, 'contacts'])->name('contact');
});
