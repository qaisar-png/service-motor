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
       Schema::create('data_service', function (Blueprint $t) {
    $t->id();
    $t->unsignedBigInteger('id_servis');
    $t->string('estimasi_service');
    $t->string('nama_mekanik');
    $t->string('sparepart_pengganti')->nullable();
    $t->timestamps();
    $t->foreign('id_servis')->references('id_servis')->on('daftar_service')->cascadeOnDelete();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_service');
    }
};
