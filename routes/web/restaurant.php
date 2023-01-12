<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Restaurant\HomeController;
use App\Http\Controllers\Restaurant\CustomerController;
use App\Http\Controllers\Restaurant\SectionController;
use App\Http\Controllers\Restaurant\branchController;
use App\Http\Controllers\Restaurant\TablesController;




Route::get('dashboard',[HomeController::class,'home'])->name('dashboard');
Route::resource('customers',CustomerController::class);
Route::resource('branches',branchController::class);
Route::resource('sections',SectionController::class);
Route::resource('tables',TablesController::class);
Route::get('tables/qrCode/{table}',[TablesController::class,'qrCode'])->name('tables.qrCode');
