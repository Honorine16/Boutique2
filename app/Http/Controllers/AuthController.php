<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showdashboard()
    {
        return view('dashboard');
    }

    public function showuserView()
    {
        return view('userView');
    }

    public function login(Request $request, User $user )
    {
        $credentials = $request->only('email', 'password');



        if (Auth::attempt($credentials)) {
            
            $user = Auth::user();

            if ($user->state == "Admin"){
                // return view('users.index');
                return redirect()->route('dashboard');
            }
        }
        return redirect()->route('userView');
        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
        // Auth::logout();
        // return redirect('welcome');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login');
    }
}
