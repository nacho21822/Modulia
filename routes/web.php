<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/products', function () {
    return view('products');
})->name('products');

Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');

Route::get('/login', function () {
    return view('login');
})->name('login');