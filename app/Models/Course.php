<?php

namespace App\Models;

use App\Models\Demande;
use App\Models\Vehicule;
use App\Models\Chauffeur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
    protected $fillable=[
        'id_chauffeur',
        'id_vehicule',
        'id_demande',
        'statut',
        'commentaires'
    ];
    public function chauffeur(){
        return $this->belongsTo(Chauffeur::class, 'id_chauffeur');
    }
    public function vehicule(){
        return $this->belongsTo(Vehicule::class, 'id_vehicule');
    }
    public function demande(){
        return $this->belongsTo(Demande::class, 'id_demande');
    }
}
