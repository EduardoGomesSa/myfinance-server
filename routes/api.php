<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\IncomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);

Route::post('/incomes', [IncomeController::class, 'store']);
Route::get('/incomes', [IncomeController::class, 'index']);
Route::delete('/incomes/{id}', [IncomeController::class, 'destroy']);
Route::put('/incomes/{id}', [IncomeController::class, 'update']);

Route::get('/bills', [BillController::class, 'index']);
Route::post('/bills', [BillController::class, 'store']);

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
