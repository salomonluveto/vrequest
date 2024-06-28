<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CheckModelPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$model): Response
    {
      if(Session::has('user')){
            $session = Session::get('user');
            $user = User::where('username',$session)->first();
            
            $methode =  $request->getMethod();

            if($model === 'User'){
                if($methode==='GET'){

                    if ($user->can('lire', 'App\Models\\'.$model)) {
                        
                    return  $next($request);
                    }
                
                }

               else if($methode==='POST'){

                    if ($user->can('enregistrer', 'App\Models\\'.$model)) {
                            
                        return  $next($request);
                    }
                }

                else if($methode==='PUT'){

                    if ($user->can('modifier', 'App\Models\\'.$model)) {
                        
                        return  $next($request);
                    }
                }

                else if($methode==='DELETE'){

                    if ($user->can('supprimer', 'App\Models\\'.$model)) {
                        
                        return  $next($request);
                    }
                }
        
       }


       elseif($model === 'Vehicule'){

                if($methode==='GET'){

                    if ($user->can('lire_vehicule', 'App\Models\\'.$model)) {
                        
                    return  $next($request);
                    }
                
                }

                else if($methode==='POST'){

                    if ($user->can('enregistrer_vehicule', 'App\Models\\'.$model)) {
                            
                        return  $next($request);
                    }
                }

                else if($methode==='PUT'){

                    if ($user->can('modifier_vehicule', 'App\Models\\'.$model)) {
                        
                        return  $next($request);
                    }
                }

                else if($methode==='DELETE'){

                    if ($user->can('supprimer_vehicule', 'App\Models\\'.$model)) {
                        
                        return  $next($request);
                    }
                }
            
       }
       elseif($model === 'Demande'){


        if($methode==='GET'){

            if ($user->can('lire_demande', 'App\Models\\'.$model)) {
                
            return  $next($request);
            }
        
        }

        else if($methode==='POST'){

            if ($user->can('enregistrer_demande', 'App\Models\\'.$model)) {
                    
                return  $next($request);
            }
        }

        else if($methode==='PUT'){

            if ($user->can('modifier_demande', 'App\Models\\'.$model)) {
                
                return  $next($request);
            }
        }

        else if($methode==='DELETE'){

            if ($user->can('supprimer_demande', 'App\Models\\'.$model)) {
                
                return  $next($request);
            }
        }
    
}

elseif($model === 'Site'){


    if($methode==='GET'){

        if ($user->can('lire_site', 'App\Models\\'.$model)) {
            
        return  $next($request);
        }
    
    }

    else if($methode==='POST'){

        if ($user->can('enregistrer_site', 'App\Models\\'.$model)) {
                
            return  $next($request);
        }
    }

    else if($methode==='PUT'){

        if ($user->can('modifier_site', 'App\Models\\'.$model)) {
            
            return  $next($request);
        }
    }

    else if($methode==='DELETE'){

        if ($user->can('supprimer_site', 'App\Models\\'.$model)) {
            
            return  $next($request);
        }
    }

}

elseif($model === 'Chauffeur'){


    if($methode==='GET'){

        if ($user->can('lire_chauffeur', 'App\Models\\'.$model)) {
            
        return  $next($request);
        }
    
    }

    else if($methode==='POST'){

        if ($user->can('enregistrer_chauffeur', 'App\Models\\'.$model)) {
                
            return  $next($request);
        }
    }

    else if($methode==='PUT'){

        if ($user->can('modifier_chauffeur', 'App\Models\\'.$model)) {
            
            return  $next($request);
        }
    }

    else if($methode==='DELETE'){

        if ($user->can('supprimer_chauffeur', 'App\Models\\'.$model)) {
            
            return  $next($request);
        }
    }

}

elseif($model === 'Course'){


    if($methode==='GET'){

        if ($user->can('lire_course', 'App\Models\\'.$model)) {
            
        return  $next($request);
        }
    
    }

    else if($methode==='POST'){

        if ($user->can('enregistrer_course', 'App\Models\\'.$model)) {
                
            return  $next($request);
        }
    }

    else if($methode==='PUT'){

        if ($user->can('modifier_course', 'App\Models\\'.$model)) {
            
            return  $next($request);
        }
    }

    else if($methode==='DELETE'){

        if ($user->can('supprimer_course', 'App\Models\\'.$model)) {
            
            return  $next($request);
        }
    }

}

elseif($model === 'Delegation'){


    if($methode==='GET'){

        if ($user->can('lire_delegation', 'App\Models\\'.$model)) {
            
        return  $next($request);
        }
    
    }

    else if($methode==='POST'){

        if ($user->can('enregistrer_delegation', 'App\Models\\'.$model)) {
                
            return  $next($request);
        }
    }

    else if($methode==='PUT'){

        if ($user->can('modifier_delegation', 'App\Models\\'.$model)) {
            
            return  $next($request);
        }
    }

    else if($methode==='DELETE'){

        if ($user->can('supprimer_delegation', 'App\Models\\'.$model)) {
            
            return  $next($request);
        }
    }

}

      
       

       return abort(403, 'Vous n\'avez pas la permission d\'accéder à cette ressource.');
    }
    else{
        return redirect()->route('login');
    }
    }
        
}
