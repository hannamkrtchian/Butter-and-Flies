<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;

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

// home
Route::get('/', [ItemController::class, 'index'])->name('index');

Route::get('/home', [ItemController::class, 'index'])->name('index');

// about
Route::get('/about', function(){
    return view('about');
});

Route::resource('items', ItemController::class);

Auth::routes();

// cart
Route::get('/cart', [CartController::class, 'cart'])->name('cart');

Route::post('/cart/add', [CartController::class, 'AddItemToCart'])->name('addToCart');

// clothes
Route::get('/clothes', [ItemController::class, 'clothes'])->name('clothes');

// shoes
Route::get('/shoes', [ItemController::class, 'shoes'])->name('shoes');

// accessories
Route::get('/accessories', [ItemController::class, 'accessories'])->name('accessories');

// profile
Route::get('user/{id}', [UserController::class, 'profile'])->name('profile');

Route::get('user/{id}/edit', [UserController::class, 'edit'])->name('edit');

Route::post('user/{id}/update', [UserController::class, 'update'])->name('update');
