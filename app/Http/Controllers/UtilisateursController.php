<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use App\Models\Role;
use App\Models\Langue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UtilisateursController extends Controller
{
    public function index()
    {
        $utilisateurs = Utilisateur::with(['role', 'langue'])->get();
        return view('utilisateurs.index', compact('utilisateurs'));
    }

    public function create()
    {
        $roles = Role::all();
        $langues = Langue::all();
        return view('utilisateurs.create', compact('roles', 'langues'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:utilisateurs,email',
            'sexe' => 'required|in:M,F',
            'date_naissance' => 'nullable|date',
            'role_id' => 'required|exists:roles,id',
            'langue_id' => 'required|exists:langues,id',
            'mot_de_passe' => 'required|min:6',
        ]);

        Utilisateur::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'mot_de_passe' => Hash::make($request->mot_de_passe),
            'sexe' => $request->sexe,
            'date_inscription' => now(),
            'date_naissance' => $request->date_naissance,
            'statut' => $request->statut,
            'photo' => $request->photo,
            'role_id' => $request->role_id,
            'langue_id' => $request->langue_id,
        ]);

        return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur créé avec succès.');
    }

    public function show(Utilisateur $utilisateur)
    {
        return view('utilisateurs.show', compact('utilisateur'));
    }

    public function edit(Utilisateur $utilisateur)
    {
        $roles = Role::all();
        $langues = Langue::all();

        return view('utilisateurs.edit', compact('utilisateur', 'roles', 'langues'));
    }

    public function update(Request $request, Utilisateur $utilisateur)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:utilisateurs,email,' . $utilisateur->id,
            'sexe' => 'required|in:M,F',
            'date_naissance' => 'nullable|date',
            'role_id' => 'required|exists:roles,id',
            'langue_id' => 'required|exists:langues,id',
        ]);

        $utilisateur->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'sexe' => $request->sexe,
            'date_naissance' => $request->date_naissance,
            'statut' => $request->statut,
            'photo' => $request->photo,
            'role_id' => $request->role_id,
            'langue_id' => $request->langue_id,
        ]);

        return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur mis à jour.');
    }

    public function destroy(Utilisateur $utilisateur)
    {
        $utilisateur->delete();
        return redirect()->route('utilisateurs.index')->with('success', 'Utilisateur supprimé.');
    }
}