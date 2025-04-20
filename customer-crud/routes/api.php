<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/customers', [CustomerController::class, 'getAll']);
Route::get('/customers/{customer}', [CustomerController::class, 'getById']);
Route::post('/customers', [CustomerController::class, 'create']);
Route::put('/customers/{customer}', [CustomerController::class, 'update']);
Route::delete('/customers/{customer}', [CustomerController::class, 'destroy']);
Route::patch('/customers/{customer}', [CustomerController::class, 'partialUpdate']);
