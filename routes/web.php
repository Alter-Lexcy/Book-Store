<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublisherController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resource('Category',CategoryController::class);
    Route::resource('Publisher',PublisherController::class);
    Route::resource('Book',BookController::class);
});
