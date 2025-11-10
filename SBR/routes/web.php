<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimeController;

Route::get('/', function () {
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


Route::get('/times', [TimeController::class, 'index'])->name('times.blade');
Route::get('/times/criar', [TimeController::class, 'create'])->name('times_create.blade');
Route::post('/times', [TimeController::class, 'store'])->name('times.store');
Route::get('/times/{time}', [TimeController::class, 'show'])->name('times_ver.blade');

require __DIR__.'/auth.php';
