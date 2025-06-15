<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Guest Routes
Route::middleware('guest')->group(function () {
    Route::controller(AuthenticatedSessionController::class)->group(function () {
        Route::get('/login', 'create')->name('login');
        Route::post('/login', 'store');
    });

    // Google Auth
    Route::controller(GoogleController::class)->group(function () {
        Route::get('auth/google', 'redirectToGoogle');
        Route::get('auth/google/callback', 'handleGoogleCallback');
    });
});

// Authenticated User Routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function() {
        return Auth::user()->role === 'admin' 
            ? redirect()->route('admin.dashboard')
            : app(ProductController::class)->index();
    })->name('dashboard');

    // Profile Routes
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });

    // Order Routes
    Route::controller(OrderController::class)->group(function () {
        Route::get('/products/{product}/order', 'show')->name('orders.show');
        Route::post('/products/{product}/order', 'store')->name('orders.store');
        Route::get('/checkout', 'checkout')->name('orders.checkout');
        Route::post('/checkout', 'processCheckout')->name('orders.processCheckout');
        Route::get('/orders/{order}/success', 'success')->name('orders.success');
        Route::get('/orders/history', 'history')->name('orders.history');
    });

    // Cart Routes
    Route::controller(CartController::class)->group(function () {
        Route::get('/cart', 'index')->name('cart.index');
        Route::post('/cart/add/{product}', 'add')->name('cart.add');
        Route::put('/cart/decrease/{product}', 'decrease')->name('cart.decrease');
        Route::delete('/cart/{product}', 'remove')->name('cart.remove');
        Route::post('/cart/clear', 'clear')->name('cart.clear');
    });
});

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        
        // Product Management
        Route::get('/products', 'products')->name('products');
        Route::post('/products', 'storeProduct')->name('products.store');
        Route::put('/products/{product}', 'updateProduct')->name('products.update');
        Route::delete('/products/{product}', 'destroyProduct')->name('products.destroy');
        
        Route::get('/orders', 'orders')->name('orders');
        Route::get('/users', 'users')->name('users');
        Route::patch('/orders/{order}/status', 'updateOrderStatus')->name('orders.status');
    });
});

require __DIR__.'/auth.php';