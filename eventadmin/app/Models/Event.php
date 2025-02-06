<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    use HasFactory;

    // Allow mass assignment for required fields
    protected $fillable = ['name', 'event_date', 'location', 'description'];

    // Automatically cast 'event_date' to a Carbon instance
    protected $casts = [
        'event_date' => 'datetime',
    ];

    // Accessor to format event date for display
    public function getFormattedDateAttribute()
    {
        return $this->event_date ? $this->event_date->format('Y-m-d H:i:s') : null;
    }
}
