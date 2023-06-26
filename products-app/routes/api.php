<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Categories\ProductController;

Route::get('/products', [ProductController::class, 'index']);

Route::post('/products', [ProductController::class, 'create']);

Route::get('/products/{id}', [ProductController::class, 'getbyId']);

Route::get('/products/{id}/edit', [ProductController::class, 'edit']);

Route::put('/products/{id}/edit', [ProductController::class, 'update']);

Route::delete('/products/{id}/delete', [ProductController::class, 'delete']);