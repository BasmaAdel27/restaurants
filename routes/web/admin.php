<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use \App\Http\Controllers\Admin\UserController;


Route::get('dashboard', [HomeController::class, 'home'])->name('dashboard');

Route::resource('restaurants',UserController::class)->except('show');
