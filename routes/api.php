<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
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

//ruta clientes
Route::get('/client',[ClientController::class,('index')]);
//ruta productos
Route::get('/product',[ProductController::class,('index')]);
//ruta ordenes
Route::post('/order',[OrderController::class,('store')]);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
