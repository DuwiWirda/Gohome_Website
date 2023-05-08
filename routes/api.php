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
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::get('kamar', [AuthController::class, 'kamar']);
Route::get('pengunjung', [AuthController::class, 'pengunjung']);
Route::get('transaksi', [AuthController::class, 'transaksi']);
Route::post('data_transaksi', [AuthController::class, 'data_transaksi']);
Route::put('/update_pengunjung/{nik}', [AuthController::class, 'update_pengunjung']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});