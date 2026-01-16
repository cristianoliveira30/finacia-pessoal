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
        $user = User::find($id);

        if (!$user) {
            return back()->with('error', 'User not found.');
        }

        // Validação dos dados
        // Primeiro filtramos apenas os valores não nulos na requisição
        $data = collect($request->all())
            ->filter(fn($value) => !is_null($value))
            ->all();

        $inputs = validator($data, User::updateRules($id));

        if ($inputs->fails()) {
            return back()->withErrors($inputs)->withInput();
        }

        // Atualiza os dados do usuário
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        $user->update($data);

        // Depois de atualizar os dados vamos verificar se há atualização de foto
        if ($request->hasFile('photo')) {
            // Apaga a foto antiga se existir
            if ($user->profile_photo_url && str_contains($user->profile_photo_url, '/storage/')) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $user->profile_photo_url));
            }

            // Salva a nova foto
            $path = $request->file('photo')->store('profile-photos', 'public');
            $user->profile_photo_url = config('app.url') . '/storage/' . $path;
            $user->save();
        }

        return back()->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
