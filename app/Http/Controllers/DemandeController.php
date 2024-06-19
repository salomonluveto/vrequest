<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\Demande;
use Illuminate\Http\Request;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $demandes = Demande::all();
        return view('demandes.index', compact('demandes'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $sites = Site::all();
        return view ('demandes.create', compact('sites'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'motif'=>'required:demandes',
            'date'=>'required:demandes',
            'destination'=>'nullable',
            'nbre_passagers'=>'required:demandes',
            'lieu_depart'=>'nullable',
            'longitude_depart'=>'nullable',
            'latitude_depart'=>'nullable',
            'date_deplacement'=>'required'
            
        ]);

        $demandes = Demande::create([
            'motif'=>$request->motif,
            'date'=>$request->date,
            'destination'=>$request->destination,
            'nbre_passagers'=>$request->nbre_passagers,
            'lieu_depart'=>$request->lieu_depart,
            'longitude_depart'=>$request->longitude_depart,
            'latitude_depart'=>$request->latitude_depart,
            'date_deplacement'=>$request->date_deplacement,
            'user_id'=>$request->user_id

            
        ]);
        return redirect()->route('demandes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
    public function destroy(Demande $demande)
    {
        $demande->delete();
        return back()->with("success","suppression reussie");
    }

}
