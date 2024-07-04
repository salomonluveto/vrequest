<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Chauffeur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ChauffeurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $chauffeurs = Chauffeur::all();
        
        //$chauffeurs = Chauffeur::with('user')->get();
      
        
         return view("chauffeurs.index",compact('chauffeurs','users'));        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {       
    $existChauffeur = Chauffeur::where('user_id', $request->user_id)
                            ->first();

    if ($existChauffeur) {
        return back()->with('error', 'Ce chauffeur a déjà été enregistré.');
    }
    // Sinon, enregistrer le nouveau chauffeur
    $chauffeur = Chauffeur::create([
        'user_id' => $request->user_id,
       
    ]);

    return back()->with('success', 'Chauffeur enregistré avec succès.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Chauffeur $chauffeur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chauffeur $chauffeur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chauffeur $chauffeur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chauffeur $chauffeur)
    {
        $chauffeur->delete();
        return back()->with("success","suppression reussie");
    }
    public function chauffeurStatus($id){
        $chauffeur = Chauffeur::find($id);
       if($chauffeur->status == 1){
        $chauffeur->status = 0;
        $chauffeur->update();
        return back();
       }
      else if($chauffeur->status == 0){
        $chauffeur->status = 1;
        $chauffeur->update();
        return back();
       }
    }
}
