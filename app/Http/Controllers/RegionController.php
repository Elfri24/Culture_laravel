<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function index()
    {
        // Tri croissant pour afficher les ID du plus petit au plus grand
        $regions = Region::orderBy('id', 'asc')->paginate(15);

        return view('regions.index', compact('regions'));
    }

    public function create()
    {
        return view('regions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_region' => 'required|string|max:200',
            'description' => 'nullable|string',
            'population' => 'nullable|integer',
            'superficie' => 'nullable|integer',
            'localisation' => 'nullable|string'
        ]);

        Region::create($request->only(
            'nom_region',
            'description',
            'population',
            'superficie',
            'localisation'
        ));

        return redirect()
            ->route('region.index')
            ->with('success', 'Région créée.');
    }

    public function show(Region $region)
    {
        return view('regions.show', compact('region'));
    }

    public function edit(Region $region)
    {
        return view('regions.edit', compact('region'));
    }

    public function update(Request $request, Region $region)
    {
        $request->validate([
            'nom_region' => 'required|string|max:200',
            'description' => 'nullable|string',
            'population' => 'nullable|integer',
            'superficie' => 'nullable|integer',
            'localisation' => 'nullable|string'
        ]);

        $region->update($request->only(
            'nom_region',
            'description',
            'population',
            'superficie',
            'localisation'
        ));

        return redirect()
            ->route('region.index')
            ->with('success', 'Région mise à jour.');
    }

    public function destroy(Region $region)
    {
        $region->delete();

        return redirect()
            ->route('region.index')
            ->with('success', 'Région supprimée.');
    }
}