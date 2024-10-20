<?php

use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArchiveController;

Route::get('/', function () {
    return view('home_page');
});


Route::get('/albums', [AlbumController::class, 'index'])->name('albums.index');;

Route::get('/archive', [ArchiveController::class, 'index'])->name('archive.index');

Route::get('/store', [ProductController::class, 'index'])->name('store.index');;

Route::get('/events', [EventController::class, 'index'])->name('events.index');;

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');

Route::post('/order', [OrderController::class, 'store'])->name('order.submit');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
