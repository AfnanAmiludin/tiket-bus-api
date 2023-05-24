<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\AuthController as ControllersAuthController;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\HandlePaymentNotifController;
use App\Http\Controllers\TiketController;
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

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('coba', [CobaController::class, 'coba']);
    Route::post('booking', [TiketController::class, 'booking']);
    Route::get('dataBooking', [TiketController::class, 'dataBooking']);
});
Route::post('midtrans/notif-hook', [HandlePaymentNotifController::class, 'handlePayment']);
