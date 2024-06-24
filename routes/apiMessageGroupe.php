<?php
use App\Http\Controllers\Api\ApiMessageGroupeController;
use Illuminate\Support\Facades\Route;
Route::apiResource('/message_groupes',ApiMessageGroupeController::class);
