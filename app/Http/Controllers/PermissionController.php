<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    //
    public function savepermissions(){
        $valider = Permission::create(['name'=>'enregistrer']);
        $lire = Permission::create(['name'=>'lire']);
        $supprimer = Permission::create(['name'=>'modifier']);
        $supprimer = Permission::create(['name'=>'supprimer']);
      
    }
    
    public function givepermissions(){
        $agent  = Role::find(1);
        $manager = Role::find(2);
        $charroi = Role::find(3);

        $agent->givePermissionTo('enregistrer');
        $agent->givePermissionTo('supprimer');
        $agent->givePermissionTo('lire');
        $agent->givePermissionTo('modifier');
       
        
        $manager->givePermissionTo('enregistrer');
        $manager->givePermissionTo('lire');
        $manager->givePermissionTo('modifier');
        $manager->givePermissionTo('supprimer');

        $charroi->givePermissionTo('enregistrer');
        $charroi->givePermissionTo('supprimer');
        $charroi->givePermissionTo('lire');
        $charroi->givePermissionTo('supprimer');

    }

    public function assignPermission($permission, $roleId){
        
        /*$user = auth()->user();
    
        $assignRole =  $user->assignRole('agent');
        */
        $role = Role::find($roleId);
        $users = User::role($role->name)->get();
        if(count($users)===0){
            
            return back()->with("status","Permission non accordée veuillez affecter un utilisateur à ce Role ");
        }
        foreach ($users as $user) {
            $user->givePermissionTo($permission);
        }
        return back()->with('status','Permission accordée');
    }
    public function desactiverPermission($permission, $roleId){
        
        $role = Role::find($roleId);
        $users = User::role($role->name)->get();
       
        foreach ($users as $user) {

            $user->revokePermissionTo($permission);
        }
        return back()->with('status','Permission desactivée');
    }
}

