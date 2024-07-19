<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Products;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'cate_id' => '2',
                'name' => 'Dove Shampoo Straight & Silky 170ML',
                'description' => '<p>New Dove Straight &amp; Silky Shampoo upgraded with Keratin Tri-Silk Serum has Amino Essence, an essential amino acid to boost hair health for deep nourishment up to the core of your hair fibres. For extra straight, smooth, and shiny hair!*</p><p>• For frizzy and stiff hair<br>• With Amino Essence to boost hair health and deep nourishment<br>• Nourishes hair bonds and restores smoothness and softness of each strand.<br>• With Keratin Tri-Silk Serum, a triple action formula with the powerful combination of Keratin, Keratin Repair Actives and Serum Ingredients that instantly repairs damage*, deeply nourishes and protects, to give you that EXTRA beautiful hair.</p><p><i>*Damage refers to roughness and dryness</i></p>',
                'slug' => 'dove-shampoo-straight-&-silky-170ml',
                'image' => 'image/products/dove-shampoo.jpg',
                'weight' => '0.35',
                'original_price' => '20',
                'selling_price' => '17',
                'quantity' => '50',
                'tax' => '7',
                'status' => '0',
                'trending' => '1',
            ],
            [
                'cate_id' => '1',
                'name' => 'Dell WM126 Wireless Mouse - A0126501',
                'description' => '<p>The WM126 Wireless Optical Mouse from Dell offers you everyday wireless performance with excellent battery life</p><p>• USB Wireless Receiver<br>• Movement Resolution 1000 dpi<br>• Battery AA type<br>• Run Time Up To 12 months</p><p>• Color : Black<br>• Weight : 2.03 oz<br>• Wireless Receiver : USB wireless receiver<br>• OS : Windows / Chrome / Android / Linux</p>',
                'slug' => 'dell-wm126-wireless-mouse',
                'image' => 'image/products/dell-mouse.jpg',
                'weight' => '0.75',
                'original_price' => '350',
                'selling_price' => '335',
                'quantity' => '45',
                'tax' => '7',
                'status' => '0',
                'trending' => '0',
            ]
        ];

        foreach($products as $product){
            Products::create($product);
        }
    }
}
