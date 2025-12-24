<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class AuthenticatedSessionController extends Controller
{
    /**
     * Affiche la page de connexion.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Gère la requête d'authentification.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();
        
        // Utiliser le bon nom pour votre configuration
        // Option 1: Via Auth::guard()
        $utilisateur = auth()->user();
        
        Log::info('Tes de l\'utilisateur recuperer '. $utilisateur->role_id);
        
        // Option 2: Via auth() helper (si configuré)
        // $utilisateur = auth()->utilisateur();
        
        if ($utilisateur && $utilisateur->role_id == 1) {
            // Redirection vers /layout pour les administrateurs
            return redirect()->intended('/layout');
        } else {
            // Redirection vers /dashboard pour les autres
            return redirect()->intended('/dashboard');
        }
    }

    /**
     * Détruit la session authentifiée.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}