<?php

use App\Http\Controllers\SiteController;
use App\Http\Controllers\DemandeController;
use Illuminate\Support\Facades\Route;

Route::get('/site/{nom}', [SiteController::class, 'getCoordinates']);
Route::resource('/demandes', DemandeController::class);
Route::get('/envoyermailmanager',[DemandeController::class,'envoyerMailManager'])->name('envoyermailmanager');
Route::get('/envoyermailauchefcharroi',[DemandeController::class,'envoyerMailAuChefCharroi'])->name('envoyermailauchefcharroi');
