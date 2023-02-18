<?php

use App\Modules\Dashboard\Http\Controllers\Backend\DashboardController;
use Illuminate\Support\Facades\Route;

Route::group(['module' => 'Dashboard','prefix' => 'admin', 'middleware' => ['web','auth'],], function() {

    Route::resource('/dashboard', DashboardController::class);
});
