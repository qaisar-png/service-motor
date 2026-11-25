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
        Schema::create('pembayaran', function (Blueprint $t) {
    $t->id();
    $t->string('id_servis', 10);
    $t->unsignedBigInteger('jumlah_biaya');
    $t->enum('jenis_pembayaran', ['Cash / Tunai', 'Non Tunai']);
    $t->text('keterangan')->nullable();
    $t->timestamps();
    $t->foreign('id_servis')->references('id_servis')->on('daftar_service')->cascadeOnDelete();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
