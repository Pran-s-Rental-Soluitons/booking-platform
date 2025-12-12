<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $fillable = [
        'from_location',
        'to_location',
        'travel_date',
        'seating_capacity',
        'phone_number',
        'distance_km',
        'wa_message_id',
        'wa_status',
        'wa_error',
    ];

    protected $casts = [
        'travel_date' => 'date',
    ];
}
