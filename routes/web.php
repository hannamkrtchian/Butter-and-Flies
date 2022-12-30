<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FaqController;

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

// items
Route::resource('items', ItemController::class);

// auth
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
Route::resource('users', UserController::class);

// faq
Route::get('/faq', [FaqController::class, 'show'])->name('faq.show');

Route::get('/faq/{id}/create', [FaqController::class, 'create'])->name('faq.create');

Route::post('/faq/store/category', [FaqController::class, 'storeCat'])->name('faq.store.category');

Route::post('/faq/{id}/store', [FaqController::class, 'storeFaq'])->name('faq.store');

Route::get('/faq/edit', [FaqController::class, 'edit'])->name('faq.edit');

Route::put('/faq/{id}/update', [FaqController::class, 'update'])->name('faq.update');

Route::delete('/faq/{id}/deleteCategory', [FaqController::class, 'destroyCat'])->name('faq.destroy.category');

Route::delete('/faq/{id}/deleteFaq', [FaqController::class, 'destroyFaq'])->name('faq.destroy');