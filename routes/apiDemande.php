<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiDemandeController;
Route::apiResource('/demandes', ApiDemandeController::class);