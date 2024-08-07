<?php

use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

route::get('/dashboard', [DashboardController::class, 'indexPage']);
route::get('/about', [AboutController::class, 'index']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
route::get('beranda', [UserController::class, 'beranda']);

Route::resource('hotels', HotelController::class);
Route::resource('kamars', KamarController::class);
Route::resource('bookings', BookingController::class);
Route::resource('users', UserController::class);
