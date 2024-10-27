<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DasboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublisherController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/',[DasboardController::class,'dasboard'])->name('index');
Auth::routes();


Route::middleware('auth','role:admin')->group(function(){
    Route::get('/admin', [HomeController::class, 'index'])->name('home');
    Route::resource('Category',CategoryController::class);
    Route::resource('Publisher',PublisherController::class);
    Route::resource('Book',BookController::class);
    Route::get('/User',[Controller::class,'User'])->name('user');
});
