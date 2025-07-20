<?php

use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;



Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard.admin');

// للمستخدم العادي (web user)
Route::middleware(['auth:web'])->prefix('dashboard')->group(function () {
    Route::get('/user', function () {
        return view('Dashboard.User.dashboard');
    })->name('dashboard.user');
});

// للأدمن (admin)
Route::middleware(['auth:admin'])->prefix('dashboard')->group(function () {
    Route::get('/admin', function () {
        return view('Dashboard.Admin.dashboard');
    })->name('dashboard.admin');
});

require __DIR__ . '/auth.php';
