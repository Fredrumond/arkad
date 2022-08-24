<?php

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::prefix('actives')->group(function () {
        Route::get('/funds/', [App\Http\Controllers\FundsController::class, 'index']);
        Route::get('/funds/{code}', [App\Http\Controllers\FundsController::class, 'show']);
        Route::get('/actions/', [App\Http\Controllers\ActionsController::class, 'index']);
        Route::get('/actions/{code}', [App\Http\Controllers\ActionsController::class, 'show']);
    });
});
