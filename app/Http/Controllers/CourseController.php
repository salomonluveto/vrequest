<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Vehicule;
use App\Models\Chauffeur;
use App\Models\Demande;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // avoir directement accès aux infos du chauffeur appartir de la course
        $courses = Course::with(['vehicule', 'chauffeur', 'demande'])->get();
        $vehicules = Vehicule::all();
        $chauffeurs=Chauffeur::all();
        $demandes=Demande::all();
         return view("courses.index",compact('courses','vehicules','chauffeurs','demandes'));
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
        $course = Course::create([
            'vehicule_id' => $request->vehicule_id,
            'chauffeur_id' => $request->chauffeur_id,
            'demande_id'=>$request->demande_id,
            'status'=>$request->status,
            'commentaire'=>$request->commentaire
        ]);
    
        return back()->with('success', 'course enregistré avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}
