<?php

use App\Http\Controllers\RendaController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardTableController;

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



Route::redirect('/', '/login');

Route::resource('/register',RegisterController::class);


Route::get('/login', [AuthController::class, 'visualizar'])->name('login');
Route::post('/login', [AuthController::class, 'autenticar'])->name('login.auth');



Route::prefix('fin')->middleware('auth')->group(function () {

    Route::resource('dashboard', DashboardTableController::class);

});

