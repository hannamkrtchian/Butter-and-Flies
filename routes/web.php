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

Route::get('/', function(){
    return view('home');
});

Route::get('/item', [ItemController::class, 'item'])->name('item');

Auth::routes();

Route::get('/cart', function(){
    return view('cart');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
