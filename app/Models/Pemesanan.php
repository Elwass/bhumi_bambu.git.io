<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'pemesanan';

    protected $fillable = [
        'id_pelanggan',
        'id_paket',
        'id_promosi',
        'tanggal_pemesanan',
        'status_pemesanan',
        'total_harga',
    ];

    public function user()
    {
        return $this->belongsTo(Pelanggan::class, 'id_user');
    }

    public function PaketLayanan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_paket');
    }

    public function promosi()
    {
        return $this->belongsTo(Pelanggan::class, 'id_promosi');
    }   

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'id_pemesanan');
    }
}
