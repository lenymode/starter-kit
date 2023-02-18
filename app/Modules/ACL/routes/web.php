<?php

use App\Modules\ACL\Http\Controllers\Backend\PermissionController;
use App\Modules\ACL\Http\Controllers\Backend\RoleController;
use Illuminate\Support\Facades\Route;


Route::group(['module' => 'ACL','prefix' => 'admin/acl', 'middleware' => ['auth']], function() {
    
    Route::get('roles/{id}/show',[RoleController::class,'show']);
    Route::get('roles/{id}/delete',[RoleController::class,'delete']);
    Route::resource('roles', RoleController::class);

    Route::get('permissions/{id}/show',[PermissionController::class,'show']);
    Route::get('permissions/{id}/delete',[PermissionController::class,'delete']);
    Route::resource('permissions', PermissionController::class);
});