<?php

use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BedTypeController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/about', function () {
    return Inertia::render('About');
})->name('about');

// Route::get('/hotels', function () {
//     return Inertia::render('Hotels');
// })->name('hotels');

Route::resource('hotel', HotelController::class);
Route::resource('room', RoomTypeController::class);
Route::resource('/hotel/{hotel}/room_type', RoomTypeController::class);
Route::resource('/hotel/{hotel}/bed_type', BedTypeController::class);