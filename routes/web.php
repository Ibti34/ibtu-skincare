<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;

//  Public Routes


// Home & Products
Route::get('/', [ProductController::class, 'home'])->name('home');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');

// Contact Page
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Public Cart Routes (Guests) - UPDATED WITH {id}
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add.public');
Route::post('/cart/increase/{id}', [CartController::class, 'increase'])->name('cart.increase.public');
Route::post('/cart/decrease/{id}', [CartController::class, 'decrease'])->name('cart.decrease.public');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove.public');

//  Authenticated Routes


Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Auth Cart Routes - Points to Auth methods in CartController
    Route::post('/auth/cart/add/{id}', [CartController::class, 'add'])->name('cart.add.auth');
    Route::post('/auth/cart/increase/{id}', [CartController::class, 'increaseAuth'])->name('cart.increase.auth');
    Route::post('/auth/cart/decrease/{id}', [CartController::class, 'decreaseAuth'])->name('cart.decrease.auth');
    Route::post('/auth/cart/remove/{id}', [CartController::class, 'removeAuth'])->name('cart.remove.auth');

    // Checkout
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
});

require __DIR__ . '/auth.php';

//  Database & Image Fix Routes


Route::get('/force-fix', function () {
    try {
        Artisan::call('migrate:fresh --force');
        Artisan::call('db:seed --class=ProductSeeder --force');
        Artisan::call('storage:link');

        return "SUCCESS! Database wiped, products added, and images linked. Go back to your home page!";
    } catch (\Exception $e) {
        return "ERROR: " . $e->getMessage();
    }
});
