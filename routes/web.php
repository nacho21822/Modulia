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


// Nuevas rutas necesarias
use App\Http\Controllers\AuthController;

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');




use App\Http\Controllers\ContainerController;
Route::get('/products', [ContainerController::class, 'index'])
     ->name('products.index');
>>>>>>> feature/login
