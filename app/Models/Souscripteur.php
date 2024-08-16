<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Souscription;

class Souscripteur extends Model
{


    //protected $table = 'souscripteurs';

    protected $fillable = [
        'user_id',
        'type_personne',
        'nom',
        'prenom',
        'sexe',
        'contact',
        'contact2',
        'raison_social',
        'date_naissance',
        'lieu_naissance',
        'type_piece',
        'reference_piece',
        'date_delivrance',
        'situation_matrimoniale',
        'residence',
        'nationalite',
        'profession',
        'photo',
    ];

    public function souscriptions()
    {
        return $this->hasMany(Souscription::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
