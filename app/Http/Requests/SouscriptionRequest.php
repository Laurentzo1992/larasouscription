<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class SouscriptionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type_personne' => 'required|string',
            'nom' => 'required_if:type_personne,PP|string|max:255',
            'prenom' => 'required_if:type_personne,PP|string|max:255',
            'sexe' => 'required_if:type_personne,PP|string|in:M,F',
            'date_naissance' => 'nullable|date',
            'lieu_naisssance' => 'required_if:type_personne,PP|string|max:255',
            'profession' => 'nullable|string|max:255',
            'nationalite' => 'required_if:type_personne,PP|string|max:255',
            'type_piece' => 'required_if:type_personne,PP|string|in:CNIB,PASSEPORT',
            'reference_piece' => 'required_if:type_personne,PP|string|max:255',
            'date_delivrance' => 'required_if:type_personne,PP|date',
            'situation_matrimoniale' => 'required_if:type_personne,PP|string|in:celibataire,marie(e),divorce(e)',
            'photo' => 'nullable|file|mimes:jpeg,png,jpg|max:3072',
            'contact' => 'required|string|max:20',
            'contact2' => 'nullable|string|max:20',
            'residence' => 'required|string|max:255',
            'raison_social' => 'required_if:type_personne,PM|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => [
                'required',
                'string',
                'min:4',
                'max:255',
                Password::defaults(),
            ],
            'ref_attestation_prom' => 'required|string|max:255',
            'projet_a_souscrire' => 'required|exists:projets,id',
            'date_souscription' => 'required|date',
            'nbre_part_souscrit' => 'required|numeric|min:1',
            'montant_total' => 'required|numeric|min:1',
            'montant_verse' => 'required|numeric|min:0',
            'montant_restant' => 'required|numeric|min:0',
            'lieu_souscription' => 'required|string|max:255',
            'moyen_paiement' => 'required|string|in:orange,moov,wave,espece',
            'ref_paiement' => 'required|string|max:255',
            'mode_souscription' => 'required|string|max:255',
            'echeance' => 'required|date',
            'pj1' => 'required|file|mimes:pdf|max:3072',
            'pj2' => 'required|file|mimes:pdf|max:3072',
            'pj3' => 'required|file|mimes:pdf|max:3072',
            'observation' => 'nullable|string|max:255',
        ];
    }
}
