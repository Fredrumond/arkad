<?php

use Illuminate\Support\Facades\Route;

Route::get('/consult-actives', [App\Http\Controllers\StatusInvestController::class, 'index']);
