<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Site\HomeController;
use App\Http\Controllers\Web\Site\Auth\LoginController;
use App\Http\Controllers\Web\Site\Auth\ProfileController;
use App\Http\Controllers\Web\Site\Auth\RegisterController;
use App\Http\Controllers\Web\Site\Auth\ResetPasswordController;

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

Route::middleware('guest:web')->prefix('/auth')->as('auth.')->group(function () {

    Route::controller(LoginController::class)->as('login.')->group(function () {

        Route::get('/login', 'login')->name('show');
        Route::post('/login/store', 'store')->name('store');
    });

    Route::controller(RegisterController::class)->as('register.')->group(function () {

        Route::get('/register', 'index')->name('show');
        Route::post('/register/store', 'store')->name('store');
    });
});

Route::middleware('auth:web')->group(function () {

    Route::controller(ProfileController::class)->prefix('/profile')->as('profile.')->group(function () {

        Route::get('/', 'index')->name('index');
        Route::put('/updateProfile', 'updateProfile')->name('update');
        Route::get('/profile_cities/{id?}', 'getCities')->name('profile_cities');
        Route::get('/profile_states/{id?}', 'getStates')->name('profile_states');
        Route::put('/passwordUpdate', 'passwordUpdate')->name('password_update');
    });

    Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');
});

Route::get('/', HomeController::class)->name('index');

Route::fallback(function () {
    return redirect()->route('index');
});