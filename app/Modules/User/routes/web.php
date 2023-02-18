<?php

use App\Modules\User\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['module' => 'User','prefix' => 'admin', 'middleware' => ['web','auth']], function() {

    Route::get('users/{id}/show',[UserController::class,'show']);
    Route::get('users/{id}/delete',[UserController::class,'delete']);
    Route::resource('users', UserController::class, ['names' => [
        'index'     => 'users.index',
        'create'    => 'users.create',
        'edit'      => 'users.edit',
        'store'     => 'users.store',
        'update'    => 'users.update',
    ]]);

});