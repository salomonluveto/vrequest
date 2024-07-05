<?php

namespace App\Models;

use App\Models\Demande;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Site extends Model
{
    use HasFactory;
    protected $fillable = ['nom','longitude','latitude'];

    public function demandes(){
        return $this->hasMany(Demande::class,'site_id', 'id');
    }
}
