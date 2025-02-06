<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'event_id', // Add all required fields
    ];
    // Define relationship with Event
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}
