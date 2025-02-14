<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanySector;
use App\Http\Controllers\SectorController;

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

    Route::controller(SectorController::class)->group(function () {
        Route::get('/admin/sector/index', 'index')->name('admin.sector.index');
        Route::post('/admin/sector/store', 'store')->name('admin.sector.store');
        Route::post('/admin/sector/update', 'update')->name('admin.sector.update');
        Route::delete('/admin/sector/destroy/{id}', 'destroy')->name('admin.sector.destroy');
        
    });




});
