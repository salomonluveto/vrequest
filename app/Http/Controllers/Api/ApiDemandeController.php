<?php

namespace App\Http\Controllers\Api;

use App\Models\Demande;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DemandeResource;

class ApiDemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(DemandeResource::collection($demandes = Demande::where('is_validated',1)->where('status',1)->orderByDesc('created_at')->get()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $request->validate([
            "date"=>"required|date_format:Y-m-d",
            "motif"=>"required|max:60|min:3",
            "date_deplacement"=>"required|date_format:Y-m-d H:i",
            "lieu_depart"=>"required|string",
            "destination"=>"required|string",
            "nbre_passagers"=>"required|integer",
            "longitude_depart"=>"required",
            "latitude_depart"=>"required",
            "longitude_destination"=>"required",
            "latitude_destination"=>"required"

        ]);
        $demande = Demande::create($request->all());
           
        return response()->json([
            'demande'=>$demande],200);

   
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
