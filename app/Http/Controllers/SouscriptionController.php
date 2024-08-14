<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Souscripteur;
use App\Models\Souscription;
use App\Models\Projet;


class SouscriptionController extends Controller
{


    public function index(): View
    {
        return view('souscription.index');
    }


    public function connexion(): View
    {
        return view('souscription.connexion');
    }


    public function create()
    {
        $projets = Projet::all();
        return view('souscription.create', compact('projets'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // Validation des champs du Souscripteur
            'type_personne' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'sexe' => 'required|string|max:1',
            // Validation des champs de la Souscription
            'projet_a_souscrire' => 'required|exists:projets,id',
            'numero_souscription' => 'required|string|max:255',
            'date_souscription' => 'required|date',
            'nbre_part_souscrit' => 'required|integer',
        ]);

        // Création du Souscripteur
        $souscripteur = Souscripteur::create([
            'type_personne' => $validatedData['type_personne'],
            'nom' => $validatedData['nom'],
            'prenom' => $validatedData['prenom'],
            'sexe' => $validatedData['sexe'],
        // Autres champs du Souscripteur
        ]);



        // Création de la Souscription
        Souscription::create([
            'id_souscripteur' => $souscripteur->id,
            'projet_a_souscrire' => $validatedData['projet_a_souscrire'],
            'numero_souscription' => $validatedData['numero_souscription'],
            'date_souscription' => $validatedData['date_souscription'],
            'nbre_part_souscrit' => $validatedData['nbre_part_souscrit'],
            // Autres champs de la Souscription
        ]);

        return redirect()->route('souscription.index')->with('success', 'Souscription créée avec succès.');
    }
}
