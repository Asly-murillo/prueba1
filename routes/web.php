<?php
use App\Http\Controllers\Auth\RegisterController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaccionController;

Route::post('/prueba/transaccion', [TransaccionController::class, 'recargar'])->name('transaccion.recargar');
Route::get('/prueba/transaccion', function () {
    return view('prueba.transaccion');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/prueba/transaccion', [TransaccionController::class, 'index'])->name('transaccion');
    Route::post('/transaccion/recargar', [TransaccionController::class, 'recargar'])->name('transaccion.recargar');
});


Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register');