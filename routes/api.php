<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Api\AccessTokensController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//about route
// 
Route::group(['middleware' => ['XSS', 'lang', 'auth:sanctum']], function () {
    Route::apiResource('about', AboutController::class);
});

Route::Post('auth/token', [AccessTokensController::class, 'store']);
