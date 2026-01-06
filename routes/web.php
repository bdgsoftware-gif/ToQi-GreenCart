<?php

use Illuminate\Support\Facades\Route;

// Load segmented route files
require __DIR__ . '/auth.php';
require __DIR__ . '/web/frontend.php';
require __DIR__ . '/web/customer.php';
require __DIR__ . '/web/seller.php';
require __DIR__ . '/web/admin.php';

Route::fallback(fn() => response()->view('errors.404', [], 404));

Route::get('/api/documentation', fn() => view('api.documentation'))->name('api.documentation');

Route::prefix('webhooks')->name('webhooks.')->group(function () {
    Route::post('/payment/success')->name('payment.success');
    Route::post('/payment/failed')->name('payment.failed');
    Route::post('/payment/refund')->name('payment.refund');
});
