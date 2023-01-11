<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Restaurant\HomeController;
use App\Http\Controllers\Restaurant\CustomerController;
use App\Http\Controllers\Restaurant\SectionController;
use App\Http\Controllers\Restaurant\branchController;




Route::get('dashboard',[HomeController::class,'home'])->name('dashboard');
Route::resource('customers',CustomerController::class);
Route::resource('branches',branchController::class);
Route::resource('sections',SectionController::class);
