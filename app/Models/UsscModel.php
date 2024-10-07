<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsscModel extends Model
{
    use HasFactory;

    protected $table = 'ussc_lapangans';

    protected $fillable = [
        'nama_lapangan',
        'jumlah_lapangan',
        'harga_lapangan_per_jamnya',
        'lokasi_lapangan',
        'mitra',
    ];


    

}
