<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserrController;
use App\Http\Controllers\CameraController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\EntiteAffectationController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\DashboardController;

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::middleware(['role:admin'])->group(function () {
        Route::resource('users', UserrController::class);
        Route::resource('cameras', CameraController::class);
        Route::resource('employes', EmployeController::class);
        Route::resource('entitesAffectation', EntiteAffectationController::class);
    });

    Route::middleware(['role:user'])->group(function () {
        Route::resource('demandes', DemandeController::class);
        Route::get('/demandes/{id}/pdf', [PDFController::class, 'downloadDemandePDF'])->name('demandes.pdf');
    });
});

// Authentification
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
