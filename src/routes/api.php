<?php

use Illuminate\Support\Facades\Route;

Route::get('/actives', [App\Http\Controllers\ActivesController::class, 'index']);
