<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VolController;
use App\Http\Controllers\PassagerController;
use App\Http\Controllers\ReservationController;/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::resource('vols', VolController::class);
Route::resource('passagers', PassagerController::class);
Route::resource('reservations', ReservationController::class);
// Routes pour les passagers
Route::prefix('passagers')->group(function () {
    Route::get('/', [PassagerController::class, 'index'])->name('passagers.index');
    Route::get('/create', [PassagerController::class, 'create'])->name('passagers.create');
    Route::post('/', [PassagerController::class, 'store'])->name('passagers.store');
    Route::get('/{id}/edit', [PassagerController::class, 'edit'])->name('passagers.edit');
    Route::put('/{id}', [PassagerController::class, 'update'])->name('passagers.update');
    Route::delete('/{id}', [PassagerController::class, 'destroy'])->name('passagers.destroy');
});

// Routes pour les réservations
Route::prefix('reservations')->group(function () {
    Route::get('/', [ReservationController::class, 'index'])->name('reservations.index');
    Route::get('/create', [ReservationController::class, 'create'])->name('reservations.create');
    Route::post('/', [ReservationController::class, 'store'])->name('reservations.store');
    Route::get('/{id}/edit', [ReservationController::class, 'edit'])->name('reservations.edit');
    Route::put('/{id}', [ReservationController::class, 'update'])->name('reservations.update');
    Route::delete('/{id}', [ReservationController::class, 'destroy'])->name('reservations.destroy');
});



Route::get('/', [VolController::class, 'index'])->name('vols.index');
Route::post('/vols', [VolController::class, 'store'])->name('vols.store');
Route::get('/vols/{id}/edit', [VolController::class, 'edit'])->name('vols.edit');
Route::put('/vols/{id}', [VolController::class, 'update'])->name('vols.update');
Route::delete('/vols/{id}', [VolController::class, 'destroy'])->name('vols.destroy');


Route::get('/l', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
