<?php

use App\Http\Controllers\VehiculeController;
Route::resource("vehicules",VehiculeController::class);
Route::get("vehicules-search",[VehiculeController::class, 'search'])->name('vehicules.search');
