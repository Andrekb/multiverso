<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\DropzoneController;
use App\Http\Controllers\AdminAreaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware('auth')->group(function () {
    Route::get('/', [AdminAreaController::class, 'dashboard'])->name('dashboard.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/lojas-estoque', [StoreController::class, 'stock'])->name('lojas.stock');
    Route::get('/produtos/{id}/images', [ProductController::class, 'images'])->name('produtos.images');
    Route::delete('/images-destroy/{id}', [ProductController::class, 'imagesDestroy'])->name('produtos.destroyImage');
    Route::post('/images-store', [ProductController::class, 'imagesStore'])->name('produtos.imagesStore');    
    
    Route::resource('/produtos', ProductController::class);
    Route::resource('/cidades', CityController::class);
    Route::resource('/lojas', StoreController::class);


});

require __DIR__.'/auth.php';
