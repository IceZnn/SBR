<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimeController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ==================== ROTAS DOS TIMES ====================
Route::get('/ranking', [TimeController::class, 'ranking'])->name('ranking.blade');
Route::get('/times', [TimeController::class, 'index'])->name('times.blade');
Route::get('/times/criar', [TimeController::class, 'create'])->name('times_create.blade');
Route::post('/times', [TimeController::class, 'store'])->name('times.store');
Route::get('/times/{time}', [TimeController::class, 'show'])->name('times_ver.blade');
Route::get('/times/{time}/editar', [TimeController::class, 'edit'])->name('times_edit.blade');
Route::put('/times/{time}', [TimeController::class, 'update'])->name('times.update');
Route::delete('/times/{time}', [TimeController::class, 'destroy'])->name('times.destroy');
Route::get('/times/exemplo/criar', [TimeController::class, 'criarExemplo'])->name('times.exemplo');

// ==================== ROTAS DA CORRIDA ====================
Route::get('/corrida', function () {
    return view('corrida');
})->name('corrida.blade');
Route::post('/corrida/salvar-resultado', [TimeController::class, 'salvarResultado'])->name('corrida.salvar');

// routes/web.php
Route::get('/corrida/selecionar-times', [TimeController::class, 'selecionarTimes'])->name('corrida.selecionar');

Route::post('/corrida/iniciar', [TimeController::class, 'iniciarCorrida'])->name('corrida.iniciar');

require __DIR__.'/auth.php';