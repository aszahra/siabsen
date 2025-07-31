<?php

<<<<<<< HEAD
use App\Http\Controllers\DataMataPelajaranController;
=======
use App\Http\Controllers\DataKelasController;
>>>>>>> fitur-datakelas
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

<<<<<<< HEAD
Route::resource('datamatpel', DataMataPelajaranController::class)->middleware('auth');
=======
Route::resource('datakelas', DataKelasController::class)->middleware('auth');
>>>>>>> fitur-datakelas

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
