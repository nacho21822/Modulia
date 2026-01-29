<?php

use Illuminate\Support\Facades\Route;

// carga la vista "inicio"
Route::get('/', function () {
    return view('home');
});

// carga la vista "contacto"
Route::get('/contacto', function () {
    return view('contacto');
});
