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
        Schema::create('transaksi_lapangans', function (Blueprint $table) {
            $table->id();
            $table->string('invoice');
            $table->string('external_id');
            $table->foreignId('user_id')->constrained('users');
            $table->date('tanggal_booking');
            // $table->float('total_harga', 15, 2);
            $table->decimal('total_harga', 16, 2);
            $table->string('status');
            $table->string('link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_lapangans');
    }
};
