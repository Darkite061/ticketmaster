<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteProductoController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\EventController;

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


// Route::view('/catalogo','/catalogo.producto');
// Route::view('/detalle','/catalogo.detalle');

Route::get('/producto',[ClienteProductoController::class,'catalogo']);
Route::get('/detalle/{id}',[ClienteProductoController::class,'detalle']);
Route::get('/', [EventController::class, 'eventList'])->name('event.list');
Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
Route::post('order', [CartController::class, 'hacerPedido'])->name('cart.order');