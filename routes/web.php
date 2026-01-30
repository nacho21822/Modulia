<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/contacto', function () {
    return view('contacto');
});

// Nuevas rutas necesarias
Route::get('/login', function () {
    return view('login');
});



use App\Http\Controllers\ContainerController;
Route::get('/products', [ContainerController::class, 'index'])
     ->name('products.index');