<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DelegationController;

Route::resource('delegations',DelegationController::class);
// Route::middleware('authenticate')->group(function(){
    
// });
