<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }
    public function store()
    {
        $validated = request()->validate([
            'name' => 'required|min:3|max:40',
            'email' => 'email|required|unique:users,email',
            'password' => 'required|confirmed|min:8'

        ]);
        $user = User::create(
            [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]
        );


        Mail::to ($user->email)->send(new WelcomeEmail($user));

        return redirect()->route('dashboard')->with('success', 'Account created Successfully!');
    }


    //Login
    public function login()
    {
        return view('auth.login');
    }
    public function authenticate()
    {
        $validated = request()->validate([

            'email' => 'email|required',
            'password' => 'required|min:8'
        ]);
        if (auth()->attempt($validated)) {
            request()->session()->regenerate();
            return redirect()->route('dashboard')->with('success', 'Login Successfully!');
        }
        return redirect()->route('login')->withErrors([
            'email' => "Email Or Password Not Matching"
        ]);
    }
    //Logout
    public function logout()
    {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logged out Successfully!');
    }
}
