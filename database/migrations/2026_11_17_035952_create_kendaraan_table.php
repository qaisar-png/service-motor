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
        Schema::create('kendaraan', function (Blueprint $t) {
    $t->string('no_plat', 15)->primary();
    $t->enum('jenis_kendaraan', ['Matic', 'Manual Transmisi']);
    $t->string('no_stnk', 30);
    $t->year('tahun_pembuatan');
    $t->string('nama_pemilik');
    $t->string('warna', 30);
    $t->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraan');
    }
};
