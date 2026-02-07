<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['name' => 'Body Cream', 'price' => 25.00, 'image' => 'product1.png', 'description' => 'Rich moisturizing body cream.'],
            ['name' => 'Face Cream', 'price' => 27.50, 'image' => 'product2.png', 'description' => 'Gentle hydrating face cream.'],
            ['name' => 'Skin Lotion', 'price' => 20.78, 'image' => 'product3.png', 'description' => 'Smooth daily skin lotion.'],
            ['name' => 'Eye Serum', 'price' => 35.00, 'image' => 'product4.png', 'description' => 'Brightening eye serum.'],
            ['name' => 'Face Wash', 'price' => 15.50, 'image' => 'product5.png', 'description' => 'Deep cleansing face wash.'],
            ['name' => 'Sunscreen', 'price' => 22.00, 'image' => 'product6.png', 'description' => 'SPF 50+ sun protection.'],
            ['name' => 'Night Cream', 'price' => 30.00, 'image' => 'product7.png', 'description' => 'Overnight repair cream.'],
            ['name' => 'Body Scrub', 'price' => 18.00, 'image' => 'product8.png', 'description' => 'Exfoliating body scrub.'],
            ['name' => 'Face Mask', 'price' => 12.00, 'image' => 'product9.png', 'description' => 'Clay-based purifying mask.'],
            ['name' => 'Lip Balm', 'price' => 5.50, 'image' => 'product10.png', 'description' => 'Soothing moisture for lips.'],
            ['name' => 'Toner', 'price' => 14.00, 'image' => 'product11.png', 'description' => 'Balancing skin toner.'],
            ['name' => 'Hand Cream', 'price' => 10.00, 'image' => 'product12.png', 'description' => 'Softening hand treatment.'],
            ['name' => 'Face Oil', 'price' => 40.00, 'image' => 'product13.png', 'description' => 'Organic revitalizing face oil.'],
            ['name' => 'Body Wash', 'price' => 12.50, 'image' => 'product14.png', 'description' => 'Refreshing botanical body wash.'],
            ['name' => 'Cleansing Milk', 'price' => 16.00, 'image' => 'product15.png', 'description' => 'Mild makeup remover.'],
            ['name' => 'Foot Cream', 'price' => 9.00, 'image' => 'product16.png', 'description' => 'Intensive foot repair.'],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
