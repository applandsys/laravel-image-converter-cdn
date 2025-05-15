<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/upload', function () {
    return view('upload');
});

Route::post('/convert-webp', [ImageController::class, 'convertToWebp'])->name('convert.webp');
