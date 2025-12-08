<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::orderBy('id', 'desc')->paginate(15);

        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    

    public function show(Role $role)
    {
        return view('roles.show', compact('role'));
    }

    public function edit(Role $role)
{
    return view('roles.edit', compact('role'));
}


    public function update(Request $request, Role $role)
{
    $request->validate([
        'nom_role' => 'required|string|max:255|unique:roles,nom_role,' . $role->id,
    ]);

    $role->update([
        'nom_role' => $request->nom_role,
    ]);

    return redirect()->route('roles.index')->with('success', 'Rôle mis à jour avec succès.');
}


    public function store(Request $request)
    {
        $request->validate([
            'nom_role' => 'required|string|max:255|unique:roles,nom_role',
        ]);

        Role::create([
            'nom_role' => $request->nom_role,
        ]);

        return redirect()->route('roles.index')->with('success', 'Rôle créé avec succès.');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Role supprimé.');
    }
}