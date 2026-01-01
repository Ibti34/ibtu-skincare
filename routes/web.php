<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;



// Home page
Route::get('/', [ProductController::class, 'home'])->name('home');

// Products list
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Add product (store)
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// Edit product
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');

// Update product
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');

// Contact page
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


// Add product to cart (public)
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');

// View cart (public)
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');



Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Cart actions (only for logged-in users)
    Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/increase/{id}', [CartController::class, 'increase'])->name('cart.increase');
    Route::post('/cart/decrease/{id}', [CartController::class, 'decrease'])->name('cart.decrease');

    // Checkout
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
});

// Auth routes (Laravel Breeze)
require __DIR__ . '/auth.php';
