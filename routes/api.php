<?php

use App\Http\Controllers\EnvironmentStockController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/environmentStock/{id?}', [EnvironmentStockController::class, 'elementStock'])->name('element.stock');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
