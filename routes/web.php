<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;

Route::middleware(['blockIP'])->group(function () {
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('login', [AuthController::class, 'index'])->name('login');
});
Route::post('do-login', [AuthController::class, 'doLogin'])->name('login.do'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('do-registration', [AuthController::class, 'doRegistration'])->name('register.do'); 

Route::group(['middleware' => ['auth']], function() {
	Route::get('dashboard', [AuthController::class, 'dashboard']); 
	
	Route::group(['middleware' => ['permission:user-list']], function () { 
		Route::resource('users', UserController::class);
		Route::post('users-update', [UserController::class, 'update'])->name('users-update');
	});
	Route::group(['middleware' => ['permission:role-list']], function () { 
		Route::resource('roles', RoleController::class);
		Route::post('roles-update', [RoleController::class, 'updateRole'])->name('roles-update');
	});

	Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});