<?php

use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Http;
use App\Http\Resources\UserInfoResource;
use App\Http\Controllers\Api\AuthenticateController;


Route::post('/login',[AuthenticateController::class,'login']);
Route::get('/getuser',[AuthenticateController::class,'getUser']);

Route::get('/users', function () {
    return  UserResource::collection(User::all());
});
Route::get('/user_info/{id}', function ($id) {
    return new UserInfoResource(UserInfo::find($id));
});
Route::post('/getnameuser',[AuthenticateController::class,'getNameUser']);
Route::post('/savemanager',[AuthenticateController::class,'saveManager']);
