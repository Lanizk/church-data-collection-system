<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomLoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ParishController;
use App\Http\Controllers\AccountantController;
use App\Http\Controllers\PopulationCategoryController;
use App\Http\Controllers\ContributionCategoryController;
use App\Http\Controllers\ParishSubmissionController;



Route::get('login', [CustomLoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [CustomLoginController::class, 'login'])->name('login');
Route::post('logout', [CustomLoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');



Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'showAdminDashboard']);


    Route::get('/admin/admin/list', [adminController::class, 'list']);
    Route::get('/admin/admin/add', [adminController::class, 'add']);
    Route::post('admin/admin/add', [adminController::class, 'Insert']);
    Route::get('admin/admin/delete/{id}', [adminController::class, 'delete']);
    Route::get('admin/admin/edit/{id}', [adminController::class, 'edit']);
    Route::post('admin/admin/edit/{id}', [adminController::class, 'update']);



    Route::get('/admin/parish/list', [ParishController::class, 'list']);
    Route::get('/admin/parish/add', [ParishController::class, 'add']);
    Route::post('admin/parish/add', [ParishController::class, 'Insert']);
    Route::get('admin/parish/delete/{id}', [ParishController::class, 'delete']);
    Route::get('admin/parish/edit/{id}', [ParishController::class, 'edit']);
    Route::post('admin/parish/edit/{id}', [ParishController::class, 'update']);


    Route::get('/admin/accountant/list', [AccountantController::class, 'list']);
    Route::get('/admin/accountant/add', [AccountantController::class, 'add']);
    Route::post('admin/accountant/add', [AccountantController::class, 'Insert']);
    Route::get('admin/accountant/delete/{id}', [AccountantController::class, 'delete']);
    Route::get('admin/accountant/edit/{id}', [AccountantController::class, 'edit']);
    Route::post('admin/accountant/edit/{id}', [AccountantController::class, 'update']);

    Route::get('/admin/population/list', [PopulationCategoryController::class, 'list']);
    Route::get('/admin/population/add', [PopulationCategoryController::class, 'add']);
    Route::post('admin/population/add', [PopulationCategoryController::class, 'Insert']);
    Route::get('admin/population/delete/{id}', [PopulationCategoryController::class, 'delete']);
    Route::get('admin/population/edit/{id}', [PopulationCategoryController::class, 'edit']);
    Route::post('admin/population/edit/{id}', [PopulationCategoryController::class, 'update']);

    Route::get('/admin/contribution/list', [ContributionCategoryController::class, 'list']);
    Route::get('/admin/contribution/add', [ContributionCategoryController::class, 'add']);
    Route::post('admin/contribution/add', [ContributionCategoryController::class, 'Insert']);
    Route::get('admin/contribution/delete/{id}', [ContributionCategoryController::class, 'delete']);
    Route::get('admin/contribution/edit/{id}', [ContributionCategoryController::class, 'edit']);
    Route::post('admin/contribution/edit/{id}', [ContributionCategoryController::class, 'update']);







});

Route::middleware(['auth', 'role:parish'])->group(function () {
    Route::get('/parish/dashboard', [DashboardController::class, 'showParishDashboard']);

    Route::get('parish/submit', [ParishSubmissionController::class, 'index'])->name('parish.submit');
    Route::post('parish/submit', [ParishSubmissionController::class, 'store'])->name('parish.submit.store');

    Route::get('/parish/submissions', [ParishSubmissionController::class, 'showDataSubmissions'])->name('parish.submissions');

});

Route::middleware(['auth', 'role:accountant'])->group(function () {
    Route::get('/accountant/dashboard', [DashboardController::class, 'showAccountantDashboard']);



   
});

