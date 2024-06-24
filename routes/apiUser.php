<?php

use App\Http\Controllers\Api\AuthenticateController;


Route::post('/login',[AuthenticateController::class,'login']);
Route::get('/getUser',[AuthenticateController::class,'getUser']);