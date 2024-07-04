<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\UserInfoResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id, 
            'username' => $this->username, 
            'email' => $this->email, 
            'first_name' => $this->first_name, 
            'last_name' => $this->last_name, 
            'phone' => $this->phone, 
            'manager'=>[
                "id"=> 0,
                "email"=>"",
                "last_name"=>""
            ],
            'email_verified_at'=>$this->email_verified_at,
            'created_at' => $this->created_at, 
            'updated_at' => $this->updated_at,
            'token'=>$this->token
      ];
    }
}
