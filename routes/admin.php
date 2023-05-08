<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MenuBarController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'dashboard'])->name('admin.dashboard');

Route::get('/menubar/index/', [MenuBarController::class, 'index'])->name('admin.dashboard');
