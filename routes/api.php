<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UrlController;

Route::apiResource('urls', UrlController::class);
