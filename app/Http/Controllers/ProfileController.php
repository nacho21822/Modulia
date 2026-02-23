<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display the authenticated user's profile page.
     */
    public function show()
    {
        // Get authenticated user from session
        $user = auth()->user();

        return view('users.profile', compact('user'));
    }
}