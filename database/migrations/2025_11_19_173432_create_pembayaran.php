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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pemesanan')->nullable();
            $table->foreign('id_pemesanan')->references('id')->on('pemesanan')->onDelete('cascade');
            $table->date('tanggal_pembayaran');
            $table->string('metode_pembayaran');
            $table->integer('jumlah_bayar');
            $table->string('status_pembayaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
