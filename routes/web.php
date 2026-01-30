<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContainerController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/products', [ContainerController::class, 'index'])->name('products.index');

Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');

Route::get('/login', function () {
    return view('login');
})->name('login');