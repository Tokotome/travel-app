<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\Auth\ProviderController;
use App\Http\Controllers\ExcursionController;
use App\Http\Controllers\ReservationController;

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

Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect']);
Route::get('/auth/{provider}/callback', [ProviderController::class, 'callback']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//destinations
Route::get('/destinations', [DestinationController::class, 'index']);
Route::get('/destinations/{country}/cities', [DestinationController::class, 'hotels']);

//hotels
Route::get('/hotels/{destinationId}/{excursionId}/{has_pool?}/{has_fitness?}/{category?}', [HotelController::class, 'getHotels'])->name('getHotels');

//excursions
Route::get('/excursions', [ExcursionController::class, 'index'])->name('excursions');
Route::get('/excursions/{id}', [ExcursionController::class, 'getSingle'])->name('getExcursion');

//reservations
Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
Route::get('/reservations', [ReservationController::class, 'index'])
    ->middleware('auth') 
    ->name('views.reservations');

    
require __DIR__.'/auth.php';
