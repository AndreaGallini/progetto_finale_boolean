<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApartamentController;
use App\Http\Controllers\Api\ApiServiceController;
use App\Http\Controllers\Api\ApiCategoryController;
use App\Http\Controllers\Api\LeadController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('services', [ApiServiceController::class, 'index']);
Route::get('categories', [ApiCategoryController::class, 'index']);
Route::get('apartments', [ApartamentController::class, 'index']);
Route::get('apartments/{slug}', [ApartamentController::class, 'show']);
Route::post('/contacts', [LeadController::class, 'store']);
