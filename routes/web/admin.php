<?php


use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\DriverController;
use App\Http\Controllers\Admin\TruckController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BillController;
use App\Http\Controllers\Admin\ReportController;


Route::middleware([\App\Http\Middleware\SuperAdmin::class])->group(function () {
    Route::get('dashboard', [HomeController::class, 'home'])->name('dashboard');
});

