<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
use App\Notifications\ChefCharroiEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    
        // $chef_charroi = User::findOrFail(1);

        // $data = (object) [
        //     'id' => 2,
        //     'url' => route('demandes.index'),
        //     'subject' => 'Nouvelle demande'
        // ];
    
        // try{
        //     $chef_charroi->notify(new ChefCharroiEmail($data));
        //     print('message envoyé');
        // }catch(Exception $e){
        //     //print($e);
        // }
      
        //return redirect()->route('demandes.index');  
        

    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('authenticate');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
   
});



require __DIR__.'/auth.php';
require __DIR__.'/demande_web.php';
require __DIR__.'/route_vccourse.php';
require __DIR__.'/role_permission.php';
require __DIR__.'/delegation_web.php';

