<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AgentRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$role_param): Response
    {
        $getrole = [];
        $roles = auth()->user()->getRoleNames();
        
        foreach ($roles as $role) {
            $getrole[] = $role;
        }
        
        if(in_array($role_param,$getrole)){
            return $next($request);
        }
        abort('403');
       
    }
}
