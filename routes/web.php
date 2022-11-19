<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CartController;

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

Route::get('/', [ItemController::class, 'index'])->name('index');

Route::get('/about', function(){
    return view('about');
});

Route::resource('items', ItemController::class);

Auth::routes();

Route::get('/cart', [CartController::class, 'cart'])->name('cart');

// Route::get('/cart', [CartController::class, 'AddItemToCart'])->name('addToCart');

Route::get('/clothes', [ItemController::class, 'clothes'])->name('clothes');

Route::get('/shoes', [ItemController::class, 'shoes'])->name('shoes');

Route::get('/accessories', [ItemController::class, 'accessories'])->name('accessories');

Route::get('/home', [ItemController::class, 'index'])->name('index');
