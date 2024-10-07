<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormUssc extends Model
{
    use HasFactory;

    protected $table = 'form_usscs';
    
    protected $fillable = [
        'user_id', 'email', 'phone_number', 'lapangan_tempat_id', 'jam', 'tanggal', 'status', 'ktm','kategori'
    ];

    protected $casts = [
        'jam' => 'array', 
    ];

    public function lapangan() {
        return $this->belongsTo(UsscModel::class, 'lapangan_tempat_id');
    }
    
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
