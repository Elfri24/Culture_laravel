<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

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
        if (auth()->utilisateur()->role->nom_role == 'Administrateur'){
                    // Redirection vers /layout après login réussi
                return redirect()->intended('/layout');
        }else{
                // Redirection vers /dashboard après login réussi
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