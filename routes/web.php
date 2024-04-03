<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardTableController;
Use App\Http\Controllers\ContaBancariaController;
use App\Http\Controllers\InvestimentosController;
use App\Http\Controllers\TesteController;

Route::get('/teste', [TesteController::class, 'teste']);

Route::redirect('/', '/login');
Route::resource('/register',RegisterController::class);
Route::get('/login', [AuthController::class, 'visualizar'])->name('login');
Route::post('/login', [AuthController::class, 'autenticar'])->name('login.auth');
Route::get('/logout', [AuthController::class, 'sair'])->name('logout.auth');

Route::prefix('fin')->middleware('auth', 'session.timeout')->group(function () {

    Route::resource('dashboard', DashboardTableController::class)->middleware('temp_verify');
    Route::resource('userbank', ContaBancariaController::class);
    Route::resource('investimentos', InvestimentosController::class);
});





