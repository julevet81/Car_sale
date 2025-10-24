<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'admin', 'guard_name' => 'admin']);
        Role::create(['name' => 'employee', 'guard_name' => 'employee']);
        Role::create(['name' => 'customer', 'guard_name' => 'customer']);
        Role::create(['name' => 'guest', 'guard_name' => 'web']);
    }
}
