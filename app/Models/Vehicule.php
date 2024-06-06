<?php

namespace App\Models;

use App\Models\Vehicule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehicule extends Model
{
    use HasFactory;
    protected $fillable=['plaque','marque','capacite'];

}
