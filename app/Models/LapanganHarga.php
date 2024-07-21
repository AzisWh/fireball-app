<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LapanganHarga extends Model
{
    use HasFactory;

    protected $fillable = [
        'lapangan_tempat_id',
        'tanggal',
        'jam',
        'harga',
    ];

    protected $appends =[
        'mock_hour',
    ];

    public function lapangan_tempat()
    {
        return $this->belongsTo(LapanganTempat::class);
    }

    public function getMockHourAttribute() {
        if ($this->jam > 15 && $this->jam <= 18) {
            return 'Sore';
        } else if ($this->jam > 18 && $this->jam <= 23) {
            return 'Malam';
        } else {
            return 'Pagi';
        }
    }
}
