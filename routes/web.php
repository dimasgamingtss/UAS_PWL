<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('products/sales', [ProductController::class, 'sales'])->name('products.sales');
    Route::get('products/sales/{sale}', [ProductController::class, 'showSale'])->name('products.sales.show');
    Route::resource('products', ProductController::class);
    Route::resource('sales', SaleController::class);

    // Route untuk menampilkan invoice
    Route::get('/invoice/{id}', [SaleController::class, 'showInvoice'])->name('invoice.show');
});

Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store']);
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/home', [HomeController::class, 'index'])->name('home');
