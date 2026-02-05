<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContainerController;
use App\Http\Controllers\Admin\AdminContainerController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('mustAuth')->group(function () {
    Route::get('/products', [ContainerController::class, 'index'])
        ->name('products.index');

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
});

Route::middleware(['mustAuth', 'admin'])->group(function () {

    Route::resource('containers', AdminContainerController::class)
        ->except(['show', 'index']);

    Route::resource('categories', AdminCategoryController::class)
        ->except(['show', 'index']);
});

Route::middleware(['mustAuth', 'admin'])->group(function () {
    Route::resource('categories', AdminCategoryController::class)
        ->only(['create', 'store']);
});

Route::middleware(['mustAuth', 'admin'])->group(function () {
    Route::resource('containers', AdminContainerController::class)
        ->except(['index', 'show']);
});