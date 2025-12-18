<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaketLayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\PaketLayanan::create([
            'id_admin' => 1,
            'nama_paket' => 'Bhumi Area',
            'kategori_paket' => 'Standard', 
            'deskripsi' => 'Paket layanan hemat dengan fitur dasar.',
            'harga_paket' => 50000,
            'durasi' => 4,
            'status_paket' => 'Tersedia',   
            'detail_venue' => 'Area outdoor dengan pemandangan alam.',
            'gambar_venue' => 'bhumi_area.jpg',
        ]);
    

        \App\Models\PaketLayanan::create([
            'id_admin' => 2,
            'nama_paket' => 'Bambu Area',
            'kategori_paket' => 'Standard', 
            'deskripsi' => 'Paket layanan hemat dengan fitur dasar.',
            'harga_paket' => 60000,
            'durasi' => 5,
            'status_paket' => 'Full',   
            'detail_venue' => 'Area outdoor dengan pemandangan alam.',
            'gambar_venue' => 'bambu_area.jpg',
        ]);
    }
}
