<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image_url',
        'price_per_km',
        'rating',
        'reviews_count',
        'best_for',
        'features',
        'is_featured'
    ];

    protected $casts = [
        'features' => 'array',
        'is_featured' => 'boolean',
    ];
}
