<?php

namespace App\Http\Controllers;

use App\Models\TypeMedia;
use Illuminate\Http\Request;

class TypeMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $type_medias = TypeMedia::all();
        return view('type_medias.index', compact('type_medias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('type_medias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
        ]);

        TypeMedia::create([
            'nom' => $request->nom,
        ]);

        return redirect()->route('type_medias.index')->with('success', 'Type de média créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TypeMedia $type_media)
    {
        return view('type_medias.show', compact('type_media'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TypeMedia $type_media)
    {
        return view('type_medias.edit', compact('type_media'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TypeMedia $type_media)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
        ]);

        $type_media->update([
            'nom' => $request->nom,
        ]);

        return redirect()->route('type_medias.index')->with('success', 'Type de média mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeMedia $type_media)
    {
        $type_media->delete();

        return redirect()->route('type_medias.index')->with('success', 'Type de média supprimé avec succès.');
    }
}