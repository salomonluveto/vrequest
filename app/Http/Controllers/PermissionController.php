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
        Permission::create(['name'=>'enregistrer']);
        Permission::create(['name'=>'lire']);
        Permission::create(['name'=>'modifier']);
        Permission::create(['name'=>'supprimer']);
        Permission::create(['name'=>'lire_vehicule']);
        Permission::create(['name'=>'enregistrer_vehicule']);
        Permission::create(['name'=>'modifier_vehicule']);
        Permission::create(['name'=>'supprimer_vehicule']);
        Permission::create(['name'=>'lire_demande']);
        Permission::create(['name'=>'enregistrer_demande']);
        Permission::create(['name'=>'modifier_demande']);
        Permission::create(['name'=>'supprimer_demande']);
      
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
        $role->givePermissionTo($permission);
        return back()->with('status','Permission accordée');
    }
    public function desactiverPermission($permission, $roleId){
        
        $role = Role::find($roleId);
        $users = User::role($role->name)->get();
       
        foreach ($users as $user) {

            $user->revokePermissionTo($permission);
        }
        $role->revokePermissionTo($permission);
        return back()->with('status','Permission desactivée');
    }
}

