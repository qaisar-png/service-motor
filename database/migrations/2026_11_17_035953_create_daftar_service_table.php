<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('daftar_service', function (Blueprint $t) {
    $t->string('id_servis', 10)->primary();
    $t->string('no_plat', 15);
    $t->string('id_pelanggan', 10);
    $t->text('keluhan');
    $t->date('tanggal_servis');
    $t->timestamps();
    $t->foreign('no_plat')->references('no_plat')->on('kendaraan')->cascadeOnUpdate()->cascadeOnDelete();
    $t->foreign('id_pelanggan')->references('id_pelanggan')->on('pelanggan')->cascadeOnDelete();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_service');
    }
};
