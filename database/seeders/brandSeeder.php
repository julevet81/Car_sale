<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            ['name' => 'Toyota', 'country' => 'Japan'],
            ['name' => 'Honda', 'country' => 'Japan'],
            ['name' => 'Nissan', 'country' => 'Japan'],
            ['name' => 'Mazda', 'country' => 'Japan'],
            ['name' => 'Subaru', 'country' => 'Japan'],
            ['name' => 'Mitsubishi', 'country' => 'Japan'],
            ['name' => 'Lexus', 'country' => 'Japan'],
            ['name' => 'Hyundai', 'country' => 'South Korea'],
            ['name' => 'Kia', 'country' => 'South Korea'],
            ['name' => 'Chevrolet', 'country' => 'USA'],
            ['name' => 'Ford', 'country' => 'USA'],
            ['name' => 'Tesla', 'country' => 'USA'],
            ['name' => 'Dodge', 'country' => 'USA'],
            ['name' => 'Jeep', 'country' => 'USA'],
            ['name' => 'BMW', 'country' => 'Germany'],
            ['name' => 'Mercedes-Benz', 'country' => 'Germany'],
            ['name' => 'Audi', 'country' => 'Germany'],
            ['name' => 'Volkswagen', 'country' => 'Germany'],
            ['name' => 'Porsche', 'country' => 'Germany'],
            ['name' => 'Ferrari', 'country' => 'Italy'],
            ['name' => 'Lamborghini', 'country' => 'Italy'],
            ['name' => 'Fiat', 'country' => 'Italy'],
            ['name' => 'Peugeot', 'country' => 'France'],
            ['name' => 'Renault', 'country' => 'France'],
            ['name' => 'Citroën', 'country' => 'France'],
            ['name' => 'Volvo', 'country' => 'Sweden'],
            ['name' => 'Land Rover', 'country' => 'UK'],
            ['name' => 'Jaguar', 'country' => 'UK'],
            ['name' => 'Rolls-Royce', 'country' => 'UK'],
            ['name' => 'Bentley', 'country' => 'UK'],
        ];

        DB::table('brands')->insert($brands);
    }
}
