<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Langue;
use App\Models\Role;
use App\Models\Utilisateur;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        $roles = Role::all();
        $langues = Langue::all();

        return view('auth.register', compact('roles', 'langues'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:utilisateurs,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = Utilisateur::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'mot_de_passe' => Hash::make($request->password),
            'sexe' => $request->sexe,
            'role_id' => $request->role_id,
            'langue_id' => $request->langue_id,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('layout');
    }
}