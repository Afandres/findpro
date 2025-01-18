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
        Route::get('/company/index', 'index')->name('company.index');
        Route::post('/company/store', 'store')->name('company.store');
        Route::post('/company/update', 'update')->name('company.update');
    });
});
