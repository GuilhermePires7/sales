<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ProductsController;


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

Route::get('/', [SaleController::class, 'sale'])->name('site.sale');
Route::get('/customers', [SaleController::class, 'customers'])->name('site.customers');
Route::post('/customers', [SaleController::class, 'customers_save'])->name('site.customers');
Route::get('/products', [ProductsController::class, 'products'])->name('site.products');
Route::post('/products', [ProductsController::class, 'products_save'])->name('site.products');

Route::get('/get-data/{id}', [SaleController::class, 'sale'])->name('site.sales');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
