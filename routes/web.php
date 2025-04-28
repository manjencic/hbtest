<?php

use App\Http\Controllers\ContractController;
use App\Http\Controllers\Api\ContractController as ContractApiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contract', [ContractController::class, 'index'])->name('contractIndex');

Route::prefix('api')->group(function () {
    Route::get('/contract', [ContractApiController::class, 'index']);
    Route::post('/contract/update', [ContractApiController::class, 'update']);
});
