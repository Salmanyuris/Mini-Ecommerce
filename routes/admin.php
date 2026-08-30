<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

// Group dengan prefix 'admin'
Route::prefix('admin')->group(function () {
    
    // Public Admin Routes (bisa diakses tanpa login)
    Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'authenticate'])->name('admin.authenticate');

    // Protected Admin Routes (harus login)
    Route::middleware(['admin'])->group(function () {
        Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        
        // Products Management
        Route::resource('products', ProductController::class)->except(['show']);
        
        // Categories Management  
        Route::resource('categories', CategoryController::class)->except(['show']);
        
        // Orders Management
        Route::resource('orders', OrderController::class)->except(['create', 'store', 'destroy']);
        Route::put('/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('admin.orders.update-status');
    });
});