<?php

use App\Modules\Home\Http\Controllers\Backend\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [HomeController::class, 'index']);
