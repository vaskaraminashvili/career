<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\VacancyController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');


Route::controller(VacancyController::class)
    ->prefix('vacancies')
    ->name('vacancies.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
        Route::get('/company/{company_id}', 'companyVacancies')->name('companyVacancies');
    });



