<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
       $utilisateur = Auth::utilisateur();

if ($utilisateur && $utilisateur->role && $utilisateur->role->nom_role === 'Administrateur') {
    return $next($request);
}
return redirect('/dashboard')->with('error', 'Accès refusé. Vous devez être administrateur pour accéder à cette page.');
    }
}