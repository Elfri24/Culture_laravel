<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Contenu;
use App\Models\Utilisateur;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    public function index()
    {
        $commentaires = Commentaire::with(['utilisateur','contenu'])->orderBy('id','desc')->paginate(20);
        return view('commentaires.index', compact('commentaires'));
    }

    public function create()
    {
        $utilisateurs = Utilisateur::all();
        $contenus = Contenu::all();
        return view('commentaires.create', compact('utilisateurs','contenus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'texte' => 'required|string',
            'note' => 'nullable|integer|min:0|max:5',
            'date' => 'nullable|date',
            'utilisateur_id' => 'required|exists:utilisateurs,id',
            'contenu_id' => 'required|exists:contenus,id',
        ]);

        Commentaire::create($request->only('texte','note','date','utilisateur_id','contenu_id'));
        return redirect()->route('commentaires.index')->with('success','Commentaire ajouté.');
    }

    public function show(Commentaire $commentaire)
    {
        return view('commentaires.show', compact('commentaire'));
    }

    public function edit(Commentaire $commentaire)
    {
        $utilisateurs = Utilisateur::all();
        $contenus = Contenu::all();
        return view('commentaires.edit', compact('commentaire','utilisateurs','contenus'));
    }

    public function update(Request $request, Commentaire $commentaire)
    {
        $request->validate([
            'texte' => 'required|string',
            'note' => 'nullable|integer|min:0|max:5',
            'date' => 'nullable|date',
            'utilisateur_id' => 'required|exists:utilisateurs,id',
            'contenu_id' => 'required|exists:contenus,id',
        ]);

        $commentaire->update($request->only('texte','note','date','utilisateur_id','contenu_id'));
        return redirect()->route('commentaires.index')->with('success','Commentaire mis à jour.');
    }

    public function destroy(Commentaire $commentaire)
    {
        $commentaire->delete();
        return redirect()->route('commentaires.index')->with('success','Commentaire supprimé.');
    }
}