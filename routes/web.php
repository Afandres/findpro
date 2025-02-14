<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CategoryController;

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
        Route::delete('/admin/company/destroy/{id}', 'destroy')->name('admin.company.destroy');
    });

    Route::controller(CategoryController::class)->group(function () {
        Route::get('/admin/category/index', 'index')->name('admin.category.index');
        Route::post('/admin/category/store', 'store')->name('admin.category.store');
        Route::post('/admin/category/update', 'update')->name('admin.category.update');
        Route::delete('/admin/category/destroy/{id}', 'destroy')->name('admin.category.destroy');
    });
});
