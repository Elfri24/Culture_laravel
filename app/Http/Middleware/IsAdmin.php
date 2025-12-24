<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Récupérer l'utilisateur via le guard configuré
        $utilisateur = Auth::guard('web')->user();
        
        // Si vous voulez créer un helper personnalisé
        // $utilisateur = auth()->guard('web')->utilisateur();
        
        if ($utilisateur && $utilisateur->role_id == 1) {
            // Vous pouvez aussi vérifier par le nom du rôle
            // if ($utilisateur->role && $utilisateur->role->nom_role === 'Administrateur')
            return $next($request);
        }
        
        return redirect('/dashboard')->with('error', 'Accès refusé. Vous devez être administrateur pour accéder à cette page.');
    }
}