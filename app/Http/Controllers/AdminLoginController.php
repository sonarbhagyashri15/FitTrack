<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminLoginController extends Controller
{
    // Admin Login Page
    public function showLogin()
    {
        return view('admin.login');
    }

    // Admin Login Process
    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Only ADMIN login allowed
    if (Auth::attempt([
        'email' => $request->email,
        'password' => $request->password,
        'role' => 'admin'
    ])) {
        $request->session()->regenerate();
        return redirect()->route('admin.dashboard');
    }
    return back()->withErrors([
        'email' => 'Invalid admin credentials.',
    ]);
}
    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}