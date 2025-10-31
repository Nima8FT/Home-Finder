<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\RealtorListingController;
use Illuminate\Support\Facades\Route;

//listing
Route::resource('listing', ListingController::class)->except('index','show')->middleware('auth');
Route::resource('listing', ListingController::class)->only('index','show');
Route::post('listing/filter', [ListingController::class, 'filter'])->name('listing.filter');

//login route
Route::get('login',[AuthController::class,'loginForm'])->name('login.form');
Route::post('login',[AuthController::class,'login'])->name('login');

//register route
Route::get('register',[AuthController::class,'registerForm'])->name('register.form');
Route::post('register',[AuthController::class,'register'])->name('register');

//logout
Route::post('logout',[AuthController::class,'logout'])->name('logout')->middleware('auth');


//realtor
Route::prefix('realtor')->name('realtor.')->middleware('auth')->group(function(){
    Route::resource('listing', RealtorListingController::class);
});
