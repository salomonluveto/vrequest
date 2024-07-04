<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DelegationController;

Route::middleware('authenticate')->group(function(){
    Route::resource('delegations',DelegationController::class);
});
