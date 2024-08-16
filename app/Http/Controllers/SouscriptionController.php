<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Souscripteur;
use App\Models\Souscription;
use App\Models\Projet;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\SouscriptionRequest;


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


    public function store(SouscriptionRequest $request)

    {

    $credentials = $request->validated();

    // Déterminer le nom à utiliser en fonction du type de personne
    $name = $request->type_personne === 'PP'
                ? $request->nom . ' ' . $request->prenom
                : $request->raison_sociale;

    // Création de l'utilisateur
    $user = User::create([
        'name' => $name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);


    // Traitement des fichiers uploadés
    $photoPath = $request->file('photo')->store('photos', 'public');
    $pj1Path = $request->file('pj1')->store('pieces', 'public');
    $pj2Path = $request->file('pj2') ? $request->file('pj2')->store('pieces', 'public') : null;
    $pj3Path = $request->file('pj3')->store('pieces', 'public');

    // Création du Souscripteur
    $souscripteur = Souscripteur::create([
        'user_id' => $user->id,
        'type_personne' => $request->type_personne,
        'nom' => $request->nom,
        'prenom' => $request->prenom,
        'sexe' => $request->sexe,
        'date_naissance' => $request->date_naissance,
        'lieu_naisssance' => $request->lieu_naisssance,
        'profession' => $request->profession,
        'nationalite' => $request->nationalite,
        'type_piece' => $request->type_piece,
        'reference_piece' => $request->reference_piece,
        'date_delivrance' => $request->date_delivrance,
        'situation_matrimoniale' => $request->situation_matrimoniale,
        'photo' => $photoPath,
        'contact' => $request->contact,
        'contact2' => $request->contact2,
        'residence' => $request->residence,
        'raison_social' => $request->raison_social,
    ]);


    // Création de la Souscription
    Souscription::create([
        'souscripteur_id' => $souscripteur->id,
        'numero_souscription' => $request->ref_attestation_prom,
        'projet_id' => $request->projet_a_souscrire,
        'date_souscription' => $request->date_souscription,
        'nbre_part_souscrit' => $request->nbre_part_souscrit,
        'montant_total' => $request->montant_total,
        'montant_verse' => $request->montant_verse,
        'montant_restant' => $request->montant_restant,
        'lieu_souscription' => $request->lieu_souscription,
        'moyen_paiement' => $request->moyen_paiement,
        'ref_paiement' => $request->ref_paiement,
        'mode_souscription' => $request->mode_souscription,
        'echeance' => $request->echeance,
        'pj1' => $pj1Path,
        'pj2' => $pj2Path,
        'pj3' => $pj3Path,
    ]);

    // Rediriger l'utilisateur après l'enregistrement
    return to_route('souscription.index')->with('success', 'Souscription créée avec succès.');
    }


    public function show(): View
    {
        return view('souscription.show');
    }
}
