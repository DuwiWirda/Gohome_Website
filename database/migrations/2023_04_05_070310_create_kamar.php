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
        Schema::create('kamar', function (Blueprint $table) {
            $table->id('id_kamar');
            $table->enum('jenis_kamar', ['Standard', 'Deluxe', 'Suite']);
            $table->string('nomer_kamar', 5);
            $table->integer('harga');
            $table->string('deskripsi', 100);
            $table->enum('jenis_kasur', ['double', 'double big', 'super king']);
            $table->string('gambar_kamar');
            $table->enum('status_kamar', ['Tersedia', 'Tidak Tersedia']);
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kamar');
    }
};
