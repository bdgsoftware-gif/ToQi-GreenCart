<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Get all sellers (role_id = 2)
        $sellers = User::where('role_id', 2)->get();

        if ($sellers->isEmpty()) {
            // Create a seller if none exist
            $seller = User::factory()->seller()->create();
            $sellers = collect([$seller]);
        }

        $categories = Category::all();

        if ($categories->isEmpty()) {
            $this->call(CategorySeeder::class);
            $categories = Category::all();
        }

        $products = [
            // Electronics
            [
                'name' => 'iPhone 15 Pro',
                'description' => 'Latest iPhone with advanced camera system',
                'price' => 999.99,
                'stock_quantity' => 50,
                'category_id' => $categories->where('name', 'Electronics')->first()->id,
            ],
            [
                'name' => 'Samsung Galaxy S24',
                'description' => 'Android flagship with amazing display',
                'price' => 899.99,
                'stock_quantity' => 75,
                'category_id' => $categories->where('name', 'Electronics')->first()->id,
            ],
            [
                'name' => 'MacBook Pro 16"',
                'description' => 'Professional laptop for creative work',
                'price' => 2499.99,
                'stock_quantity' => 25,
                'category_id' => $categories->where('name', 'Electronics')->first()->id,
            ],
            [
                'name' => 'Sony WH-1000XM5',
                'description' => 'Noise-cancelling wireless headphones',
                'price' => 399.99,
                'stock_quantity' => 100,
                'category_id' => $categories->where('name', 'Electronics')->first()->id,
            ],

            // Fashion
            [
                'name' => 'Leather Jacket',
                'description' => 'Genuine leather jacket for men',
                'price' => 199.99,
                'stock_quantity' => 30,
                'category_id' => $categories->where('name', 'Fashion')->first()->id,
            ],
            [
                'name' => 'Summer Dress',
                'description' => 'Floral print summer dress for women',
                'price' => 59.99,
                'stock_quantity' => 80,
                'category_id' => $categories->where('name', 'Fashion')->first()->id,
            ],
            [
                'name' => 'Running Shoes',
                'description' => 'Comfortable running shoes for all terrains',
                'price' => 129.99,
                'stock_quantity' => 60,
                'category_id' => $categories->where('name', 'Fashion')->first()->id,
            ],

            // Home & Garden
            [
                'name' => 'Coffee Table',
                'description' => 'Modern wooden coffee table',
                'price' => 299.99,
                'stock_quantity' => 15,
                'category_id' => $categories->where('name', 'Home & Garden')->first()->id,
            ],
            [
                'name' => 'Indoor Plant Set',
                'description' => 'Set of 5 indoor plants with pots',
                'price' => 89.99,
                'stock_quantity' => 40,
                'category_id' => $categories->where('name', 'Home & Garden')->first()->id,
            ],

            // Books
            [
                'name' => 'The Midnight Library',
                'description' => 'Bestselling novel by Matt Haig',
                'price' => 19.99,
                'stock_quantity' => 200,
                'category_id' => $categories->where('name', 'Books')->first()->id,
            ],
            [
                'name' => 'Atomic Habits',
                'description' => 'Build good habits and break bad ones',
                'price' => 24.99,
                'stock_quantity' => 150,
                'category_id' => $categories->where('name', 'Books')->first()->id,
            ],

            // Sports
            [
                'name' => 'Yoga Mat',
                'description' => 'Premium non-slip yoga mat',
                'price' => 39.99,
                'stock_quantity' => 120,
                'category_id' => $categories->where('name', 'Sports & Outdoors')->first()->id,
            ],
            [
                'name' => 'Dumbbell Set',
                'description' => 'Adjustable dumbbell set 5-25kg',
                'price' => 149.99,
                'stock_quantity' => 35,
                'category_id' => $categories->where('name', 'Sports & Outdoors')->first()->id,
            ],

            // Health & Beauty
            [
                'name' => 'Vitamin C Serum',
                'description' => 'Anti-aging vitamin C serum',
                'price' => 29.99,
                'stock_quantity' => 200,
                'category_id' => $categories->where('name', 'Health & Beauty')->first()->id,
            ],
            [
                'name' => 'Electric Toothbrush',
                'description' => 'Sonic electric toothbrush with charger',
                'price' => 79.99,
                'stock_quantity' => 90,
                'category_id' => $categories->where('name', 'Health & Beauty')->first()->id,
            ],

            // Toys & Games
            [
                'name' => 'LEGO Star Wars Set',
                'description' => 'Collectible LEGO Star Wars Millennium Falcon',
                'price' => 199.99,
                'stock_quantity' => 20,
                'category_id' => $categories->where('name', 'Toys & Games')->first()->id,
            ],
            [
                'name' => 'Board Game Collection',
                'description' => 'Set of 5 popular board games',
                'price' => 99.99,
                'stock_quantity' => 45,
                'category_id' => $categories->where('name', 'Toys & Games')->first()->id,
            ],

            // Automotive
            [
                'name' => 'Car Vacuum Cleaner',
                'description' => 'Portable cordless car vacuum',
                'price' => 49.99,
                'stock_quantity' => 80,
                'category_id' => $categories->where('name', 'Automotive')->first()->id,
            ],
            [
                'name' => 'Dash Cam',
                'description' => '4K dash camera with night vision',
                'price' => 129.99,
                'stock_quantity' => 60,
                'category_id' => $categories->where('name', 'Automotive')->first()->id,
            ],

            // Jewelry
            [
                'name' => 'Silver Necklace',
                'description' => '925 sterling silver necklace with pendant',
                'price' => 89.99,
                'stock_quantity' => 50,
                'category_id' => $categories->where('name', 'Jewelry')->first()->id,
            ],
            [
                'name' => 'Gold Earrings',
                'description' => '24K gold plated earrings',
                'price' => 149.99,
                'stock_quantity' => 30,
                'category_id' => $categories->where('name', 'Jewelry')->first()->id,
            ],
        ];

        foreach ($products as $productData) {
            Product::create(array_merge($productData, [
                'seller_id' => $sellers->random()->id,
                'is_active' => true,
            ]));
        }

        // Create additional random products
        Product::factory(50)->create([
            'seller_id' => $sellers->random()->id,
            'category_id' => $categories->random()->id,
        ]);
    }
}
