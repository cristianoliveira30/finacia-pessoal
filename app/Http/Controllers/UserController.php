<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

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

    public function updatePhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $user = auth()->user(); // Pega o usuário logado

        if ($request->hasFile('photo')) {
            // 1. Apaga a foto antiga se existir e for local
            if ($user->profile_photo_url && str_contains($user->profile_photo_url, '/storage/')) {
                $oldPath = str_replace('/storage/', '', $user->profile_photo_url);
                Storage::disk('public')->delete($oldPath);
            }

            // 2. Salva a nova foto
            $path = $request->file('photo')->store('profile-photos', 'public');

            // 3. Atualiza o banco
            $user->profile_photo_url = '/storage/' . $path;
            $user->save();
        }

        return back()->with('success', 'Foto de perfil atualizada!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
