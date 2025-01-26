<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\LoginController;
	Route::middleware(['throttle:login'])->group(function () {  
	Route::post('register', [LoginController::class, 'register']);
	Route::get('login', [LoginController::class, 'login']);
	Route::get('/profile', function (Request $request) {
		return $request->user();
	})->middleware('auth:api');
});