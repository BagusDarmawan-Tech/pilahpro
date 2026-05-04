<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DetailSaleProduct;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\PurchaseTripController;
use App\Http\Controllers\SaleProductController;
use App\Http\Controllers\SecuritasController;
use App\Http\Controllers\TradingController;
use App\Http\Controllers\TradingDetailController;
use App\Http\Controllers\TypeProductController;
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

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/securitas', [SecuritasController::class,'index'])->middleware(['auth:sanctum']);
    Route::post('/securitas', [SecuritasController::class,'store']);
    Route::patch('/securitas/{id}', [SecuritasController::class,'update']);
    Route::delete('/securitas/{id}', [SecuritasController::class,'destroy']);

    Route::get('/contacts', [ContactController::class, 'index']);
    Route::get('/contact/{id}', [ContactController::class, 'show']);
    Route::post('/contact', [ContactController::class, 'store']);
    Route::patch('/contact/{id}', [ContactController::class, 'update']);
    Route::delete('/contact/{id}', [ContactController::class, 'destroy']);

    Route::get('/purchase_orders', [PurchaseOrderController::class, 'index']);
    Route::post('/purchase_order', [PurchaseOrderController::class, 'store']);
    Route::get('/purchase_order/{id}', [PurchaseOrderController::class, 'show']);
    Route::patch('/purchase_order/{id}', [PurchaseOrderController::class, 'update']);
    Route::delete('/purchase_order/{id}', [PurchaseOrderController::class, 'destroy']);

    Route::get('/purchase_trips', [PurchaseTripController::class, 'index']);
    Route::get('/purchase_trip/{id}', [PurchaseTripController::class, 'show']);
    Route::post('/purchase_trip', [PurchaseTripController::class, 'store']);
    Route::patch('/purchase_trip/{id}', [PurchaseTripController::class, 'update']);
    Route::delete('/purchase_trip/{id}', [PurchaseTripController::class, 'destroy']);

    Route::get('/type_products', [TypeProductController::class, 'index']);
    Route::get('/type_product/{id}', [TypeProductController::class, 'show']);
    Route::post('/type_product', [TypeProductController::class, 'store']);
    Route::patch('/type_product/{id}', [TypeProductController::class, 'update']);
    Route::delete('/type_product/{id}', [TypeProductController::class, 'destroy']);

    Route::get('/sale_products', [SaleProductController::class, 'index']);
    Route::get('/sale_product/{id}', [SaleProductController::class, 'show']);
    Route::post('/sale_product', [SaleProductController::class, 'store']);
    Route::patch('/sale_product/{id}', [SaleProductController::class, 'update']);
    Route::delete('/sale_product/{id}', [SaleProductController::class, 'destroy']);

    Route::get('/sale_product_details', [DetailSaleProduct::class, 'index']);
    Route::get('/sale_product_detail/{id}', [DetailSaleProduct::class, 'show']);
    Route::post('/sale_product_detail', [DetailSaleProduct::class, 'store']);
    Route::patch('/sale_product_detail/{id}', [DetailSaleProduct::class, 'update']);
    Route::delete('/sale_product_detail/{id}', [DetailSaleProduct::class, 'destroy']);
    Route::get('/logout',[AuthenticationController::class,'logout']);
    Route::get('/me',[AuthenticationController::class,'me']);
});

Route::get('/tradings', [TradingController::class, 'index']);
Route::post('/trading', [TradingController::class, 'store']);
Route::patch('/trading/{id}', [TradingController::class, 'update']);
Route::get('/trading/{id}', [TradingController::class, 'show']);
Route::delete('/trading/{id}', [TradingController::class, 'destroy']);

Route::get('/trading_details', [TradingDetailController::class, 'index']);
Route::post('/trading_detail', [TradingDetailController::class, 'store']);
Route::patch('/trading_detail/{id}', [TradingDetailController::class, 'update']);
Route::get('/trading_detail/{id}', [TradingDetailController::class, 'show']);
Route::delete('/trading_detail/{id}', [TradingDetailController::class, 'destroy']);

Route::get('/expenses', [ExpenseController::class, 'index']);
Route::post('/expense', [ExpenseController::class, 'store']);
Route::patch('/expense/{id}', [ExpenseController::class, 'update']);
Route::get('/expense/{id}', [ExpenseController::class, 'show']);
Route::delete('/expense/{id}', [ExpenseController::class, 'destroy']);

Route::post('/login',[AuthenticationController::class,'login']);


