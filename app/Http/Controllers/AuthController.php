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
        // 1. Validar formato del formulario
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ], [
            'email.required'    => 'Please enter your email.',
            'email.email'       => 'The format is incorrect (missing @ or domain).',
            'password.required' => 'Please enter your password.',
        ]);

        // 2. Comprobar credenciales contra la base de datos
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('home')
                ->with('welcome', 'Welcome back! You are now logged in.');
        }

        // 3. Si las credenciales son incorrectas, volver al login con error
        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ]);
    }

    public function register(Request $request)
    {
        // 1. Validar los datos del formulario
        $request->validate([
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|email|unique:users',
            'password'              => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ]);

        // 2. Crear el usuario con contraseña encriptada
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'user',
        ]);

        // 3. Iniciar sesión automáticamente
        Auth::login($user);

        // 4. Enviar email de verificación
        $user->sendEmailVerificationNotification();

        // 5. Redirigir a página de aviso de verificación
        return redirect()->route('verification.notice')
            ->with('success', 'Your account has been created! Please verify your email.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}