<?php

namespace App\Http\Controllers;

use App\Mail\LoginNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function login(Request $req)
    {
        $req->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($req->only('email', 'password'))) {

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Email or Password is incorrect',
        ]);
    }

    public function register(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ], [
            'email.unique' => 'Email already registered',
        ]);

        User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password),
        ]);

        Auth::attempt($req->only('email', 'password'));

        return redirect('/');
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
