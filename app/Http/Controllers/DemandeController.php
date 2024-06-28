<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\User;
use App\Models\Demande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

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
        return view('demandes.create', compact('sites'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'choix' => 'required|in:choix-liste,choix-carte',
            'motif' => 'required:demandes',
            'date' => 'required:demandes',
            'lieu_depart' => 'required_if:choix,choix-carte',
            'destination' => 'required_if:choix,choix-carte',
            'lieu_depart1' => 'required_if:choix,choix-liste',
            'destination1' => 'required_if:choix,choix-liste',
            'nbre_passagers' => 'required:demandes',
            'longitude_depart' => 'required_if:choix,choix-liste',
            'latitude_depart' => 'required_if:choix,choix-liste',
            'longitude_destination' => 'required_if:choix,choix-liste',
            'latitude_destination' => 'required_if:choix,choix-liste',
            'longitude_depart1' => 'required_if:choix,choix-carte',
            'latitude_depart1' => 'required_if:choix,choix-carte',
            'longitude_destination1' => 'required_if:choix,choix-carte',
            'latitude_destination1' => 'required_if:choix,choix-carte',
            'date_deplacement' => 'required'

        ]);

        $ticket = Str::random(8);

        $demandes = Demande::create([
            'ticket' => $ticket,
            'motif' => $request->motif,
            'date' => $request->date,
            'destination' => !empty($request->destination) ? $request->destination : $request->destination1,
            'nbre_passagers' => $request->nbre_passagers,
            'lieu_depart' => !empty($request->lieu_depart) ? $request->lieu_depart : $request->lieu_depart1,
            'longitude_depart' =>!empty ($request->longitude_depart) ? $request->longitude_depart : $request->longitude_depart1,
            'latitude_depart' =>!empty ($request->latitude_depart) ? $request->latitude_depart : $request->latitude_depart1,
            'longitude_destination' => !empty ($request->longitude_destination) ? $request->longitude_destination : $request->longitude_destination1,
            'latitude_destination' =>!empty ($request->latitude_destination) ? $request->latitude_destination : $request->latitude_destination1,
            'date_deplacement' => $request->date_deplacement,
            'user_id' => User::all()->random(1)->first()->id


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
    public function edit(Demande $demande)
    {
        $demandes = $demande;
        $sites = Site::all();
        return view('demandes.edit', compact('demandes', 'sites'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Demande $demande)
    {
        $demande->update([
            'motif' => $request->motif,
            'destination' => $request->destination,
            'nbre_passagers' => $request->nbre_passagers,
            'lieu_depart' => $request->lieu_depart,
            'date_deplacement' => $request->date_deplacement

        ]);

        return redirect()->route('demandes.index')->with('success', 'Votre demande a été mise à jour avec succès.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Demande $demande)
    {
        $demande->delete();
        return back()->with("success", "suppression reussie");
    }



}
