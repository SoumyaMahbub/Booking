<?php

use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\HomeController;
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
Route::get('/hotel/{hotel}/store_room', [RoomTypeController::class, 'store'])->name('store_room');
Route::get('/hotel/{hotel}/create_room', [RoomTypeController::class, 'create'])->name('create_room');