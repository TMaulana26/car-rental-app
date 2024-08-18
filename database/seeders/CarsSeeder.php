<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = ['Toyota', 'Honda', 'Ford', 'Chevrolet', 'Nissan', 'Hyundai', 'Kia', 'Volkswagen', 'BMW', 'Mercedes'];
        $models = ['SUV', 'Compact Car', 'Electric Vehicle'];
        $rates = [
            'SUV' => 500000.00,
            'Compact Car' => 300000.00,
            'Electric Vehicle' => 600000.00
        ];

        for ($i = 0; $i < 30; $i++) {
            $model = $models[array_rand($models)];
            $brand = $brands[array_rand($brands)];
            $isAvailable = (rand(1, 100) <= 75);  // 75% chance of being true

            DB::table('cars')->insert([
                'brand' => $brand,
                'model' => $model,
                'plate_number' => 'ABC' . str_pad($i + 1, 3, '0', STR_PAD_LEFT),
                'daily_rate' => $rates[$model],
                'is_available' => $isAvailable,
                'image_path' => 'car-images/Placeholder.webp',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
