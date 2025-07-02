<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomLoginController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ParishDashboardController;


Route::get('login', [CustomLoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [CustomLoginController::class, 'login']);
Route::post('logout', [CustomLoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/bishop/dashboard', [AdminDashboardController::class, 'index']);
});

Route::middleware(['auth', 'role:parish'])->group(function () {
    Route::get('/parish/dashboard', [ParishDashboardController::class, 'index']);
});

