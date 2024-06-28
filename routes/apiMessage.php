<?php
use App\Http\Controllers\Api\ApiMessageController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/messages',ApiMessageController::class);//->middleware('auth:sanctum');
