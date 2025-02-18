<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriLapangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'jenis_lapangan'];

    public function lapangans()
    {
        return $this->hasMany(Lapangan::class, 'id');
    }
}
