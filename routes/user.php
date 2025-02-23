<?php

use Illuminate\Support\Facades\Route;


Route::get('/student/{vacancy}', function () {
    return view('welcome');
})->name('student.vacancy');

