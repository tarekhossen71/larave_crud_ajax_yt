<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::post('product/store', [ProductController::class, 'store'])->name('products.store');
Route::post('product/update/', [ProductController::class, 'update'])->name('products.update');
Route::post('product/destroy/', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('pagination/pagination-data', [ProductController::class, 'pagination']);
Route::get('product/search', [ProductController::class, 'search'])->name('products.search');