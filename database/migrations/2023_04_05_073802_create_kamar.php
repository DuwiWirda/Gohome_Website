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
            $table->id();
            $table->enum('jenis_kamar', ['superrior', 'deluxe', 'sweet']);
            $table->string('nomer_kamar', 3);
            $table->integer('harga');
            $table->string('deskripsi', 100);
            $table->enum('jenis_kasur', ['twinBed', 'singleBed']);
            $table->string('gambar_kamar');
            $table->string('status_kamar', 10);
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
