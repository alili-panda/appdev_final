<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Display login page
 public function showLogin()
{
    return view('component.login');
}

public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials, $request->boolean('remember'))) {

        $request->session()->regenerate();

        $user = Auth::user();

        if ($user->role === 'admin') {
            return redirect('/admin/dashboard');
        }

        if ($user->role === 'social_worker') {
            return redirect('/social-worker/dashboard');
        }

        if ($user->role === 'client') {
            return redirect('/client/dashboard');
        }

        Auth::logout();

        return redirect('/login')
            ->withErrors([
                'email' => 'Your account has an invalid role.'
            ]);
    }

    return back()->withErrors([
        'email' => 'Incorrect email or password.'
    ])->onlyInput('email');
}
public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login');
}
}