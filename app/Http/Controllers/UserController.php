<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(User::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $inputs = $request->validate(User::rules((int) $id));
        $user = User::findOrFail($id);
        $user->update($inputs);
        return redirect()->back()->with('success', 'User updated successfully.');
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        // 1. Validação Condicional
        $request->validate([
            'name'  => ['required', 'string', 'max:255'],
            // Garante que o email é único, mas ignora o email do próprio usuário atual
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'image', 'max:2048'],

            // A senha só é validada SE o campo 'password' (nova senha) tiver algum valor
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        // 2. Upload da Foto
        if ($request->hasFile('photo')) {
            // Apaga a antiga se existir
            if ($user->profile_photo_url && str_contains($user->profile_photo_url, '/storage/')) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $user->profile_photo_url));
            }
            // Salva a nova
            $path = $request->file('photo')->store('profile-photos', 'public');
            $user->profile_photo_url = '/storage/' . $path;
        }

        // 3. Atualiza Dados Básicos
        $user->name = $request->name;
        $user->email = $request->email;

        // 4. Atualiza Senha (SÓ SE O USUÁRIO DIGITOU UMA NOVA)
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // 5. Salva no Banco
        $user->save();

        return back()->with('success', 'Perfil atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
