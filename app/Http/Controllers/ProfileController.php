<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Muestra la página de perfil del usuario autenticado.
     */
    public function show()
    {
        // auth()->user() devuelve el objeto User de la sesión actual
        $user = auth()->user();

        return view('users.profile', compact('user'));
    }
}