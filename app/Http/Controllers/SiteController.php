<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function getCoordinates($nom)
    {
        $site = Site::where('nom', $nom)->first(); 
        if (!$site) {
            return response()->json(['erreur' => 'Lieu non trouvé'], 404);
        }
        return response()->json([
            'latitude' => $site->latitude,
            'longitude' => $site->longitude,
        ]);
    }
}
