<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContainerController;
use App\Http\Controllers\Admin\AdminContainerController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\EmailVerificationController;

// --- RUTAS PÚBLICAS ---
Route::get('/', fn() => view('home'))->name('home');
Route::get('/contacto', fn() => view('contacto'))->name('contacto');
Route::get('/login', fn() => view('login'))->name('login');

// --- AUTENTICACIÓN ---
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// --- VERIFICACIÓN DE EMAIL ---
Route::middleware('auth')->group(function () {
    Route::get('/email/verify', [EmailVerificationController::class, 'notice'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])->middleware('signed')->name('verification.verify');
    Route::post('/email/verification-notification', [EmailVerificationController::class, 'resend'])->middleware('throttle:6,1')->name('verification.send');
});

// --- ÁREA PRIVADA (usuarios autenticados y con email verificado) ---
Route::middleware(['mustAuth', 'verified'])->group(function () {
    Route::get('/products', [ContainerController::class, 'index'])->name('products.index');

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
});

// --- ÁREA DE ADMINISTRACIÓN ---
// Un único grupo con ambos middlewares. Sin duplicados.
Route::middleware(['mustAuth', 'verified', 'admin'])->group(function () {
    Route::resource('categories', AdminCategoryController::class)
        ->only(['create', 'store']);

    Route::resource('containers', AdminContainerController::class)
        ->except(['index', 'show']);
});