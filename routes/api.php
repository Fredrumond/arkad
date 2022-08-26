<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');

});

Route::group(['prefix' => 'v1', 'middleware' => ['auth']], function(){
    Route::prefix('actives')->group(function () {
        Route::get('/funds/', [App\Http\Controllers\FundsController::class, 'index']);
        Route::get('/funds/{code}', [App\Http\Controllers\FundsController::class, 'show']);
        Route::get('/actions/', [App\Http\Controllers\ActionsController::class, 'index']);
        Route::get('/actions/{code}', [App\Http\Controllers\ActionsController::class, 'show']);
    });
});
