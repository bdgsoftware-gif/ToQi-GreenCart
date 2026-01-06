<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Electronics',
                'description' => 'Latest electronic gadgets and devices'
            ],
            [
                'name' => 'Fashion',
                'description' => 'Clothing, accessories, and footwear'
            ],
            [
                'name' => 'Home & Kitchen',
                'description' => 'Home appliances and kitchenware'
            ],
            [
                'name' => 'Books',
                'description' => 'Educational and entertainment books'
            ],
            [
                'name' => 'Sports',
                'description' => 'Sports equipment and accessories'
            ],
            [
                'name' => 'Beauty',
                'description' => 'Cosmetics and personal care'
            ],
            [
                'name' => 'Furniture',
                'description' => 'Home and office furniture'
            ],
            [
                'name' => 'Toys & Games',
                'description' => 'Children toys and family games'
            ],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'description' => $category['description'],
            ]);
        }
    }
}
