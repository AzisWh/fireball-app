<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BattleTransaksi extends Model
{
    use HasFactory;

    protected $table = 'battle_transaksis';
    
    protected $fillable = [
        'user_id', 
        'activity_id', 
        'external_id', 
        'amount', 
        'status', 
        'form_text', 
        'form_image', 
        'payment_date',
        'invoice_url'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
}
