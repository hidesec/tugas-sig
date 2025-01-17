<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('population');
});
Route::get('/populasi', function () {
    return view('population');
});
Route::get('/luas', function () {
    return view('luas');
});
Route::get('/gdp', function () {
    return view('gdp');
});
Route::get('/kepadatan-penduduk', function () {
    return view('kepadatan_penduduk');
});
Route::get('/kabkot', function () {
    return view('kabkot');
});
Route::get('/provinsi', function () {
    return view('provinsi');
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
