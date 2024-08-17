<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Projet;
use App\Models\User;
use App\Models\Souscripteur;
use App\Models\Souscription;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    /**
     * Display the index page.
     */

    public function index(): View
    {

       /* User::create([
            'name' => 'laurent',
            'email' => 'laurent@gmail.com',
            'password' => Hash::make('0000'),
        ]);

        $projets = [
            ['libelle' => 'Les confiseries', 'amount' => 200000000],
            ['libelle' => 'Les boissons', 'amount' => 100000000],
            ['libelle' => 'Les pâtisseries', 'amount' => 300000000],
            ['libelle' => 'Les viennoiseries', 'amount' => 500000000],
        ];

        foreach ($projets as $projet) {
            Projet::create($projet);
        } */

            /* $user = User::create([
                'name' => 'charlote',
                'email' => 'charlote@gmail.com',
                'password' => Hash::make('0000'),
            ]);

            // Test data for Souscripteur
            $souscripteur = Souscripteur::create([
                'user_id' => $user->id,
                'type_personne' => 'PP', // 'PP' for person, 'PM' for company
                'nom' => 'Doe',
                'prenom' => 'John',
                'sexe' => 'M',
                'date_naissance' => '1990-01-01',
                'lieu_naissance' => 'Paris',
                'profession' => 'Developer',
                'nationalite' => 'Française',
                'type_piece' => 'CNI',
                'reference_piece' => '123456789',
                'date_delivrance' => '2020-01-01',
                'situation_matrimoniale' => 'Célibataire',
                'photo' => 'photos/default.jpg', // You can set a default photo path for testing
                'contact' => '0123456789',
                'contact2' => '0987654321',
                'residence' => '123 Rue de Paris',
                'raison_sociale' => null, // Not needed for 'PP'
            ]);

            // Test data for Souscription
            Souscription::create([
                'souscripteur_id' => $souscripteur->id,
                'numero_souscription' => 'SUB123456',
                'projet_id' => 1, // Assuming project with ID 1 exists
                'date_souscription' => '2024-08-16',
                'nbre_part_souscrit' => 10,
                'montant_total' => 1000.00,
                'montant_verse' => 500.00,
                'montant_restant' => 500.00,
                'lieu_souscription' => 'Paris',
                'moyen_paiement' => 'Virement bancaire',
                'ref_paiement' => 'PAY123456',
                'mode_souscription' => 'En ligne',
                'echeance' => '2024-12-31',
                'pj1' => 'pieces/default_pj1.jpg',
                'pj2' => null,
                'pj3' => 'pieces/default_pj3.jpg',
            ]);
        */

        return view('auth.index');
    }


    /**
     * Display the login form.
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Handle the login request.
     */
    public function doLogin(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('souscription.show'));
        }
        return to_route('auth.login')->withErrors([
            'email' => 'Email invalid',
        ])->onlyInput('email');
    }


    /**
     * Handle the loout request.
     */
    public function logout(Request $request)
    {
    Auth::logout();

    //$request->session()->invalidate();

    //$request->session()->regenerateToken();

    return to_route('auth.index');
    }
}
