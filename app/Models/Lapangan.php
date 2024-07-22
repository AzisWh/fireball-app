<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lapangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'mitra_id',
        'nama_lapangan',
        'jenis_id',
        'jumlah_lapangan',
        'harga_lapangan_per_jamnya',
        'lokasi_lapangan',
    ];

    public function mitra()
    {
        return $this->belongsTo(Mitra::class);
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriLapangan::class, 'id');
    }

    public function hargaoption()
    {
        return $this->hasMany(LapanganHarga::class, 'id');
    }

    public function lapanganTempats()
    {
        return $this->hasMany(LapanganTempat::class, 'id');
    }
}
