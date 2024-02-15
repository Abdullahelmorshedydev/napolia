<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Site\CartController;
use App\Http\Controllers\Web\Site\BlogController;
use App\Http\Controllers\Web\Site\HomeController;
use App\Http\Controllers\Web\Site\OrderController;
use App\Http\Controllers\Web\Site\ProductController;
use App\Http\Controllers\Web\Site\CategoryController;
use App\Http\Controllers\Api\Site\FavouriteController;
use App\Http\Controllers\Api\Site\GetCitiesController;
use App\Http\Controllers\Api\Site\GetStatesController;
use App\Http\Controllers\Web\Site\ContactusController;
use App\Http\Controllers\Web\Site\Auth\LoginController;
use App\Http\Controllers\Api\Site\GetShippingController;
use App\Http\Controllers\Web\Site\Auth\ProfileController;
use App\Http\Controllers\Web\Site\Auth\RegisterController;
use App\Http\Controllers\Web\Site\Settings\TermsSettingsController;
use App\Http\Controllers\Web\Site\Settings\AboutUsSettingsController;
use App\Http\Controllers\Web\Site\CartController as SiteCartController;
use App\Http\Controllers\Web\Site\FavouriteController as SiteFavouriteController;
use App\Http\Controllers\Web\Site\Settings\ReturnExchangeSettingsController;

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
        Route::put('/passwordUpdate', 'passwordUpdate')->name('password_update');
    });
    Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');
});

Route::get('/', HomeController::class)->name('index');

Route::get('/category/{category}', [CategoryController::class, 'index'])->name('category.index');

Route::get('/product/{product}', [ProductController::class, 'index'])->name('product.index');

Route::middleware('check.auth.login')->group(function () {

    Route::post('/rate-product', [ProductController::class, 'rateProduct'])->name('rate.product');

    Route::prefix('/favourites')->as('favourites.')->group(function () {
        Route::get('/', SiteFavouriteController::class)->name('index');
        Route::controller(FavouriteController::class)->group(function () {
            Route::post('/store', 'store')->name('store');
            Route::delete('/delete', 'delete')->name('delete');
        });
    });

    Route::prefix('/cart')->as('cart.')->group(function () {
        Route::get('/', SiteCartController::class)->name('view');
        Route::controller(CartController::class)->group(function () {
            Route::post('/add-to-cart', 'addToCart')->name('add.to.cart');
            Route::delete('/delete-from-cart', 'deleteItem')->name('delete.item');
        });
    });

    Route::controller(OrderController::class)->prefix('/orders')->as('order.')->group(function () {
        Route::get('checkout', 'checkout')->name('checkout');
        Route::get('/order-success/{order}', 'orderSuccess')->name('order_success');
        Route::post('/store', 'store')->name('store');
        Route::get('/', 'allOrders')->name('all_orders');
        Route::get('/track-order/{order}', 'trackOrder')->name('track_order');
    });
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

Route::get('/cities/{id?}', [GetCitiesController::class, 'getCities'])->name('cities');
Route::get('/states/{id?}', [GetStatesController::class, 'getStates'])->name('states');
Route::get('/state-shipping/{id?}', [GetShippingController::class, 'getShipping'])->name('state_shipping');

Route::fallback(function () {
    return redirect()->route('index');
});
