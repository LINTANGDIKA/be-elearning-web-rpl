<?php

use App\Http\Controllers\DetailItemMaterialController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Models\DetailItemMaterial;
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

Route::post('register', RegisterController::class);
Route::post('login', LoginController::class);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('users', UserController::class)->except('store');
});

Route::apiResource('materials', MaterialController::class);

Route::get('materials/{material_id}/{item_material_id}', [DetailItemMaterialController::class, 'index']);
