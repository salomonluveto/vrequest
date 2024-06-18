<?php

namespace App\Http\Controllers;

use App\Models\Chauffeur;
use App\Models\User;
use Illuminate\Http\Request;

class ChauffeurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chauffeurs = Chauffeur::with('user')->get();
        // dd($chauffeurs);
        $users = User::all();
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
        // dd($request);
        $chauffeur= Chauffeur::create([
            'user_id'=>$request->user_id

        ]);  
            return back()->with('success', 'chauffeur enregistré avec succès.');
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
}
