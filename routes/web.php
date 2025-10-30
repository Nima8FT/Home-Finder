<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;

Route::resource('listing', ListingController::class)->except('index','show')->middleware('auth');
Route::resource('listing', ListingController::class)->only('index','show');

//login route
Route::get('login',[AuthController::class,'loginForm'])->name('login.form');
Route::post('login',[AuthController::class,'login'])->name('login');

//register route
Route::get('register',[AuthController::class,'registerForm'])->name('register.form');
Route::post('register',[AuthController::class,'register'])->name('register');

//logout
Route::post('logout',[AuthController::class,'logout'])->name('logout')->middleware('auth');
