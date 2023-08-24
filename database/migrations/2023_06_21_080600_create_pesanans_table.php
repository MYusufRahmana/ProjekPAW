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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('id_jadwal');
            $table->foreign('id_jadwal')->references('id')->on('jadwals')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('jumlah');
            $table->uuid('id_pembayaran');
            $table->foreign('id_pembayaran')->references('id')->on('pembayarans')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
