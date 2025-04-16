<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Login form ko‘rsatish
    public function loginForm()
    {
        return view('admin.login'); // resources/views/admin/login.blade.php
    }

    // Login qilish
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->is_admin) {
                return redirect()->route('admin.dashboard');
            } else {
                Auth::logout();
                return redirect()->route('admin.login.form')->withErrors([
                    'access' => 'Sizda admin panelga ruxsat yo‘q.',
                ]);
            }
        }

        return back()->withErrors([
            'email' => 'Login yoki parol noto‘g‘ri.',
        ])->withInput();
    }

    // Logout qilish
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login.form');
    }

    // Admin dashboard
    public function dashboard()
    {
        return view('admin.dashboard'); // resources/views/admin/dashboard.blade.php
    }
}