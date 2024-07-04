<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Site;
use App\Models\User;
use App\Models\Demande;
use App\Models\UserInfo;
use App\Models\Vehicule;
use App\Models\Chauffeur;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ChefCharroiEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Notifications\ManagerNotification ;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ChefCharroiEmail as NotificationsChefCharroiEmail;


class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Session::get('authUser')->hasRole('charroi')){
            $demandes = Demande::where('is_validated',1)->get();
            $vehicules = Vehicule::all();
            $chauffeurs = Chauffeur::where('status',1)->get();
            return view('demandes.index', compact('demandes','chauffeurs','vehicules'));
        }
        $user_id = Session::get('authUser')->id;
        $demandes = Demande::Where('user_id',$user_id)->get();
       
      
        $vehicules = Vehicule::all();
        $chauffeurs = Chauffeur::where('status',1)->get();
        return view('demandes.index', compact('demandes','chauffeurs','vehicules'));

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
        $user_id = Session::get('authUser')->id;
      

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
            'user_id' => $user_id,



        ]);


        return redirect()->route('demandes.index');
    }
    
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $demandes=Demande::with('courses')->findOrFail($id);
        $courses = $demandes->courses;
        $vehicules = Vehicule::all();
        $chauffeurs = Chauffeur::all();
        return view("demandes.show",compact('demandes','courses','vehicules','chauffeurs'));
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


    public function submit(Request $request){
        return redirect()->route('demande.success');       
    }
    

    public function envoyerMailAuChefCharroi($id){
    public function envoyerMailAuChefCharroi($id){
        
        $chef_charroi = User::where('email', 'sdouble1@hibu.com')->first();
        // $chef_charroi['name'] = $chef_charroi['firstname'];
        // $chef_charroi['address'] = $chef_charroi['email'];

        //dd($chef_charroi);
        $demande=Demande::find($id);
        //dd($demande);
        $data =(object)[
            'id' => $demande->id ,
            'url' => 'demandes.show',
            'subject' => 'Nouvelle demande'
        ];
        try{
            //$chef_charroi->notify(new NotificationsChefCharroiEmail($data));
            
            //Notification::send($chef_charroi, new NotificationsChefCharroiEmail($data));
            // dd($chef_charroi);
            // print("Demande Envoye");
            
            $status = 1;
            $demande->is_validated = $status;
            $demande->update();

        }catch(Exception $e){
            $e->getMessage();
        }
          
        // return redirect()->route('demandes.index');
        return back()->with("success","demande validée avec succès");
    }

    public function demandeCollaborateurs(){
       ;
        $email_manager = Session::get('userIsManager')->email_manager;
        $collaborateurs = Session::get('userIsManager')::where('email_manager',$email_manager)->get();
        foreach($collaborateurs as $collaborateur){
            $id[] = $collaborateur->user_id;
        }
     
      $demandes = DB::table('demandes')
           ->whereIn('user_id', $id)
           ->get();
        
        $vehicules = Vehicule::all();
        $chauffeurs = Chauffeur::where('status',1)->get();
        return view('demandes.collaborateurs', compact('demandes','chauffeurs','vehicules'));
    }
       

}
