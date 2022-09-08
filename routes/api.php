<?php

use App\Http\Controllers\Api\V1\ProductController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function () {
    // Product
    Route::group(['prefix' => 'product'], function () {
        Route::get('/', [ProductController::class, 'getAllProducts'])->name('product.all');
        Route::get('{product}', [ProductController::class, 'getProduct'])->name('product.get');
    });
});
