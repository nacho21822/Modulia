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
        // 1. Validate form format
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ], [
            'email.required'    => 'Please enter your email.',
            'email.email'       => 'The format is incorrect (missing @ or domain).',
            'password.required' => 'Please enter your password.',
        ]);

        // 2. Check credentials against database
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('home')
                ->with('welcome', 'Welcome back! You are now logged in.');
        }

        // 3. If credentials are incorrect, return to login with error
        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ]);
    }

    public function register(Request $request)
    {
        // 1. Validate form data
        $request->validate([
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|email|unique:users',
            'password'              => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ]);

        // 2. Create user with encrypted password
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'user',
        ]);

        // 3. Auto-login
        Auth::login($user);

        // 4. Send email verification
        $user->sendEmailVerificationNotification();

        // 5. Redirect to verification notice page
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