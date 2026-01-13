<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File; // <--- Importante para deletar arquivos da pasta public
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();

        // 1. Validação
        $request->validate([
            'name'  => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'image', 'max:5120'], // 5MB
            'current_password' => ['nullable', 'required_with:password', 'current_password'],
            'password' => ['nullable', 'confirmed', 'min:8'],
        ]);

        // Atualiza dados básicos
        $user->name = $request->name;
        $user->email = $request->email;

        // 2. Lógica da Foto (Salvando em public/images)
        if ($request->hasFile('photo')) {
            // Caminho físico: projeto/public/images
            $destinationPath = public_path('images');

            // Cria a pasta se não existir
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            // Deleta a antiga da pasta public/images se existir
            if ($user->profile_photo_path && File::exists(public_path('images/' . $user->profile_photo_path))) {
                File::delete(public_path('images/' . $user->profile_photo_path));
            }

            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();

            // --- GERA O HASH (NOME + EMAIL) ---
            $filename = hash('sha256', $user->name . $user->email) . '.' . $extension;

            // Move para a pasta public e salva apenas o nome no banco
            $file->move($destinationPath, $filename);
            $user->profile_photo_path = $filename;
        }

        // 3. Alteração de Senha
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return back()->with('success', 'Perfil atualizado com sucesso!');
    }
}
