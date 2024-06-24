<?php

use App\Http\Controllers\SiteController;
use App\Http\Controllers\DemandeController;
Route::get('/site/{nom}', [SiteController::class, 'getCoordinates']);
Route::resource('/demandes', DemandeController::class);