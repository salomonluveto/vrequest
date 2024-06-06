<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    //
    public function saveroles(){
        $agent = Role::create(['name'=>'agent']);
        $manager = Role::create(['name'=>'manager']);
        $charroi = Role::create(['name'=>'charroi']);
    }
    public function assign_roles(){
        
        $user = auth()->user();
    
        $assignRole =  $user->givePermissionTo('modifier');
         
    }
}
