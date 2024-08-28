<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Souscripteur;
use App\Models\Souscription;
use App\Models\Projet;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;



class SouscriptionController extends Controller
{


    public function index(): View
    {
        return view('souscription.index');
    }



    public function create()
    {
        $projets = Projet::all();
        return view('souscription.create', compact('projets'));
    }


    public function store(Request $request)
    {
    $credentials = $request->validate([
        'type_personne' => 'nullable|string',
            'nom' => 'nullable|string|max:255',
            'prenom' => 'nullable|string|max:255',
            'sexe' => 'nullable|string|in:M,F',
            'date_naissance' => 'nullable|date',
            'lieu_naisssance' => 'nullable|string|max:255',
            'profession' => 'nullable|string|max:255',
            'nationalite' => 'nullable|string|max:255',
            'type_piece' => 'nullable|string|in:CNIB,PASSEPORT',
            'reference_piece' => 'nullable|string|max:255',
            'date_delivrance' => 'nullable|date',
            'situation_matrimoniale' => 'nullable|string|in:celibataire,marie(e),divorce(e)',
            'photo' => 'nullable|file|mimes:jpeg,png,jpg|max:3072',
            'contact' => 'nullable|string|max:20',
            'contact2' => 'nullable|string|max:20',
            'residence' => 'nullable|string|max:255',
            'raison_social' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255|unique:users,email',
            'password' => [
                'required',
                'string',
                'min:4',
                'max:255',
                Password::defaults(),
            ],
            'ref_attestation_prom' => 'nullable|string|max:255',
            'projet_id' => 'nullable|exists:projets,id',
            'date_souscription' => 'nullable|date',
            'nbre_part_souscrit' => 'nullable|numeric|min:1',
            'montant_total' => 'nullable|numeric|min:1',
            'montant_verse' => 'nullable|numeric|min:0',
            'montant_restant' => 'nullable|numeric|min:0',
            'lieu_souscription' => 'nullable|string|max:255',
            'moyen_paiement' => 'nullable|string|in:orange,moov,wave,espece',
            'ref_paiement' => 'nullable|string|max:255',
            'mode_souscription' => 'nullable|string|max:255',
            'echeance' => 'nullable|date',
            'pj1' => 'nullable|file|mimes:pdf|max:3072',
            'pj2' => 'nullable|file|mimes:pdf|max:3072',
            'pj3' => 'nullable|file|mimes:pdf|max:3072',
            'observation' => 'nullable|string|max:255',
    ]);

    // Déterminer le nom à utiliser en fonction du type de personne
    $name = $request->type_personne === 'PP'
                ? $credentials['nom'] . ' ' . $credentials['prenom']
                : $credentials['raison_social'];

    // Création de l'utilisateur
    $user = User::create([
        'name' => $name,
        'email' => $credentials['email'],
        'password' => Hash::make($credentials['password']),
    ]);

    // Traitement des fichiers uploadés
    $photoPath = $request->file('photo')->store('photos', 'public');
    $pj1Path = $request->file('pj1')->store('pieces', 'public');
    $pj2Path = $request->file('pj2') ? $request->file('pj2')->store('pieces', 'public') : null;
    $pj3Path = $request->file('pj3') ? $request->file('pj3')->store('pieces', 'public') : null;

    // Création du Souscripteur
    $souscripteur = Souscripteur::create([
        'user_id' => $user->id,
        'type_personne' => $credentials['type_personne'],
        'nom' => $credentials['nom'],
        'prenom' => $credentials['prenom'],
        'sexe' => $credentials['sexe'],
        'date_naissance' => $credentials['date_naissance'],
        'lieu_naisssance' => $credentials['lieu_naissance'],
        'profession' => $credentials['profession'],
        'nationalite' => $credentials['nationalite'],
        'type_piece' => $credentials['type_piece'],
        'reference_piece' => $credentials['reference_piece'],
        'date_delivrance' => $credentials['date_delivrance'],
        'situation_matrimoniale' => $credentials['situation_matrimoniale'],
        'photo' => $photoPath,
        'contact' => $credentials['contact'],
        'contact2' => $credentials['contact2'],
        'residence' => $credentials['residence'],
        'raison_social' => $credentials['raison_social'],
    ]);

    // Création de la Souscription
    Souscription::create([
        'souscripteur_id' => $souscripteur->id,
        'numero_souscription' => $credentials['ref_attestation_prom'],
        'projet_id' => $credentials['projet_id'],
        'date_souscription' => $credentials['date_souscription'],
        'nbre_part_souscrit' => $credentials['nbre_part_souscrit'],
        'montant_total' => $credentials['montant_total'],
        'montant_verse' => $credentials['montant_verse'],
        'montant_restant' => $credentials['montant_restant'],
        'lieu_souscription' => $credentials['lieu_souscription'],
        'moyen_paiement' => $credentials['moyen_paiement'],
        'ref_paiement' => $credentials['ref_paiement'],
        'mode_souscription' => $credentials['mode_souscription'],
        'echeance' => $credentials['echeance'],
        'observation' => $credentials['observation'],
        'pj1' => $pj1Path,
        'pj2' => $pj2Path,
        'pj3' => $pj3Path,
    ]);

    // Rediriger l'utilisateur après l'enregistrement
    return redirect()->route('souscription.index')->with('success', 'Souscription créée avec succès.');
    }



    public function show(): View
    {
        return view('souscription.show');
    }
}
