<?php

use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Dashboard.index');
});


Auth::routes();

Route::get('/home', [DashboardController::class, 'index'])->name('home');
