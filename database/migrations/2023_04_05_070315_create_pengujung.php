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
        Schema::create('pengujung', function (Blueprint $table) {
            $table->id('nik');
            $table->string('nama_pengunjung', 50);
            $table->string('email', 25);
            $table->string('password', 225);
            $table->string('telpon', 13);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengujung');
    }
};
