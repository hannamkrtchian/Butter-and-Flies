<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

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

// Route::get('/clothes', [ItemController::class, 'clothes'])->name('clothes');

Auth::routes();

Route::get('/cart', function(){
    return view('cart');
});

Route::get('/home', [ItemController::class, 'index'])->name('index');
