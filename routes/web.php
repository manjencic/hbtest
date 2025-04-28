<?php

use App\Http\Controllers\ContractController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contract', [ContractController::class, 'index'])
    ->middleware('throttle:contract')
    ->name('contractIndex');
