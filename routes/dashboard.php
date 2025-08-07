<?php

use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\SectionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard.admin');

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {


        // للمستخدم العادي (web user)
        Route::middleware(['auth:web'])->prefix('dashboard')->group(function () {
            Route::get('/user', function () {
                return view('Dashboard.User.dashboard');
            })->name('dashboard.user');
        });

        Route::get('forgot-password', [AdminController::class, 'forgotPasswordForm'])->name('password.request');
        Route::post('forgot-password', [AdminController::class, 'forgetPassword'])->name('password.send.code');
        Route::post('password/verify-code', [AdminController::class, 'verifyCode'])->name('password.verify.code');

        Route::get('password/check-code', function (Request $request) {
            $email = $request->query('email');
            return view('auth.check-code', compact('email'));
        })->name('password.check.code.form');


        Route::get('reset-password', [AdminController::class, 'resetPasswordForm'])->name('password.reset.form');
        Route::post('reset-password', [AdminController::class, 'resetPassword'])->name('password.reset.save');


        // للأدمن (admin)
        Route::middleware(['auth:admin'])->prefix('dashboard')->group(function () {
            Route::get('/admin', function () {
                return view('Dashboard.Admin.dashboard');
            })->name('dashboard.admin');
        });

        Route::middleware(['auth:admin'])->group(function () {

            // Sections Route Start
            Route::prefix('sections')->group(function () {
                Route::get('index', [SectionController::class, 'index'])->name('section.index');
                Route::get('create', [SectionController::class, 'create'])->name('section.create');
                Route::post('store', [SectionController::class, 'store'])->name('section.store');
                Route::get('edit/{user}', [SectionController::class, 'edit'])->name('section.edit');
                Route::put('update/{user}', [SectionController::class, 'update'])->name('section.update');
                Route::delete('delete/{id}', [SectionController::class, 'destroy'])->name('section.delete');
            });
            // Sections Route End
        });
        require __DIR__ . '/auth.php';
    }
);
