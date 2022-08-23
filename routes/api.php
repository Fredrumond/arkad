<?php

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::prefix('actives')->group(function () {
        Route::get('/funds/', [App\Http\Controllers\FundsController::class, 'index']);
        Route::get('/funds/{code}', [App\Http\Controllers\FundsController::class, 'show']);
    });
});
