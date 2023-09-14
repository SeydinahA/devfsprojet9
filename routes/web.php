<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Auth;



Route::get('/', [HomeController::class, 'index']);


Route::post('/logout', [HomeController::class, 'logout'])->name('logout');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::middleware(['auth'])->group(function () {
   Route::get('/redirect', [HomeController::class, 'redirect'])->name('redirect'); 
});


Route::middleware(['auth'])->group(function () {
    Route::get('/view_category', [AdminController::class, 'view_category'])->name('view_category');
});


Route::middleware(['auth'])->group(function () {
    Route::post('/add_category', [AdminController::class, 'add_category'])->name('add_category');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/delete_category/{id}', [AdminController::class, 'delete_category'])->name('delete_category');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/view_product', [AdminController::class, 'view_product'])->name('view_product');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/add_product', [AdminController::class, 'add_product'])->name('add_product');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/view_showProduct', [AdminController::class, 'view_showProduct'])->name('view_showProduct');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/delete_product/{id}', [AdminController::class, 'delete_product'])->name('delete_product');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/update_product/{id}', [AdminController::class, 'update_product'])->name('update_product');
});

Route::middleware(['auth'])->group(function () {
    Route::put('/update_product_confirm/{id}', [AdminController::class, 'update_product_confirm'])->name('update_product_confirm');
});

Route::middleware(['auth'])->group(function () {
    Route::get('order', [AdminController::class, 'order'])->name('order');
});

Route::middleware(['auth'])->group(function () {
    Route::get('delivered/{id}', [AdminController::class, 'delivered'])->name('delivered');
});

Route::middleware(['auth'])->group(function () {
    Route::get('search', [AdminController::class, 'searchdata'])->name('searchdata');
});






Route::middleware(['auth'])->group(function () {
    Route::get('/product_details/{id}', [HomeController::class, 'product_details'])->name('product_details'); 
});

Route::middleware(['auth'])->group(function () {
    Route::post('/add_cart/{id}', [HomeController::class, 'add_cart'])->name('add_cart'); 
});

Route::middleware(['auth'])->group(function () {
    Route::get('/show_cart', [HomeController::class, 'show_cart'])->name('show_cart'); 
});

Route::middleware(['auth'])->group(function () {
    Route::get('/remove_product/{id}', [HomeController::class, 'remove_product'])->name('remove_product'); 
});

Route::middleware(['auth'])->group(function () {
    Route::get('/cash_order', [HomeController::class, 'cash_order'])->name('cash_order'); 
});

Route::middleware(['auth'])->group(function () {
    Route::get('/show_order', [HomeController::class, 'show_order'])->name('show_order'); 
});

Route::middleware(['auth'])->group(function () {
    Route::get('/cancel_order/{id}', [HomeController::class, 'cancel_order'])->name('cancel_order'); 
});

