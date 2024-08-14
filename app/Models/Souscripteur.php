<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Souscripteur extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'type_personne',
        'nom',
        'prenom',
        'sexe',
        'contact',
        'contact2',
        'date_naissance',
        'lieu_naissance',
        'type_piece',
        'reference_piece',
        'date_delivrance',
        'situation_matrimoniale',
        'residence',
        'nationalite',
        'profession',
        'photo'
    ];

    public function souscriptions()
    {
        return $this->hasMany(Souscription::class);
    }
}
