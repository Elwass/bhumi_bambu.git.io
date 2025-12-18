<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaketLayanan extends Model
{
    protected $table = 'Paket_Layanan';

    protected $fillable = [
        'id_paket',
        'nama_paket',
        'kategori_paket',
        'deskripsi',
        'harga_paket',
        'durasi',
        'status_paket',
        'detail_venue',
        'gambar_venue',
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'id_admin');
    }

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class, 'id_paket');
    }

    public function promo()
    {
        return $this->hasMany(Promo::class, 'id_paket');
    }

    public function detailpaketlayanan()
    {
        return $this->hasMany(DetailPaketLayanan::class, 'id_paket');
    }
}
