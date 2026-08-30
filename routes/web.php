<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;

// Public Routes
Route::get('/', function () {
    $featured_products = \App\Models\Product::where('is_active', true)
        ->latest()
        ->take(8)
        ->get();
    return view('home', compact('featured_products'));
})->name('home');
// Load admin routes
require __DIR__.'/admin.php';


Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// Cart Routes
Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
});

// Checkout
Route::get('/checkout', function () {
    $cart = session()->get('cart', []);
    if (empty($cart)) {
        return redirect()->route('cart.index')->with('error', 'Keranjang belanja kosong!');
    }
    return view('checkout');
})->name('checkout');

Route::post('/checkout', [OrderController::class, 'store'])->name('orders.store');

// ==================== ADMIN ROUTES ====================
Route::prefix('admin')->group(function () {
    // Auth Routes - Bisa diakses tanpa login
    Route::get('login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('login', [AdminController::class, 'authenticate'])->name('admin.authenticate');
    
    // Protected Routes - Harus login admin
    Route::middleware(['admin'])->group(function () {
        Route::post('logout', [AdminController::class, 'logout'])->name('admin.logout');
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        
        // Products Management
        Route::get('products', [AdminProductController::class, 'index'])->name('admin.products.index');
        Route::get('products/create', [AdminProductController::class, 'create'])->name('admin.products.create');
        Route::post('products', [AdminProductController::class, 'store'])->name('admin.products.store');
        Route::get('products/{product}/edit', [AdminProductController::class, 'edit'])->name('admin.products.edit');
        Route::put('products/{product}', [AdminProductController::class, 'update'])->name('admin.products.update');
        Route::delete('products/{product}', [AdminProductController::class, 'destroy'])->name('admin.products.delete');
        
        // Categories Management  
        Route::get('categories', [AdminCategoryController::class, 'index'])->name('admin.categories.index');
        Route::get('categories/create', [AdminCategoryController::class, 'create'])->name('admin.categories.create');
        Route::post('categories', [AdminCategoryController::class, 'store'])->name('admin.categories.store');
        Route::get('categories/{category}/edit', [AdminCategoryController::class, 'edit'])->name('admin.categories.edit');
        Route::put('categories/{category}', [AdminCategoryController::class, 'update'])->name('admin.categories.update');
        Route::delete('categories/{category}', [AdminCategoryController::class, 'destroy'])->name('admin.categories.delete');
        
        // Orders Management
        Route::get('orders', [AdminOrderController::class, 'index'])->name('admin.orders.index');
        Route::get('orders/{order}', [AdminOrderController::class, 'show'])->name('admin.orders.show');
        Route::get('orders/{order}/edit', [AdminOrderController::class, 'edit'])->name('admin.orders.edit');
        Route::put('orders/{order}', [AdminOrderController::class, 'update'])->name('admin.orders.update');
        Route::put('orders/{order}/status', [AdminOrderController::class, 'updateStatus'])->name('admin.orders.update-status');
    });
});

// Breeze Auth Routes (Untuk user biasa)
require __DIR__.'/auth.php';