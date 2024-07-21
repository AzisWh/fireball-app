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
        Schema::create('transaksi_lapangan_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaksi_lapangan_id')->constrained('transaksi_lapangans');
            $table->foreignId('lapangan_tempat_id')->constrained('lapangan_tempats');
            $table->date('tanggal_booking');
            $table->integer('jam');
            $table->float('harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_lapangan_details');
    }
};
