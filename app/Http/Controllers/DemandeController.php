<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Site;
use App\Models\User;
use App\Models\Demande;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use App\Mail\ChefCharroiEmail;
use Illuminate\Support\Facades\Mail;
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
        $validateData = $request->validate([
             'choix'=>'required|in:choix-liste,choix-carte',
             'motif'=>'required:demandes',
            'date'=>'required:demandes',
            'lieu_depart'=>'required_if:choix,choix-carte',
            'destination'=>'required_if:choix,choix-carte',
            'lieu_depart1'=>'required_if:choix,choix-liste',
            'destination1'=>'required_if:choix,choix-liste',
             'nbre_passagers'=>'required:demandes',
            'longitude_depart'=>'nullable',
           'latitude_depart'=>'nullable',
            'date_deplacement'=>'required'
            
         ]);
         
        $demandes = Demande::create([
            'motif'=>$request->motif,
            'date'=>$request->date,
            'destination'=>!empty($request->destination) ? $request->destination : $request->destination1,
            'nbre_passagers'=>$request->nbre_passagers,
            'lieu_depart'=> !empty($request->lieu_depart) ? $request->lieu_depart : $request->lieu_depart1  ,
            'longitude_depart'=>$request->longitude_depart,
            'latitude_depart'=>$request->latitude_depart,
            'date_deplacement'=>$request->date_deplacement,
            'user_id'=>$request->user_id
        ]);

        
       
        // return redirect()->route('demandes.index');  
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
        return view('demandes.edit', compact('demandes','sites'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Demande $demande)
    {
        $demande->update([
            'motif'=>$request->motif,
            'destination'=>$request->destination,
            'nbre_passagers'=>$request->nbre_passagers,
            'lieu_depart'=>$request->lieu_depart,
            'date_deplacement'=>$request->date_deplacement

        ]);
       
       return redirect()->route('demandes.index')->with('success', 'Votre demande a été mise à jour avec succès.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Demande $demande)
    {
        $demande->delete();
        return back()->with("success","suppression reussie");
    }

    public function submit(Request $request){
        return redirect()->route('demande.success');       
    }
    public function envoyerMailManager(Demande $demandes){

        //Trouver le manager à partir de  la demande de l'agent

        $user=User::findOrFail($demandes->user_id);
        $user_info=UserInfo::where('user_id',$user->id)->get();
        $email_manager=$user_info->email_manager;
        $manager=User::where('email', $email_manager)->get();

        dd($manager);
        
        $data = (object) [
                'id' => $demandes->id,
                'url' => 'demandes.index',
                'subject' => 'Nouvelle demande'
            ];
    
            try{
                Notification::send($manager, new ManagerNotification($data));
                print('Message Envoyé');
            }catch(Exception $e){
                print($e);
            }
          
        return redirect()->route('demande.index')->with('success', 'Votre demande a été créée avec succès!');
        
        
    }

    public function envoyerMailAuChefCharroi(Demande $demandes){
        
        $chef_charroi = User::where('email', 'oliviapala16@gmail.com')->get();
        //dd($chef_charroi);
        
        $data = (object) [
            'id' => 1,
            'url' => 'demandes.index',
            'subject' => 'Nouvelle demande'
        ];
    
        try{
            //$chef_charroi->notify(new NotificationsChefCharroiEmail($data));
            Notification::send($chef_charroi, new NotificationsChefCharroiEmail($data));
            //print("Demande Envoye");
        }catch(Exception $e){
            //print($e);
        }
        
        // return redirect()->route('demandes.index');
        return back()->with("success","demande validée avec succès");
    }
    
    
}
