<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create roles
        $roles = [
            ['name' => 'admin', 'description' => 'System Administrator'],
            ['name' => 'seller', 'description' => 'Product Seller'],
            ['name' => 'customer', 'description' => 'Customer/Buyer'],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }

        // 2. Create categories
        $this->call(CategorySeeder::class);

        // 3. Create users
        // Admin
        User::create([
            'role_id' => 1,
            'full_name' => 'Admin User',
            'email' => 'admin@greencart.com',
            'password' => Hash::make('password123'),
            'email_verified_at' => now(),
            'is_active' => true,
        ]);

        // Create multiple sellers
        User::factory()->count(5)->seller()->create();

        // Create multiple customers
        User::factory()->count(20)->customer()->create();

        // 4. Create products
        $this->call(ProductSeeder::class);

        // 5. Create product images
        $this->call(ProductImageSeeder::class);
    }
}
