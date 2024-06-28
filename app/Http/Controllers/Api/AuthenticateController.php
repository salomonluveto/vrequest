<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Laravel\Sanctum\PersonalAccessToken;

class AuthenticateController extends Controller
{
    //
    public function login(Request $request){
        
        $data = [
            "username"=>$request->username,
            "password"=>$request->password
        ];
    
        
        $response = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->post('http://10.143.41.70:8000/promo2/odcapi/?method=login', $data);
        if($response->successful()){
            $data = $response->json();
           
            if(User::find($data['user']['id'])){
                $user = User::where('username',$request->username)->first();
                $token=$user->createToken($request->username)->plainTextToken;
                $user->token =$token ;
            
                return $user;
                
            }
            else{
                User::create([
                    'id'=>$data['user']['id'],
                    'first_name'=>$data['user']['first_name'],
                    'username' =>$data['user']['username'],
                    'last_name'=>$data['user']['last_name'],
                    'email' => $data['user']['email'],
                    'phone'=> $data['user']['phone'],
                    'password' => Hash::make($request->password),
                   
                ]);
                
                $user = User::where('username',$request->username)->first();
                $token=$user->createToken($request->username)->plainTextToken;
                $user->token =$token ;
            
                return $user;
    }
}
    }

public function getUser(Request $request){
    $token = $request->header('Authorization');
    $token = Str::replaceFirst('Bearer ', '', $token);

    $accessToken = PersonalAccessToken::findToken($token);
    if ($accessToken) {
      
        $user = $accessToken->tokenable;
        return response()->json($user);
    
    }
    
    else{
        return response()->json('Token invalide');
    }
 
   
   
    
}
}