<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AdminLoginController extends Controller
{
    public function login()
    {
        return view('auth.admin_login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email', 'max:255', 'exists:admins'],
            'password' => ['required', 'min:8'],
        ]);

        if (auth('admin')->attempt($credentials)) {
            return redirect('/dashboard');
        }

        throw ValidationException::withMessages(['password' => 'invalid password']);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function dashboard()
    {
        return view('dashboard.index');
    }

}
