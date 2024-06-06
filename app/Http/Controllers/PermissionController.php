<?php

namespace App\Http\Controllers;

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

    public function assign_permissions(){
        
        $user = auth()->user();
    
        $assignPermision =  $user->givePermissionTo('modifier');
    }
}

