<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('users', UserController::class);
    Route::post('users/{user}/activate', [UserController::class, 'activate'])->name('users.activate');

    Route::resource('products', ProductController::class);
    Route::post('products/{product}/approve', [ProductController::class, 'approve'])->name('products.approve');

    Route::resource('orders', OrderController::class);
    Route::post('orders/{order}/update-status', [OrderController::class, 'updateStatus'])
        ->name('orders.update-status');
    Route::get('orders/{order}/invoice', [OrderController::class, 'invoice'])
        ->name('orders.invoice');
});
