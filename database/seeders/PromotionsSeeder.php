<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Promotions;

class PromotionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $promotions = [
            [
                'name' => 'Black Friday Sale: Save up to 40% off',
                'slug' => 'black-friday-sale-:-save-up-to-40%-off',
                'description' => 'Brace yourself for the discounts, Black Friday is here to commence.',
                'image' => 'image/banner/pro-discount.jpg',
                'start_date' => '2024-07-25 00:00:00',
                'end_date' => '2024-08-02 00:00:00',
            ],
            [
                'name' => 'Summer Season Collections ',
                'slug' => 'summer-season-collections ',
                'description' => 'Summer Season Collections ',
                'image' => 'image/banner/pro-cloth.jpg',
                'start_date' => '2024-07-01 00:00:00',
                'end_date' => '2024-08-31 00:00:00',
            ],
            [
                'name' => 'Fresh & Healthy: Farm-to-Table Vegetables',
                'slug' => 'fresh-&-healthy-:-farm-to-table-vegetables',
                'description' => 'Fresh & Healthy: Farm-to-Table Vegetables – Support Local, Order Now!',
                'image' => 'image/banner/pro-farm.jpg',
                'start_date' => '2024-07-01 00:00:00',
                'end_date' => '2024-08-31 00:00:00',
            ],
            [
                'name' => 'Special Promotion Laptop Sale 45% off',
                'slug' => 'special-promotion-laptop-sale-45%-off',
                'description' => 'Upgrade Your Tech Game: Unleash the Power of Savings',
                'image' => 'image/banner/pro-elec.jpg',
                'start_date' => '2024-07-01 00:00:00',
                'end_date' => '2024-08-31 00:00:00',
            ],
        ];

        foreach($promotions as $product){
            Promotions::create($product);
        }
    }
}
