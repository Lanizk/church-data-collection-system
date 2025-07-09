<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CustomLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('logintest'); // custom Blade login
    }

    public function login(Request $request)
    {
       

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
    $request->session()->regenerate();

    $user = Auth::user();

    if ($user->role === 'admin') {
        return redirect()->intended('/admin/dashboard');
    } elseif ($user->role === 'accountant') {
        return redirect()->intended('/accountant/dashboard');
    } else {
        return redirect()->intended('/parish/dashboard');
    }}

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
