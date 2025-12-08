<?php

namespace App\Http\Controllers;

use App\Models\Langue;
use Illuminate\Http\Request;

class LangueController extends Controller
{
    public function index()
    {
        $langues = Langue::all();
        return view('langues.index', compact('langues'));
    }

    public function create()
    {
        return view('langues.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_langue' => 'required|string|max:255|unique:langues,nom_langue',
        ]);

        Langue::create([
            'nom_langue' => $request->nom_langue,
        ]);

        return redirect()->route('langues.index')->with('success', 'Langue créée avec succès.');
    }

    public function show(Langue $langue)
    {
        return view('langues.show', compact('langue'));
    }

    public function edit(Langue $langue)
    {
        return view('langues.edit', compact('langue'));
    }

    public function update(Request $request, Langue $langue)
    {
        $request->validate([
            'nom_langue' => 'required|string|max:255|unique:langues,nom_langue,' . $langue->id,
        ]);

        $langue->update([
            'nom_langue' => $request->nom_langue,
        ]);

        return redirect()->route('langues.index')->with('success', 'Langue mise à jour avec succès.');
    }

    public function destroy(Langue $langue)
    {
        $langue->delete();
        return redirect()->route('langues.index')->with('success', 'Langue supprimée avec succès.');
    }
}