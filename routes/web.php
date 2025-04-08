<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\VacancyController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');


Route::controller(VacancyController::class)
    ->prefix('vacancies')
    ->name('vacancies.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
        Route::get('/{id}/apply', 'applyForVacancy')->name('apply-for-vacancy');
        Route::get('/company/{company_id}', 'companyVacancies')->name('companyVacancies');
    });

Route::controller(NewsController::class)
    ->prefix('news')
    ->name('news.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
    });

Route::controller(CompanyController::class)
    ->prefix('companies')
    ->name('companies.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
    });


Route::post('/logout', function () {
    Auth::logout();
    return redirect('/'); // Redirect to homepage after logout
})->name('logout');

