<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\UserInfo;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create()
    {
        if(Session::has('user')){
          

           return redirect()->route('dashboard');
        }
        
        return View('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request): RedirectResponse
    {
       

        
        $data = [
            "username"=>$request->username,
            "password"=>$request->password
        ];
    
        
        $response = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->post('http://10.143.41.70:8000/promo2/odcapi/?method=login', $data);
    
        if ($response->successful()) {
            $request->session()->regenerate();
        $responsefinal= $response->json();

            if(User::where('id',$responsefinal['user']['id'])->first()){
                
                Session::put('user',$request->username);
                $user = User::find($responsefinal['user']['id']);
                $email = $user->email;
                $manager = UserInfo::where('email_manager',$email)->first();
                if($manager != null){
                    Session::put('userIsManager',$manager);
                   
                }
                
              
                
                Session::put('authUser',$user);
                return redirect()->route('dashboard');
            }
            else{
             
                $id = $responsefinal['user']['id'];
                 Session::put('user',$request->username);
                 Session::put('manager',$request->username);
                return redirect()->route('register')->with('id',$id);
            }
        
       
        } 
        else {
            return redirect()->route('login');
        }

       
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request)
    {

        Session::forget('user');
        Session::forget('authUser');
        Session::forget('userIsManager');
        Auth::guard('web')->logout();

        return redirect()->route('login');
    }
}
