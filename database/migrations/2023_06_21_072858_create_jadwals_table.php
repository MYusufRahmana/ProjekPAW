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
        Schema::create('jadwals', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->date('tanggal');
            $table->string('jam_tayang');
            $table->uuid('id_film');
            $table->foreign('id_film')->references('id')->on('films')->cascadeOnDelete()->cascadeOnUpdate();
            $table->uuid('id_cinema');
            $table->foreign('id_cinema')->references('id')->on('cinemas')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};
