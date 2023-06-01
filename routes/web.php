<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LandingPageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(LandingPageController::class)->name('landing.')->group( function() {
    Route::get('/', 'index')->name('index');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/about', 'about')->name('about');
    Route::get('/checkout/{id}', 'buy')->name('buy');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::controller(LandingPageController::class)->name('landing.')->group( function() {
        Route::get('/payment/{id}', 'payment')->name('payment');
        Route::put('/payment/order', 'order')->name('order');
    });

    Route::controller(PesananController::class)->prefix('pesanan')->name('pesanan.user.')->group( function() {
        Route::get('/', 'indexUser')->name('index');
    });

    Route::controller(UsersController::class)->prefix('user')->name('user.')->group( function() {
        Route::get('/', 'edit')->name('edit');
        Route::put('/update', 'updateUser')->name('updateUser');
    });
});


Route::middleware(['auth','ceklevel:Admin'])->group(function () {
    Route::controller(UsersController::class)->prefix('admin/user')->name('user.')->group( function() {
        Route::get('/', 'index')->name('index');
        Route::put('/store', 'store')->name('store');
        Route::put('/update/{id}', 'update')->name('update');
        Route::put('/delete/{id}', 'destroy')->name('delete');
    });

    Route::controller(ProductController::class)->prefix('admin/product')->name('product.')->group( function() {
        Route::get('/', 'index')->name('index');
        Route::put('/store', 'store')->name('store');
        Route::put('/update/{id}', 'update')->name('update');
        Route::put('/delete/{id}', 'destroy')->name('delete');
    });

    Route::controller(PesananController::class)->prefix('admin/pesanan')->name('pesanan.')->group( function() {
        Route::get('/', 'index')->name('index');
        Route::put('/update/{id}', 'update')->name('update');
        Route::put('/delete/{id}', 'destroy')->name('delete');
    });
});
