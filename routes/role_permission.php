<?php

use App\Http\Middleware\AgentRole;
use App\Http\Middleware\CheckRole;
use Spatie\Permission\Models\Role;

use App\Http\Controllers\RoleController;

use App\Http\Controllers\UserController;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\PermissionController;



Route::get('/testview', function(){
  return view('test');    
})->middleware('check:User');

Route::get('/test',function(){
  return('salut');
})->middleware(['role:agent','auth']);

    
Route::get('/a',function(){
  $user = auth()->user();
    
  $assignRole =  $user->assignRole('manager');
});
Route::get('/saveroles', [RoleController::class,'saveroles']);
Route::post('/assignRoles/{role}/{user}', [RoleController::class,'assignRoles'])->name('assign_role');
Route::post('/desactiverRoles/{role}/{user}', [RoleController::class,'desactiverRoles'])->name('desactiver_role');
Route::post('/assignPermission/{name}/{role}', [PermissionController::class,'assignPermission'])->name('assign_permission');
Route::post('/desactiverPermission/{name}/{role}', [PermissionController::class,'desactiverPermission'])->name('desactiver_permission');
Route::resource('/roles',RoleController::class)->middleware(['role:admin','auth']);
Route::get('/savepermissions', [PermissionController::class,'savepermissions']);
Route::get('/givepermissions', [PermissionController::class,'givepermissions']);
Route::get('/assign_permissions', [PermissionController::class,'assign_permissions']);
Route::resource('/user_role',UserController::class);
require __DIR__.'/auth.php';