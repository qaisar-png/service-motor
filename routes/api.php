<?php

use App\Http\Controllers\Api;
use Illuminate\Support\Facades\Route;

// Route API khusus pengujian Postman (prefix URL /api).
// Nama route diberi awalan "api." agar tidak bentrok dengan nama route web
// (pelanggan.index, kendaraan.index, dst.) yang dipakai redirect()/route() di web.
Route::name('api.')->group(function () {
    Route::apiResource('pelanggan', Api\PelangganController::class);
    Route::apiResource('kendaraan', Api\KendaraanController::class);
    Route::apiResource('daftar-service', Api\DaftarServiceController::class);
    Route::apiResource('data-service', Api\DataServiceController::class);
    Route::apiResource('pembayaran', Api\PembayaranController::class);
});
