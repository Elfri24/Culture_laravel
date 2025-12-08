<?php

namespace App\Http\Controllers;

use FedaPay\FedaPay;
use FedaPay\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaiementController extends Controller
{
    public function __construct()
    {
        FedaPay::setApiKey(env('FEDAPAY_SECRET_KEY'));
        FedaPay::setEnvironment('sandbox');
    }

    public function showForm()
    {
        return view('paiement.form');
    }

    public function processPaiement(Request $request)
    {
        // Validation des données reçues
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'email' => 'required|email',
        ]);

        try {
            Log::info('Données de paiement reçues :', $request->all());

            // Conversion du montant (ex : 10 XOF => 1000 centimes)
            $amountInCfa = (int) $request->input('amount') * 100;
            $email = $request->input('email');

            Log::info("Création de la transaction avec amount={$amountInCfa} et email={$email}");

            $checkout = Transaction::create([
                'amount' => $amountInCfa,
                'currency' => ['iso' => 'XOF'],
                'callback_url' => route('paiement.success'),
                'description' => 'Paiement pour la commande',
                'customer' => [
                    'email' => $email,
                ],
                'metadata' => ['commande_id' => 123],
            ]);

            $token = $checkout ->generateToken();
            Log::info('Test de la transaction ' . $token);

            return redirect()->away($token->url);
        } catch (\Exception $e) {
            Log::error('Erreur création paiement : '.$e->getMessage());
            Log::error($e->getTraceAsString());

            return back()->withErrors(['error' => 'Erreur lors de la création du paiement : '.$e->getMessage()]);
        }
    }

    public function success(Request $request)
    {
        // Ici, tu peux valider la réponse de FedaPay si nécessaire
        // Par exemple, vérifier le token, le statut, etc.

        return view('paiement.success');
    }
}