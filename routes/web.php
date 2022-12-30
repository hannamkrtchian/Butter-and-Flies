<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ContactController;

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
Route::get('/cart/{id}', [CartController::class, 'cart'])->name('cart');

Route::put('/cart/{id}/add', [CartController::class, 'AddItemToCart'])->name('addToCart');

Route::put('/cart/{item_id}/update', [CartController::class, 'update'])->name('cart.update');

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

// contact
Route::get('/contact', [ContactController::class, 'form'])->name('contact.form');

Route::get('/contact/view', [ContactController::class, 'show'])->name('contact.show');

Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');

Route::delete('/contact/{id}/delete', [ContactController::class, 'destroy'])->name('contact.destroy');