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
        Schema::create('lapangans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mitra_id')->constrained('mitras');
            $table->string('nama_lapangan');
            $table->integer('jumlah_lapangan');
            $table->decimal('harga_lapangan_per_jamnya', 10, 2);
            $table->string('lokasi_lapangan'); 
            $table->foreignId('jenis_id')->constrained('kategori_lapangans');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori_lapangan');
    }
};
