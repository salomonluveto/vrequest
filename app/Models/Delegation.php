<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delegation extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','manager_id','date_debut','date_fin','motif'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
