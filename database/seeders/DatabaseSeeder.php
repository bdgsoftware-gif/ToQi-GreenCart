<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create roles
        $roles = [
            ['name' => 'admin', 'description' => 'System Administrator'],
            ['name' => 'seller', 'description' => 'Product Seller'],
            ['name' => 'customer', 'description' => 'Customer/Buyer'],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }

        // Create admin user
        User::create([
            'role_id' => 1,
            'full_name' => 'Admin User',
            'email' => 'admin@greencart.com',
            'password' => Hash::make('password123'),
            'is_active' => true,
        ]);

        // Create sample seller
        User::create([
            'role_id' => 2,
            'full_name' => 'Organic Farm Seller',
            'email' => 'seller@greencart.com',
            'password' => Hash::make('password123'),
            'phone' => '+1234567890',
            'is_active' => true,
        ]);

        // Create sample customer
        User::create([
            'role_id' => 3,
            'full_name' => 'John Doe',
            'email' => 'customer@greencart.com',
            'password' => Hash::make('password123'),
            'is_active' => true,
        ]);

        $this->call(CategorySeeder::class);
    }
}
