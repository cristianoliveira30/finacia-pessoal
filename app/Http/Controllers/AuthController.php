<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $request->validate([
                'username' => 'required',
                'password' => 'required',
            ]);

            $user = User::where('username', $request->username)->first();

            if (!$user || !Hash::check($request->password, $user->password)) {
                throw new \Exception('Credenciais inválidas.');
            }

            // API externa → JSON
            if ($request->expectsJson()) {
                $token = $user->createToken('auth_token')->plainTextToken;

                return response()->json([
                    'access_token' => $token,
                    'token_type' => 'Bearer'
                ]);
            }

            Auth::login($user);

            return redirect()->route('home')->with('success', 'Login bem-sucedido!');
        } catch (\Exception $e) {

            if ($request->expectsJson()) {
                return response()->json([
                    'error' => 'Erro ao processar a requisição.',
                    'message' => $e->getMessage()
                ], 500);
            }

            return redirect()->back()
                ->withErrors(['error' => $e->getMessage()])
                ->withInput();
        }
    }
}
