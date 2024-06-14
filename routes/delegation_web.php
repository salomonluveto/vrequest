<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DelegationController;

Route::middleware('auth')->group(function(){
    Route::resource('delegations',DelegationController::class);

});
