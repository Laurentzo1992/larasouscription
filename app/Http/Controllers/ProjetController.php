<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projet;

class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projet.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validation des données
    $validated = $request->validate([
        'libelle' => 'required|unique:projets|max:255',
        'amount' => 'required|numeric',
    ]);

    // Création du projet
    $projet = new Projet();
    $projet->libelle = $validated['libelle'];
    $projet->amount = $validated['amount'];
    $projet->save();

    // Redirection ou réponse
    return redirect()->route('auth.index')->with('success', 'Projet créé avec succès !');
}


    /**
     * Display the specified resource.
     */
    public function show()
    {
        $projets = Projet::all();
        return view('projet.show', compact('projets'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
