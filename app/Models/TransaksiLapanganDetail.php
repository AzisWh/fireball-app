<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiLapanganDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaksi_lapangan_id',
        'lapangan_tempat_id',
        'tanggal_booking',
        'jam',
        'harga',
    ];

    public function transaksi() {
        return $this->belongsTo(TransaksiLapangan::class, 'transaksi_lapangan_id');
    }
}
