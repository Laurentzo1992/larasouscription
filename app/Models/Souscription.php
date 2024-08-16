<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Souscripteur;
use App\Models\Projet;

class Souscription extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'souscriptions';

    protected $fillable = [
        'souscripteur_id',
        'numero_souscription',
        'projet_id',
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
        return $this->belongsTo(Souscripteur::class);
    }

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }
}
