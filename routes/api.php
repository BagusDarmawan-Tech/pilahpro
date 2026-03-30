<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\SecuritasController;
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

Route::get('/securitas', [SecuritasController::class,'index']);
Route::post('/securitas', [SecuritasController::class,'store']);
Route::patch('/securitas/{id}', [SecuritasController::class,'update']);
Route::delete('/securitas/{id}', [SecuritasController::class,'destroy']);

Route::get('/contacts', [ContactController::class, 'index']);
Route::get('/contact/{id}', [ContactController::class, 'show']);
Route::post('/contact', [ContactController::class, 'store']);
Route::patch('/contact/{id}', [ContactController::class, 'update']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
