<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Admin\Auth\LoginController;
use App\Http\Controllers\Web\Admin\Auth\ProfileController;
use App\Http\Controllers\Web\Admin\Auth\RegisterController;
use App\Http\Controllers\Web\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Web\Admin\CategoryController;
use App\Http\Controllers\Web\Admin\CityController;
use App\Http\Controllers\Web\Admin\CountryController;
use App\Http\Controllers\Web\Admin\CouponController;
use App\Http\Controllers\Web\Admin\HomeController;
use App\Http\Controllers\Web\Admin\ProductController;
use App\Http\Controllers\Web\Admin\Settings\FilesSettingsController;
use App\Http\Controllers\Web\Admin\Settings\LinksSettingsController;
use App\Http\Controllers\Web\Admin\Settings\AboutUsSettingsController;
use App\Http\Controllers\Web\Admin\Settings\ContactSettingsController;
use App\Http\Controllers\Web\Admin\Settings\GeneralSettingsController;
use App\Http\Controllers\Web\Admin\Settings\ReturnExchangeSettingsController;
use App\Http\Controllers\Web\Admin\Settings\TermsSettingsController;
use App\Http\Controllers\Web\Admin\ShippingController;
use App\Http\Controllers\Web\Admin\SliderController;
use App\Http\Controllers\Web\Admin\StateController;

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

    Route::get('/', HomeController::class)->name('index');

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

        Route::controller(AboutUsSettingsController::class)->as('about_us.')->group(function () {

            Route::get('/about-us', 'index')->name('index');
            Route::put('/about-us', 'update')->name('update');
        });

        Route::controller(ContactSettingsController::class)->as('contact.')->group(function () {

            Route::get('/contact', 'index')->name('index');
            Route::put('/contact', 'update')->name('update');
        });

        Route::controller(TermsSettingsController::class)->as('terms.')->group(function () {

            Route::get('/terms', 'index')->name('index');
            Route::put('/terms', 'update')->name('update');
        });

        Route::controller(ReturnExchangeSettingsController::class)->as('return_exchange.')->group(function () {

            Route::get('/return_exchange', 'index')->name('index');
            Route::put('/return_exchange', 'update')->name('update');
        });
    });

    Route::controller(ProfileController::class)->prefix('/profile')->as('profile.')->group(function () {

        Route::get('/', 'index')->name('index');
        Route::post('/generalStore', 'generalStore')->name('general_store');
        Route::put('/generalUpdate', 'generalUpdate')->name('general_update');
        Route::put('/passwordUpdate', 'passwordUpdate')->name('password_update');
    });

    Route::resource('sliders', SliderController::class)->except('show');

    Route::resource('categories', CategoryController::class);

    Route::resource('products', ProductController::class);
    Route::get('/sub-categories/{id?}',[ProductController::class, 'getSubCategories'])->name('sub_categories');

    Route::resource('coupons', CouponController::class)->except('show');

    Route::resource('countries', CountryController::class)->except('show');

    Route::resource('cities', CityController::class)->except('show');

    Route::resource('states', StateController::class)->except('show');
    Route::get('/country_cities/{id?}',[StateController::class, 'getCities'])->name('country_cities');

    Route::resource('shippings', ShippingController::class)->except('show');
    Route::get('/shiping_cities/{id?}',[ShippingController::class, 'getCities'])->name('shipping_cities');

    Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');
});
