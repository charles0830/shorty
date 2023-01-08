<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UrlController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::apiResource('urls', UrlController::class);
