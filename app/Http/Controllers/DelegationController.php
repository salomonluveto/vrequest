<?php

namespace App\Http\Controllers;
use App\Models\Delegation;
use Illuminate\Http\Request;

class DelegationController extends Controller
{
    public function index()
   {
    $delegations= Delegation::latest()->paginate(13);
    
    return view ('delegations.index',compact('delegations'));
   }
   public function create()
    {
        $delegations = Delegation::all();
        return view('delegations.create', compact('delegations'));
    }

    public function store(Request $request)
    {
       

        Delegation::create([
            'user_id'=>$request->user_id,
            'manager_id'=>$request->manager_id,
            'date_debut'=>$request->date_debut,
            'date_fin'=>$request->date_fin,
        ]);
        return redirect()->route("delegations.index");
    }
    
    public function show(Delegation $delegation)
    {
       
        return view('delegations.show', compact('delegation'));
    }
    
    public function edit(Delegation $delegation)
    {    
        $delegations = $delegation;
        return view('delegations.edit', compact('delegation'));
    }
    
    public function update(Request $request, Delegation $delegation)
    {
       
        $delegation->update([
            'user_id'=>$request->user_id,
            'date_debut'=>$request->date_debut,
            'date_fin'=>$request->date_fin,
        ]);
        return redirect()->route('delegations.index')->with('success', 'Modification réussie');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Delegation $delegation)
    {
        $delegation->delete();
        return back()->with('success', 'délégation supprimée');
    }
}


      
