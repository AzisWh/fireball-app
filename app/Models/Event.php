<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'description', 'start_date', 'end_date'];

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
}
