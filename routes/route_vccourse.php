<?php

use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\ChauffeurController;

Route::resource("vehicules",VehiculeController::class);
Route::resource("chauffeurs",ChauffeurController::class);
Route::get("vehicules-search",[VehiculeController::class, 'search'])->name('vehicules.search');
