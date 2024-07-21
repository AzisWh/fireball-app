<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LapanganTempat extends Model
{
    use HasFactory;

    protected $fillable = ['lapangan_id', 'nama_tempat'];

    function lapangan() {
        return $this->belongsTo(Lapangan::class, 'lapangan_id');
    }
}
