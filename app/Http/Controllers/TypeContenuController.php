<?php

namespace App\Http\Controllers;

use App\Models\TypeContenu;
use Illuminate\Http\Request;

class TypeContenuController extends Controller
{
    public function index()
    {
        $types = TypeContenu::orderBy('id', 'desc')->paginate(15);

        return view('type_contenus.index', compact('types'));
    }

    public function create()
    {
        return view('type_contenus.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nom_contenu' => 'required|string|max:150']);
        TypeContenu::create($request->only('nom_contenu'));

        return redirect()->route('typeContenu.index')->with('success', 'Type de contenu créé.');
    }

    public function show(TypeContenu $typeContenu)
    {
        return view('type_contenus.show', compact('typeContenu'));
    }

    public function edit(TypeContenu $typeContenu)
    {
        return view('type_contenus.edit', compact('typeContenu'));
    }

    public function update(Request $request, TypeContenu $typeContenu)
    {
        $request->validate(['nom_contenu' => 'required|string|max:150']);
        $typeContenu->update($request->only('nom_contenu'));

        return redirect()->route('typeContenu.index')->with('success', 'Type de contenu mis à jour.');
    }

    public function destroy(TypeContenu $typeContenu)
    {
        $typeContenu->delete();

        return redirect()->route('typeContenu.index')->with('success', 'Type supprimé.');
    }
}
