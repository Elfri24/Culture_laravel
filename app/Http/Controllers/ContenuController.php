<?php

namespace App\Http\Controllers;

use App\Models\Contenu;
use App\Models\Region;
use App\Models\Langue;
use App\Models\TypeContenu;
use App\Models\Utilisateur;
use Illuminate\Http\Request;

class ContenuController extends Controller
{
    public function index()
    {
        $contenus = Contenu::with(['region','langue','type','auteur'])->orderBy('id','desc')->paginate(15);
        return view('contenus.index', compact('contenus'));
    }

    public function create()
{
    $regions = Region::all();
    $langues = Langue::all();
    $types = TypeContenu::all();
    $auteurs = Utilisateur::all();
    $utilisateurs = Utilisateur::all();

    return view('contenus.create', compact('regions', 'langues', 'types', 'auteurs', 'utilisateurs'));
}

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'texte' => 'nullable|string',
            'date_creation' => 'nullable|date',
            'statut' => 'nullable|string',
            'parent_id' => 'nullable|exists:contenus,id',
            'date_validation' => 'nullable|date',
            'region_id' => 'required|exists:regions,id',
            'langue_id' => 'required|exists:langues,id',
            'moderateur_id' => 'nullable|exists:utilisateurs,id',
            'type_contenu_id' => 'required|exists:type_contenus,id',
            'auteur_id' => 'required|exists:utilisateurs,id',
        ]);

        Contenu::create($request->all());
        return redirect()->route('contenus.index')->with('success','Contenu créé.');
    }

    public function show(Contenu $contenu)
    {
        $contenu->load(['region','langue','type','auteur','medias','commentaires']);
        return view('contenus.show', compact('contenu'));
    }

    public function edit(Contenu $contenu)
    {
        $regions = Region::all();
        $langues = Langue::all();
        $types = TypeContenu::all();
        $auteurs = Utilisateur::all();
        return view('contenus.edit', compact('contenu','regions','langues','types','auteurs'));
    }

    public function update(Request $request, Contenu $contenu)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'texte' => 'nullable|string',
            'date_creation' => 'nullable|date',
            'statut' => 'nullable|string',
            'parent_id' => 'nullable|exists:contenus,id',
            'date_validation' => 'nullable|date',
            'region_id' => 'required|exists:regions,id',
            'langue_id' => 'required|exists:langues,id',
            'moderateur_id' => 'nullable|exists:utilisateurs,id',
            'type_contenu_id' => 'required|exists:type_contenus,id',
            'auteur_id' => 'required|exists:utilisateurs,id',
        ]);

        $contenu->update($request->all());
        return redirect()->route('contenus.index')->with('success','Contenu mis à jour.');
    }

    public function destroy(Contenu $contenu)
    {
        $contenu->delete();
        return redirect()->route('contenus.index')->with('success','Contenu supprimé.');
    }
}