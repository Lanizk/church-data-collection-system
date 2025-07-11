<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomLoginController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ParishController;
use App\Http\Controllers\AccountantController;
use App\Http\Controllers\ParishDashboardController;


Route::get('login', [CustomLoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [CustomLoginController::class, 'login'])->name('login');
Route::post('logout', [CustomLoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');



Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'showAdminDashboard']);


    Route::get('/admin/admin/list', [adminController::class, 'list']);
    Route::get('/admin/admin/add', [adminController::class, 'add']);
    Route::post('admin/admin/add', [adminController::class, 'Insert']);
    Route::get('admin/admin/delete/{id}', [adminController::class, 'delete']);
    Route::get('admin/admin/edit{id}', [adminController::class, 'edit']);
    Route::post('admin/admin/edit{id}', [adminController::class, 'update']);




});

Route::middleware(['auth', 'role:parish'])->group(function () {
    Route::get('/parish/dashboard', [ParishDashboardController::class, 'index']);
});

Route::middleware(['auth', 'role:accountant'])->group(function () {
    Route::get('/parish/dashboard', [ParishDashboardController::class, 'index']);
});

