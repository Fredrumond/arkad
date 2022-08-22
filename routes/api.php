<?php

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('/actives/{type}', [App\Http\Controllers\ActivesController::class, 'index']);
});
