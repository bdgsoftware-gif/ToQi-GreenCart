<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Fruits', 'description' => 'Fresh organic fruits'],
            ['name' => 'Vegetables', 'description' => 'Fresh organic vegetables'],
            ['name' => 'Dairy', 'description' => 'Organic dairy products'],
            ['name' => 'Grains', 'description' => 'Organic grains and cereals'],
            ['name' => 'Bakery', 'description' => 'Fresh baked organic goods'],
            ['name' => 'Beverages', 'description' => 'Organic drinks and juices'],
            ['name' => 'Snacks', 'description' => 'Organic snacks'],
            ['name' => 'Meat', 'description' => 'Organic meat products'],
            ['name' => 'Eggs', 'description' => 'Organic eggs'],
            ['name' => 'Herbs & Spices', 'description' => 'Organic herbs and spices'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
