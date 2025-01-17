<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductsController;

Route::middleware('auth')->group(function () {

  Route::get('produtos', [ProductsController::class, 'create'])->name('products');

  Route::get('/produtos/token', [ProductsController::class, 'createOAuthToken'])->name('create-token');

  Route::post('/produtos/cadastrar-produto', [ProductsController::class, 'createProduct'])->name('cadastrar-produto');
});
