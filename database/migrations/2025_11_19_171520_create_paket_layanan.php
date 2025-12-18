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
         Schema::create('paket_layanan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_admin');
            $table->foreign('id_admin')->references('id')->on('users')->onDelete('cascade');
            $table->string('nama_paket');
            $table->string('kategori_paket');
            $table->string('deskripsi');
            $table->integer('harga_paket');
            $table->string('durasi');
            $table->string('status_paket');
            $table->string('detail_venue');
            $table->string('gambar_venue');
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
