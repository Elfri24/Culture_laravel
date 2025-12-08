<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Contenus validés par utilisateur
        $contenusValidesCount = \App\Models\Contenu::where('statut', 'valide')->count();

        return view('dashboard', compact('contenusValidesCount'));

        // Contenus en attente
        $contenusEnAttenteCount = \App\Models\Contenu::where('id_auteur', $user->id_utilisateur)
            ->where('statut', 'en attente')->count();

        // Nombre de langues parlées (via la table Parler jointe à la région/langue)
        // Simplification : on récupère le nombre de langues liées à ses régions
        $languesParleesCount = \DB::table('parler')
            ->join('region', 'parler.id_region', '=', 'region.id_region')
            ->join('langue', 'parler.id_langue', '=', 'langue.id_langue')
            ->whereIn('parler.id_region', function ($q) {
                // Par exemple, récupérer régions de l'utilisateur s'il y a une relation
                // Ici on simplifie, à adapter selon tes relations réelles
                return [];
            })
            ->distinct('parler.id_langue')
            ->count('parler.id_langue');

        // Derniers contenus de l'utilisateur (5 derniers)
        $dernierContenus = \App\Models\Contenu::where('id_auteur', $user->id_utilisateur)
            ->orderByDesc('date_creation')
            ->limit(5)
            ->get();

        // Derniers commentaires de l'utilisateur (5 derniers)
        $dernierCommentaires = \App\Models\Commentaire::where('id_utilisateur', $user->id_utilisateur)
            ->with('contenu')
            ->orderByDesc('date')
            ->limit(5)
            ->get();

        return view('dashboard', compact(
            'contenusValidesCount',
            'contenusEnAttenteCount',
            'languesParleesCount',
            'dernierContenus',
            'dernierCommentaires'
        ));
    }
}