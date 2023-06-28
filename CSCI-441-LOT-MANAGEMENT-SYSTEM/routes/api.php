<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource("sales", SalesController::class);
Route::apiResource("sales.cars", CarsController::class)
    ->scoped(['car' => 'sale']);

Route::apiResource("cars", CarsController::class);
Route::apiResource("cars.spaces", SpacesController::class)
    ->scoped(['space' => 'car']);

Route::apiResource("spaces", SpacesController::class);