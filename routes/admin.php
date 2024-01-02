<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Admin\Auth\LoginController;
use App\Http\Controllers\Web\Admin\Auth\RegisterController;
use App\Http\Controllers\Web\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Web\Admin\Settings\FilesSettingsController;
use App\Http\Controllers\Web\Admin\Settings\LinksSettingsController;
use App\Http\Controllers\Web\Admin\Settings\GeneralSettingsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('web.admin.pages.index');
})->middleware('auth:admin')->name('index');

Route::middleware('guest:admin')->prefix('/auth')->as('auth.')->group(function () {

    Route::controller(RegisterController::class)->as('register.')->group(function () {

        Route::get('/register', 'register')->name('show');
        Route::post('/register/store', 'store')->name('store');
    });

    Route::controller(LoginController::class)->as('login.')->group(function () {

        Route::get('/login', 'login')->name('show');
        Route::post('/login/store', 'store')->name('store');
    });

    Route::controller(ResetPasswordController::class)->as('forget.')->group(function () {

        Route::get('/forgetPassword', 'index')->name('index');
        Route::post('/forget-password/send', 'send')->name('send');

        Route::get('/reset-password/{email}', 'update')->name('update');
        Route::post('/reset-password', 'reset')->name('reset');
    });
});

Route::middleware('auth:admin')->group(function () {

    Route::get('/', function () {
        return view('web.admin.pages.index');
    })->name('index');

    Route::prefix('/settings')->as('settings.')->group(function () {

        Route::controller(GeneralSettingsController::class)->as('general.')->group(function () {

            Route::get('/general', 'index')->name('index');
            Route::put('/general', 'update')->name('update');
        });

        Route::controller(FilesSettingsController::class)->as('files.')->group(function () {

            Route::get('/files', 'index')->name('index');
            Route::put('/files', 'update')->name('update');
        });

        Route::controller(LinksSettingsController::class)->as('links.')->group(function () {

            Route::get('/links', 'index')->name('index');
            Route::put('/links', 'update')->name('update');
        });
    });

    Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');
});
