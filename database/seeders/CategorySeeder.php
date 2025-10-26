<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Sedan', 'description' => 'Compact and mid-sized cars suitable for daily driving.'],
            ['name' => 'SUV', 'description' => 'Sport Utility Vehicles offering space and performance.'],
            ['name' => 'Truck', 'description' => 'Vehicles designed for cargo transport or heavy duty use.'],
            ['name' => 'Coupe', 'description' => 'Stylish two-door cars for sporty driving.'],
            ['name' => 'Convertible', 'description' => 'Cars with retractable roofs for open-air driving.'],
            ['name' => 'Hatchback', 'description' => 'Small cars with rear door access to the cargo area.'],
            ['name' => 'Van', 'description' => 'Multi-passenger or cargo vehicles with large interiors.'],
            ['name' => 'Crossover', 'description' => 'Blend of SUV and hatchback with urban comfort.'],
            ['name' => 'Electric', 'description' => 'Fully electric or hybrid cars for eco-friendly driving.'],
            ['name' => 'Luxury', 'description' => 'High-end premium vehicles offering top performance and comfort.'],
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'description' => $category['description'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
