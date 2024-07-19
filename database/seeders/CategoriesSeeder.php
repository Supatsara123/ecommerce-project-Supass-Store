<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Electronics',
                'slug' => 'electronics',
                'description' => 'such as TVs, smart watches, Office supplies, etc.',
                'status' => '0',
                'popular' => '1',
                'image' => 'image/categories/electronic.png'
            ],
            [
                'name' => 'Beauty and Personal Care',
                'slug' => 'beauty-and-personal-care',
                'description' => 'such as cosmetics, shaving kit, etc.',
                'status' => '0',
                'popular' => '1',
                'image' => 'image/categories/beauty-care.jpg'
            ],
            [
                'name' => 'Food and Beverages',
                'slug' => 'food-and-beverages',
                'description' => 'such as food, drink, snack, ice cream, cake, etc.',
                'status' => '0',
                'popular' => '1',
                'image' => 'image/categories/food.jpg'
            ],
            [
                'name' => 'Furniture',
                'slug' => 'furniture',
                'description' => 'such as furniture, coffee makers, etc.',
                'status' => '0',
                'popular' => '1',
                'image' => 'image/categories/furniture.jpg'
            ],
            [
                'name' => 'Baby and Toys',
                'slug' => 'baby-and-toys',
                'description' => 'such as board games, children’s toys, etc.',
                'status' => '0',
                'popular' => '1',
                'image' => 'image/categories/toy.jpg'
            ],
            [
                'name' => 'DIY and Hardware',
                'slug' => 'diy-and-hardware',
                'description' => 'including plumbing and electrical supplies, tools, and some housewares, etc.',
                'status' => '0',
                'popular' => '1',
                'image' => 'image/categories/tools.jpg'
            ],
            [
                'name' => 'Health and Wellness',
                'slug' => 'health-and-wellness',
                'description' => 'such as vitamins ,dietary supplements, etc.',
                'status' => '0',
                'popular' => '1',
                'image' => 'image/categories/health.jpg'
            ],
        ];

        foreach($categories as $category){
            Categories::create($category);
        }
    }
}
