<?php

namespace App\Http\Resources;

use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Resources\Json\JsonResource;

class UserManagerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $user_info = UserInfo::where('user_id',$this->id)->get();
        foreach($user_info as $info){
            $email = $info['email_manager'];
        }
        $response = Http::get('http://10.143.41.70:8000/promo2/odcapi/?method=getUsers');
        $users = $response->json();
        $manager = collect($users['users'])->firstWhere('email', $email);

        
        return [
            'id' => $this->id, 
            'username' => $this->username, 
            'email' => $this->email, 
            'first_name' => $this->first_name, 
            'last_name' => $this->last_name, 
            'phone' => $this->phone, 
            'manager'=>[
                "id"=> $manager['id'],
                "email"=>$email,
                "last_name"=>$manager['last_name']
              
            ],
            'email_verified_at'=>$this->email_verified_at,
            'created_at' => $this->created_at, 
            'updated_at' => $this->updated_at,
            'token'=>$this->token
           
      ];
    }
}
