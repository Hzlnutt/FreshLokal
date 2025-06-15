<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Public routes
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{product}', [ProductController::class, 'show']);

// Authenticated routes
Route::middleware(['auth:sanctum'])->group(function () {
    // Product routes
    Route::post('/products', [ProductController::class, 'store']);
    Route::put('/products/{product}', [ProductController::class, 'update']);
    Route::delete('/products/{product}', [ProductController::class, 'destroy']);
    
    // Cart routes
    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart/add/{product}', [CartController::class, 'add']);
    Route::put('/cart/decrease/{product}', [CartController::class, 'decrease']);
    Route::delete('/cart/{product}', [CartController::class, 'remove']);
    Route::post('/cart/clear', [CartController::class, 'clear']);
    
    // Order routes
    Route::get('/orders', [OrderController::class, 'index']);
    Route::get('/orders/{order}', [OrderController::class, 'show']);
    Route::post('/products/{product}/order', [OrderController::class, 'store']);
    Route::post('/checkout', [OrderController::class, 'checkout']);
});

// User authentication route
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});