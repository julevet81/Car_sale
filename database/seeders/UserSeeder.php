<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'role_id' => 1,
            'email' => 'admin@example.com',
            'password' => Hash::make('12345678'), // never store plain text passwords!
        ]);
        User::create([
            'name' => 'Employee User',
            'role_id' => 2,
            'email' => 'employee@example.com',
            'password' => Hash::make('12345678'), // never store plain text passwords!
        ]);
        User::create([
            'name' => 'Customer User',
            'role_id' => 3,
            'email' => 'user@example.com',
            'password' => Hash::make('12345678'), // never store plain text passwords!
        ]);

        User::factory()->count(10)->create();

    }
}
