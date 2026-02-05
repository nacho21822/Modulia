<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
{
    // 1. PRIMERA BARRERA (Formato)
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ], [
        // Aquí personalizas los mensajes automáticos de Laravel
        'email.required' => 'Please enter your email.',
        'email.email' => 'The format is incorrect (missing @ or domain).', // <--- AQUÍ CAMBIAS ESE MENSAJE
        'password.required' => 'Please enter your password.'
    ]);

    // 2. SEGUNDA BARRERA (Base de datos / Contraseña real)
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        return redirect()->route('home')
            ->with('welcome', 'Welcome back! You are now logged in.');
    }

    // Si llega aquí, es que el formato estaba bien, pero la contraseña no.
    return back()->withErrors([
        'email' => 'Invalid email or password',
    ]);
}

    public function register(Request $request)
{
    // 1. Validar
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8',
        'password_confirmation' => 'required|same:password',
    ]);

    // 2. Crear Usuario
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'user', 
    ]);

    // 3. Auto-Login
    Auth::login($user);

    // Store success message in English
    session()->flash('success', 'Your account has been created successfully.');

    return view('login');
}
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
