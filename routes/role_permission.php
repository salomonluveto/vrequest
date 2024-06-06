<?php

use App\Http\Middleware\AgentRole;
use App\Http\Middleware\CheckRole;
use Spatie\Permission\Models\Role;

use App\Http\Controllers\RoleController;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\PermissionController;




Route::get('/testview', function(){
  return view('test');    
})->middleware('check:User');

Route::get('/test',function(){
  return('salut');
})->middleware(['role:agent','auth']);
    

Route::get('/saveroles', [RoleController::class,'saveroles']);
Route::get('/assign_roles', [RoleController::class,'assign_roles']);
Route::get('/savepermissions', [PermissionController::class,'savepermissions']);
Route::get('/givepermissions', [PermissionController::class,'givepermissions']);
Route::get('/assign_permissions', [PermissionController::class,'assign_permissions']);

require __DIR__.'/auth.php';