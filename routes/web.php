<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;

// =========================
// Home & Products
// =========================

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

// =========================
// Contact Page
// =========================

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// =========================
// Public Cart Routes
// =========================

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add.public');
Route::post('/cart/increase', [CartController::class, 'increase'])->name('cart.increase.public');
Route::post('/cart/decrease', [CartController::class, 'decrease'])->name('cart.decrease.public');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove.public');

// =========================
// Authenticated Routes
// =========================

Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Authenticated Cart actions
    Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add.auth');
    Route::post('/cart/increase/{id}', [CartController::class, 'increase'])->name('cart.increase.auth');
    Route::post('/cart/decrease/{id}', [CartController::class, 'decrease'])->name('cart.decrease.auth');
    Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove.auth');

    // Checkout
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
});

// =========================
// Auth Routes (Laravel Breeze)
// =========================

require __DIR__ . '/auth.php';
