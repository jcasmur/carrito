<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', [App\Http\Controllers\FrontController::class, 'index'])->name('welcome');;

//Rutas carrito
Route::post('/cart-add', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
Route::get('/cart-checkout', [App\Http\Controllers\CartController::class, 'cart'])->name('cart.checkout');
Route::post('/cart-clear', [App\Http\Controllers\CartController::class, 'clear'])->name('cart.clear');
Route::post('/cart-removeitem', [App\Http\Controllers\CartController::class, 'removeitem'])->name('cart.removeitem');

Route::post('/cart-sumar', [App\Http\Controllers\CartController::class, 'sumar'])->name('cart.sumar');
Route::post('/cart-restar', [App\Http\Controllers\CartController::class, 'restar'])->name('cart.restar');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



