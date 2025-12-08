<?php

namespace App\Http\Controllers;

use App\Models\Contenu;
use App\Models\Media;
use App\Models\TypeMedia;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    // Afficher la liste des médias
    public function index()
    {
        // Récupérer tous les médias (ou paginer si tu veux)
        $medias = Media::all();

        // Retourner la vue avec les médias
        return view('medias.index', compact('medias'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        // Récupérer les types de médias pour le select
        $typeMedias = TypeMedia::all();

        // Récupérer les contenus associés (optionnel)
        $contenus = Contenu::all();

        return view('medias.create', compact('typeMedias', 'contenus'));
    }

    // Enregistrer un nouveau média
    public function store(Request $request)
    {
        $request->validate([
            'media_file' => 'required|file|max:5120', // max 5Mo par ex.
            'type_media_id' => 'required|exists:type_medias,id',
            'contenu_id' => 'nullable|exists:contenus,id',
        ]);

        $file = $request->file('media_file');
        $filename = time().'_'.$file->getClientOriginalName();
        $filepath = $file->storeAs('uploads/media', $filename, 'public'); // stockage dans storage/app/public/uploads/media

        // Créer le media en base
        $media = new Media;
        $media->type_media_id = $request->type_media_id;
        $media->contenu_id = $request->contenu_id;
        $media->type = $file->getClientOriginalExtension();
        $media->taille = round($file->getSize() / 1024); // taille en Ko
        $media->chemin = 'storage/'.$filepath; // chemin accessible via public/storage/
        $media->save();

        return redirect()->route('media.index')->with('success', 'Média ajouté avec succès.');
    }

    // Afficher un média spécifique
    public function show(Media $media)
    {
        return view('medias.show', compact('media'));
    }
}
