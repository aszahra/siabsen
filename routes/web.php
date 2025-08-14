<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\DataGuruController;
use App\Http\Controllers\DataKelasController;
use App\Http\Controllers\DataMataPelajaranController;
use App\Http\Controllers\DataSiswaController;
use App\Http\Controllers\DetailAbsensiController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\ProfileController;
use App\Models\DetailAbsensi;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['can:role-Admin'])->group(function () {
    Route::resource('datamatpel', DataMataPelajaranController::class);
    Route::resource('datakelas', DataKelasController::class);
    Route::resource('dataguru', DataGuruController::class);
    Route::resource('datasiswa', DataSiswaController::class);
    
});
// Route::resource('datamatpel', DataMataPelajaranController::class)->middleware('auth');
// Route::resource('datakelas', DataKelasController::class)->middleware('auth');
// Route::resource('dataguru', DataGuruController::class)->middleware('auth');
// Route::resource('datasiswa', DataSiswaController::class)->middleware('auth');

Route::resource('absensi', AbsensiController::class)->middleware('auth');
Route::resource('detailabsensi', DetailAbsensiController::class)->middleware('auth');
Route::get('detailabsensi', [DetailAbsensiController::class, 'index'])->name('detailabsensi.index')->middleware('auth');
Route::get('/detail-absensi/{id}', [DetailAbsensiController::class, 'getDetail'])->name('detailabsensi.get');
Route::get('detailabsensi/{detailabsensi}/edit', [DetailAbsensiController::class, 'edit'])->name('detailabsensi.edit');
Route::get('detailabsensi/{detailabsensi}/print', [DetailAbsensiController::class, 'print'])->name('detailabsensi.print');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__ . '/auth.php';
