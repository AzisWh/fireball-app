<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiLapangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice',
        'external_id',
        'user_id',
        'tanggal_booking',
        'total_harga',
        'status',
        'link',
    ];
}
