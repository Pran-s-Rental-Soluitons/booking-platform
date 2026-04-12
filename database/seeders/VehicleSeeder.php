<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vehicle;

class VehicleSeeder extends Seeder
{
    public function run(): void
    {
        if (Vehicle::count() > 0) return;

        $vehicles = [
            [
                'name' => 'Tempo Traveller',
                'image_url' => 'https://api.builder.io/api/v1/image/assets/TEMP/2d6fbcfe226207e21f76c56e6b7c3906d03a2ae8?width=950',
                'price_per_km' => 15,
                'rating' => 4.7,
                'reviews_count' => 985,
                'best_for' => 'Large groups & tours',
                'features' => ['🪑 12 Seats', '💺 Maximum space', '🪑 Reclining seats', '🎵 Entertainment system'],
                'is_featured' => false,
            ],
            [
                'name' => 'Force Urbania',
                'image_url' => 'https://api.builder.io/api/v1/image/assets/TEMP/e621d459c5210337db23c83f86a6e66654e83ab6?width=942',
                'price_per_km' => 15,
                'rating' => 4.8,
                'reviews_count' => 1200,
                'best_for' => 'Premium travel & corporate trips',
                'features' => ['🪑 17 Seats', '❄️ AC', '🪑 Reclining seats', '🎵 Entertainment system'],
                'is_featured' => true,
            ],
            [
                'name' => 'Caravan',
                'image_url' => 'https://api.builder.io/api/v1/image/assets/TEMP/f7f0b35ff042206e08ea220917d7cc6e28e9ab0d?width=900',
                'price_per_km' => 20,
                'rating' => 4.6,
                'reviews_count' => 540,
                'best_for' => 'Luxury & comfortable long drives',
                'features' => ['🛏️ Sleeping beds', '❄️ AC', '🍳 Mini kitchen', '🚿 Washroom'],
                'is_featured' => false,
            ],
        ];

        foreach ($vehicles as $vehicle) {
            Vehicle::create($vehicle);
        }
    }
}
