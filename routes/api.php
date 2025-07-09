<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/storeProducts', [ProductController::class, 'store']);

Route::get('/allProducts', [ProductController::class, 'index']);

Route::get('/getProduct', [ProductController::class, 'getProductById']);

Route::get('/products', [ProductController::class, 'getThree']);
