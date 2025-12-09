<?php

use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\DoctorController;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\Dashboard\ServiceController;
use App\Http\Controllers\HomeController;
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
            Route::get('/admin', [HomeController::class, 'index'])->name('dashboard.admin');
        });

        Route::middleware(['auth:admin'])->group(function () {

            // Sections Route Start
            Route::prefix('sections')->group(function () {
                Route::get('index', [SectionController::class, 'index'])->name('section.index');
                Route::get('create', [SectionController::class, 'create'])->name('section.create');
                Route::post('store', [SectionController::class, 'store'])->name('section.store');
                Route::get('show/{id}', [SectionController::class, 'show'])->name('section.show');
                Route::get('edit/{user}', [SectionController::class, 'edit'])->name('section.edit');
                Route::put('update/{user}', [SectionController::class, 'update'])->name('section.update');
                Route::delete('delete/{id}', [SectionController::class, 'destroy'])->name('section.delete');
            });
            // Sections Route End
            #####################################################################

            // Doctors Route Start
            Route::prefix('doctors')->group(function () {
                Route::get('index', [DoctorController::class, 'index'])->name('doctor.index');
                Route::get('create', [DoctorController::class, 'create'])->name('doctor.create');
                Route::post('store', [DoctorController::class, 'store'])->name('doctor.store');
                Route::post('show/{id}', [DoctorController::class, 'show'])->name('doctor.show');
                Route::get('edit/{id}', [DoctorController::class, 'edit'])->name('doctor.edit');
                Route::put('update/{id}', [DoctorController::class, 'update'])->name('doctor.update');
                Route::delete('delete/{id?}', [DoctorController::class, 'destroy'])->name('doctor.delete');

                Route::put('change-status/{id}', [DoctorController::class, 'changeStatus'])->name('doctor.changeStatus');
            }); // Doctors Route End
            #############################################################################################

            // Serivces Route Start
            Route::prefix('services')->group(function () {
                Route::get('index', [ServiceController::class, 'index'])->name('Service.index');
                Route::get('create', [ServiceController::class, 'create'])->name('Service.create');
                Route::post('store', [ServiceController::class, 'store'])->name('Service.store');
                Route::get('edit/{id}', [ServiceController::class, 'edit'])->name('Service.edit');
                Route::put('update/{id}', [ServiceController::class, 'update'])->name('Service.update');
                Route::delete('delete/{id}', [ServiceController::class, 'destroy'])->name('Service.delete');
                Route::patch('change-status/{id}', [ServiceController::class, 'changeStatus'])->name('service.changeStatus');
            }); // Services Route End
            ###########################################################################################
            // Doctors Route End
        });
        require __DIR__ . '/auth.php';
    }
);
