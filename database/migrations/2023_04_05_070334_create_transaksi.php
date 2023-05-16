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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->date('tanggal_checkin');
            $table->date('tanggal_checkout');
            $table->enum('status', ['Proses', 'Checkin', 'Checkout']);
            $table->integer('harga');
            $table->integer('total');
            $table->string('nik',16);
            $table->foreign('nik')->references('nik')->on('pengunjung')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('id_kamar');
            $table->foreign('id_kamar')->references('id_kamar')->on('kamar')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
