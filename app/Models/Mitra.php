<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'namamitra'];

    public function lapangans()
    {
        return $this->hasMany(Lapangan::class, 'id');
    }
}
