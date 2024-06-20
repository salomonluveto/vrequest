<?php

use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\ChauffeurController;
use App\Http\Controllers\CourseController;

Route::resource("vehicules",VehiculeController::class);
Route::resource("chauffeurs",ChauffeurController::class);
Route::resource("courses",CourseController::class);
Route::get("vehicules-search",[VehiculeController::class, 'search'])->name('vehicules.search');
