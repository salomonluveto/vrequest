<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class AgentRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$role_param): Response
    {
        if(Session::has('user')){
            $getrole = [];
            $session = Session::get('user');
            $user = User::where('username',$session)->first();
           
            $roles = $user->getRoleNames();
         
            
            foreach ($roles as $role) {
                $getrole[] = $role;
            }
            
            if(in_array($role_param,$getrole)){
                return $next($request);
            }
            abort('403');
        }
    
       else{
        return redirect()->route('login');
       }
    }
}
