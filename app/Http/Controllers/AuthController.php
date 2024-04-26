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
        return view("auth.register");
    }
    public function store()
    {
        // validation

        $validated = request()->validate([
            'name' => 'required|min:3|max:40',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8'
        ]);

        $user = new User();
        $user::create(
            [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]
        );

        $user->email = $validated['email'];




        // Mail::to($user->email)->send(new WelcomeEmail($user));

        Mail::to($user->email)->send(new WelcomeEmail($user));





        return redirect()->route('dashboard')->with('success', "Your account is created successfully!!!");
    }


    // login

    public function login()
    {
        return view("auth.login");
    }
    public function authenticate()
    {
        // validation


        $validated = request()->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);


        if (auth()->attempt($validated)) {
            request()->session()->regenerate();
            return redirect()->route('dashboard')->with('success', "Logged in successfully");
        }

        return redirect()->route('login')->withErrors([
            'password' => "No matching user found with the provided email and password.",

        ]);
    }


    // logout


    public function logout()
    {
        auth()->logout();
        request()->session()->regenerateToken();

        return redirect()->route("dashboard")->with("success", "Logged out successfully");
    }
}
