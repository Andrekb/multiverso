<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::post('/usuario', [ApiController::class, 'user'])->name('api.user');

Route::middleware('auth:api')->group(function () {
    // Produtos
    Route::get('/produtos', [ApiController::class, 'products'])->name('products.list');
    Route::get('/produtos/pesquisa', [ApiController::class, 'productsSearch'])->name('products.search');
    // Lojas
    Route::get('/lojas', [ApiController::class, 'stores'])->name('stores.list');
    Route::get('/lojas/pesquisa', [ApiController::class, 'storesSearch'])->name('stores.search');    
    // Cidades    
    Route::get('/cidades', [ApiController::class, 'cities'])->name('cities.list');
    Route::get('/cidades/pesquisa', [ApiController::class, 'citiesSearch'])->name('cities.search');
});