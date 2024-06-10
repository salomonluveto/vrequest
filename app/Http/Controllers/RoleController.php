<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('role.index',compact('roles'));
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
        $role = Role::create(['name'=>$request->name]);
       
        return back()->with('status','Enregistrement reussi');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('role.detail');
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
        $role = Role::find($id);
        $role->name = $request->name;
        $role->save();
        return back()->with('status', 'Modification reussi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::find($id);
        $role->delete();
        return back()->with('status','Suppression reussie');
    }
    /*
      public function saveroles(){
        $agent = Role::create(['name'=>'agent']);
        $manager = Role::create(['name'=>'manager']);
        $charroi = Role::create(['name'=>'charroi']);
    }
    public function assign_roles(){
        
        $user = auth()->user();
    
        $assignRole =  $user->givePermissionTo('modifier');
         
    }
    */
}
