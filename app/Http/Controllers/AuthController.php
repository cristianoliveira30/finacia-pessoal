<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        if (!Auth::attempt($request->only('username', 'password'))) {
            return redirect()->route('login')->withErrors(['username' => 'Credenciais inválidas.']);
        }

        $user = Auth::user();
        Auth::login($user);

        return redirect()->route('home');
    }
}
