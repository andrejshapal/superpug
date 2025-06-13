<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\User\LoginUserController;
use App\Http\Controllers\User\RegisterUserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/start', function () {
        return view('form');
    });

//    Route::get('activity', [ActivityController::class, 'create'])->name('activity');
//    Route::put('activity', [RegisterUserController::class, 'store']);
});

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterUserController::class, 'create'])->name('register');

    Route::post('register', [RegisterUserController::class, 'store']);

    Route::get('login', [LoginUserController::class, 'create'])->name('login');

    Route::post('login', [LoginUserController::class, 'store']);
});

Route::get('logout', [LoginUserController::class, 'destroy'])->name('logout');

Route::get('activity', [ActivityController::class, 'create'])->name('activity');
Route::put('activity', [ActivityController::class, 'store']);
