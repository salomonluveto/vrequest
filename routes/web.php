<?php

use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Notifications\ChefCharroiEmail;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

// Route::get('/', function () {
    
//         // $chef_charroi = User::findOrFail(1);

//         // $data = (object) [
//         //     'id' => 2,
//         //     'url' => route('demandes.index'),
//         //     'subject' => 'Nouvelle demande'
//         // ];
    
//         // try{
//         //     $chef_charroi->notify(new ChefCharroiEmail($data));
//         //     print('message envoyé');
//         // }catch(Exception $e){
//         //     //print($e);
//         // }
      
//         //return redirect()->route('demandes.index');  
        

//     return view('dashboard');
// })->middleware('authenticate');
Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('authenticate');
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard')->middleware('authenticate');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard')->middleware('authenticate');

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

