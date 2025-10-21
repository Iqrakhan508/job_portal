<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // User ko email se find karo
        $user = User::where('user_email', $request->email)->first();

        // Password match karo
        if ($user && Hash::check($request->password, $user->user_password)) {
            // Laravel auth guard me login karwao
            Auth::login($user);
            // Session regenerate karo
            $request->session()->regenerate();
            // Dashboard ya intended page pe redirect
            return redirect()->intended('dashboard');
        }

        return back()->with('error', 'Invalid email or password');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logged out successfully');
    }
}
