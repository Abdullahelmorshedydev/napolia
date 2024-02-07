<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Site\CartController;
use App\Http\Controllers\Web\Site\HomeController;
use App\Http\Controllers\Web\Site\OrderController;
use App\Http\Controllers\Web\Site\ProductController;
use App\Http\Controllers\Web\Site\CategoryController;
use App\Http\Controllers\Web\Site\FavouriteController;
use App\Http\Controllers\Web\Site\Auth\LoginController;
use App\Http\Controllers\Web\Site\Auth\ProfileController;
use App\Http\Controllers\Web\Site\Auth\RegisterController;
use App\Http\Controllers\Web\Site\BlogController;
use App\Http\Controllers\Web\Site\ContactusController;
use App\Http\Controllers\Web\Site\Settings\AboutUsSettingsController;
use App\Http\Controllers\Web\Site\Settings\ReturnExchangeSettingsController;
use App\Http\Controllers\Web\Site\Settings\TermsSettingsController;

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

Route::get('/category/{category}', [CategoryController::class, 'index'])->name('category.index');

Route::get('/product/{product}', [ProductController::class, 'index'])->name('product.index');

Route::controller(FavouriteController::class)->middleware('check.auth.login')->prefix('/favourites')->as('favourites.')->group(function () {

    Route::get('/', 'index')->name('index');
    Route::get('/store/{id}', 'store')->name('store');
    Route::get('/delete/{id}', 'delete')->name('delete');
});

Route::controller(CartController::class)->middleware('check.auth.login')->prefix('/cart')->as('cart.')->group(function () {

    Route::get('/', 'index')->name('view');
    Route::post('/add-to-cart', 'addToCart')->name('add.to.cart');
    Route::get('/delete-from-cart/{id}', 'deleteItem')->name('delete.item');
});

Route::controller(OrderController::class)->middleware('check.auth.login')->prefix('/orders')->as('order.')->group(function () {

    Route::get('place-order', 'placeOrder')->name('place_order');
    Route::get('/order-cities/{id?}', 'getCities')->name('order_cities');
    Route::get('/order-states/{id?}', 'getStates')->name('order_states');
    Route::get('/state-shipping/{id?}', 'getShipping')->name('state_shipping');

    Route::get('/checkout/{id}', 'checkout')->name('checkout');
    Route::get('/order-success/{order}', 'orderSuccess')->name('order_success');
    Route::post('/store', 'store')->name('store');
    
    Route::get('/', 'allOrders')->name('all_orders');
    Route::get('/track-order/{order}', 'trackOrder')->name('track_order');
});

Route::get('/about-us', AboutUsSettingsController::class)->name('aboutus');

Route::get('/terms-conditions', TermsSettingsController::class)->name('terms');

Route::get('/return-exchange', ReturnExchangeSettingsController::class)->name('return_exchange');

Route::get('/contact-us', [ContactusController::class, 'index'])->name('contactus.index');

Route::post('/contact-us', [ContactusController::class, 'store'])->name('contactus.store');

Route::controller(BlogController::class)->prefix('/blog')->as('blog.')->group(function () {

    Route::get('/', 'index')->name('index');
    Route::get('/{blog}', 'show')->name('show');
    Route::post('/store', 'store')->name('store');
});

Route::fallback(function () {
    return redirect()->route('index');
});