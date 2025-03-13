<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DevisiController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\AuthController;


Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

    
Route::middleware(['auth'])->group(function () {

    Route::middleware(['check.user.role'])->group(function () {
        Route::resource('/users', UsersController::class);
        Route::resource('/devisi', DevisiController::class);
        Route::resource('/pegawai', PegawaiController::class);
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/surat', SuratController::class); 

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});





