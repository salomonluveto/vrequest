<?php

use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\ChauffeurController;
use App\Http\Controllers\CourseController;


Route::middleware('authenticate')->group(function(){
    Route::resource("vehicules",VehiculeController::class)->middleware('check:Vehicule');
    Route::resource("chauffeurs",ChauffeurController::class)->middleware('check:Chauffeur');;
    Route::resource("courses",CourseController::class)->middleware('check:Course');;
    Route::get("vehicules-search",[VehiculeController::class, 'search'])->name('vehicules.search');
});

