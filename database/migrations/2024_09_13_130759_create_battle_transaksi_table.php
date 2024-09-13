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
        Schema::create('battle_transaksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('activity_id');
            $table->string('external_id')->nullable();
            $table->decimal('amount', 12, 2);
            $table->string('status')->default('UNPAID'); 
            $table->string('form_text')->nullable();
            $table->string('form_image')->nullable();
            $table->timestamp('payment_date')->nullable();
            $table->timestamps();

            //  foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('battle_transaksi');
    }
};
