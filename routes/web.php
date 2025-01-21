<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::controller(CompanyController::class)->group(function () {
        Route::get('/admin/company/index', 'index')->name('admin.company.index');
        Route::post('/admin/company/store', 'store')->name('admin.company.store');
        Route::post('/admin/company/update', 'update')->name('admin.company.update');
    });
});
