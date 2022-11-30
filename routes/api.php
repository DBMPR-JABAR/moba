<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PerangkatDaerahController;
use App\Http\Controllers\API\VillagesController;
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

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::get('perangkat-daerah', [PerangkatDaerahController::class, 'index']);
Route::get('villages', [VillagesController::class, 'index']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('profile', [AuthController::class, 'profile']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
