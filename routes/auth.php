<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthSessionController;
use App\Http\Controllers\Auth\RegisterUserController;

Route::group([
  'prefix'     => '/',
  'middleware' => 'guest',
], function () {

  Route::get('/', [AuthSessionController::class, 'create'])->name('login');
  Route::post('/', [AuthSessionController::class, 'store']);

  Route::get('register', [RegisterUserController::class, 'create'])->name('register');
  Route::post('register', [RegisterUserController::class, 'store']);
});


Route::post('logout', [AuthSessionController::class, 'destroy'])->middleware('auth')->name('logout');
