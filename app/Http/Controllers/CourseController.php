<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Course;
use App\Models\Demande;
use App\Models\UserInfo;
use App\Models\Vehicule;
use App\Models\Chauffeur;
use Illuminate\Http\Request;
use App\Notifications\AgentNotification;
use App\Notifications\ManagerNotification;
use App\Notifications\ChauffeurNotification;
use App\Notifications\AgentNotificationDemandeAcceptee;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // avoir directement accès aux infos du chauffeur appartir de la course
        // $courses = Course::with(['vehicule', 'chauffeur', 'demande'])->get();
        // $vehicules = Vehicule::all();
        // $chauffeurs=Chauffeur::all();
        // $demandes=Demande::all();
        //  return view("courses.index",compact('courses','vehicules','chauffeurs','demandes'));
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

        $demande = Demande::findOrFail($request->demande_id);
        $demande->status = 1;
        $demande->update();
        
        $course = Course::create([
            'vehicule_id' => $request->vehicule_id,
            'chauffeur_id' => $request->chauffeur_id,
            'demande_id'=>$request->demande_id,
            'commentaire'=>$request->commentaire
        ]);

       
        $user_id=$demande->user_id;
        $agent= User::findOrFail($user_id);

        //dd($agent);
        $user_info=UserInfo::where('user_id',$user_id)->first();
        $email_manager=$user_info->email_manager;
        $manager=User::where('email',$email_manager)->first();
        

        $chauffeur_id = $course -> chauffeur_id;
        $chauffeur_info = Chauffeur::where('id', $chauffeur_id)->first();
        // dd( $chauffeur_info);
        $chauffeur_user_id = $chauffeur_info -> user_id;
        
        $chauffeur = User :: where('id',$chauffeur_user_id)->first();
        // dd($chauffeur);
        $data =(object)[
            'id' => $demande->id ,
            'subject' => 'Nouvelle demande',
            'manager_name' => $manager->username,
            'agent_name' => $agent -> username,
            'chauffeur' => $chauffeur -> username,
            'etat' => ' traitée'
        ];
        
        try{
            $agent -> notify(new AgentNotificationDemandeAcceptee($data));
            $manager -> notify(new ManagerNotification($data));  
            $chauffeur -> notify(new ChauffeurNotification($data)); 
        }
        catch(Exception $e){
            //print($e);
        }
          
    
        return back()->with('success', 'course enregistrée avec succès.');
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
