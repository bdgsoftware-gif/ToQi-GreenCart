<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Electronics',
                'description' => 'Latest electronic gadgets and devices',
            ],
            [
                'name' => 'Fashion',
                'description' => 'Clothing, shoes, and accessories',
            ],
            [
                'name' => 'Home & Garden',
                'description' => 'Home decor, furniture, and gardening',
            ],
            [
                'name' => 'Books',
                'description' => 'Books across all genres',
            ],
            [
                'name' => 'Sports & Outdoors',
                'description' => 'Sports equipment and outdoor gear',
            ],
            [
                'name' => 'Health & Beauty',
                'description' => 'Health products and beauty supplies',
            ],
            [
                'name' => 'Toys & Games',
                'description' => 'Toys, games, and entertainment',
            ],
            [
                'name' => 'Automotive',
                'description' => 'Car accessories and automotive products',
            ],
            [
                'name' => 'Food & Grocery',
                'description' => 'Food items and grocery products',
            ],
            [
                'name' => 'Jewelry',
                'description' => 'Fine jewelry and accessories',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
