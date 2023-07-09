<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IncomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', [AuthController::class, 'register']);

Route::post('/incomes', [IncomeController::class, 'store']);
Route::get('/incomes', [IncomeController::class, 'index']);
Route::delete('/incomes/{id}', [IncomeController::class, 'destroy']);
Route::put('/incomes/{id}', [IncomeController::class, 'update']);

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
