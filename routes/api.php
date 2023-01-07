<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UrlController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::resource('urls', UrlController::class);
