<?php

use App\Http\Controllers\UrlController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::view('/', 'welcome');
Route::get('u/{url}', [UrlController::class, 'show']);

Route::post('signup', [RegisterController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);

Route::middleware(['auth'])->group(function () {
    Route::post("logout", [LoginController::class, 'logout']);
});


Route::view('/{any}', 'welcome')->where('any', '.*'); // route for SPA | Always should be at the bottom