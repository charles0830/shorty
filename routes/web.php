<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

Route::view('/', 'welcome');
Route::get('u/{url}', [UrlController::class, 'show'])->name("shortened");

Route::post('signup', [RegisterController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);

Route::middleware(['auth'])->group(function () {
    Route::post("logout", [LoginController::class, 'logout']);
});

Route::apiResource('urls', UrlController::class);


Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail']);
Route::post('reset-password', [ResetPasswordController::class, 'reset']);


Route::any('{any}', function () {
    return view('welcome');
})->where('any', '.*'); // route for SPA | Always should be at the bottom


Auth::routes();



// Mock route. Do not use it
// Route::delete('donottouch/{token}', function () {
//     return;
// })->name('password.reset');
