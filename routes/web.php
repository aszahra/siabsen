<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\DataGuruController;
use App\Http\Controllers\DataKelasController;
use App\Http\Controllers\DataMataPelajaranController;
use App\Http\Controllers\DataSiswaController;
use App\Http\Controllers\DetailAbsensiController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('datamatpel', DataMataPelajaranController::class)->middleware('auth');
Route::resource('datakelas', DataKelasController::class)->middleware('auth');
Route::resource('dataguru', DataGuruController::class)->middleware('auth');
Route::resource('datasiswa', DataSiswaController::class)->middleware('auth');
Route::resource('jadwal', JadwalController::class)->middleware('auth');
Route::resource('absensi', AbsensiController::class)->middleware('auth');
// Route::get('/absensi/create/{jadwal}', [AbsensiController::class, 'create'])->name('absensi.create');
Route::get('/absensi/{mapel}/tanggal', [AbsensiController::class, 'tanggal'])->name('absensi.tanggal');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
