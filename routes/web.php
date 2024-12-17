<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Redirect the root URL to the products index page
Route::get('/', [ProductController::class, 'index'])->name('home');

// Resourceful routes for products
Route::resource('products', ProductController::class);

// Substracts from the stock
// Add this route
Route::post('products/{product}/buy', [ProductController::class, 'buy'])->name('products.buy');

