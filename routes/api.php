<?php

use App\Http\Controllers\Api;
use Illuminate\Support\Facades\Route;

Route::apiResource('pelanggan', Api\PelangganController::class);
Route::apiResource('kendaraan', Api\KendaraanController::class);
Route::apiResource('daftar-service', Api\DaftarServiceController::class);
Route::apiResource('data-service', Api\DataServiceController::class);
Route::apiResource('pembayaran', Api\PembayaranController::class);
