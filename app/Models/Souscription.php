<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Souscription extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'souscriptions';

    protected $fillable = [
        'id_souscripteur',
        'numero_souscription',
        'projet_a_souscrire',
        'date_souscription',
        'nbre_part_souscrit',
        'montant_total',
        'montant_verse',
        'montant_restant',
        'lieu_souscription',
        'moyen_paiement',
        'ref_paiement',
        'mode_souscription',
        'echeance',
        'pj1',
        'pj2',
        'pj3',
        'observation'
    ];

    public function souscripteur()
    {
        return $this->belongsTo(Souscripteur::class, 'id_souscripteur');
    }

    public function projet()
    {
        return $this->belongsTo(Projet::class, 'projet_a_souscrire');
    }
}

