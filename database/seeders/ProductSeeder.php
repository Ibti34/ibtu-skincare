<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [

            ['name' => 'Mypharma Body Cream', 'price' => 25.00, 'image' => 'product1.png', 'description' => 'Deep moisturizing body cream for dry and rough skin.'],

            ['name' => 'Nivea Soft Cream', 'price' => 27.50, 'image' => 'product2.png', 'description' => 'Lightweight moisturizing cream for face, hands, and body.'],

            ['name' => 'Aveeno Daily Moisturizing Lotion', 'price' => 20.78, 'image' => 'product3.png', 'description' => 'Oat-based lotion that hydrates and soothes dry skin.'],

            ['name' => 'Cetaphil Daily Facial Moisturizer SPF 35', 'price' => 35.00, 'image' => 'product4.png', 'description' => 'Facial moisturizer with SPF protection for daily use.'],

            ['name' => 'Vitamin E Face Cream', 'price' => 15.50, 'image' => 'product5.png', 'description' => 'Nourishing cream enriched with Vitamin E for healthy skin.'],

            ['name' => 'Cosmo Anti-Wrinkle Face Cream', 'price' => 18.00, 'image' => 'product6.png', 'description' => 'Anti-aging face cream that reduces fine lines.'],

            ['name' => 'Himalaya Rich Cocoa Butter Body Cream', 'price' => 22.00, 'image' => 'product7.png', 'description' => 'Rich body cream for deep hydration and smooth skin.'],

            ['name' => 'Balea Vanilla & Coconut Body Cream', 'price' => 12.00, 'image' => 'product8.png', 'description' => 'Moisturizing body cream with vanilla and coconut scent.'],

            ['name' => 'Nivea Intensive Moisturizing Body Cream', 'price' => 30.00, 'image' => 'product9.png', 'description' => 'Intensive care cream for extremely dry skin.'],

            ['name' => 'Aloe Vera Cream', 'price' => 14.00, 'image' => 'product10.png', 'description' => 'Soothing aloe cream that calms irritated skin.'],

            ['name' => 'Retinol & Collagen Cream', 'price' => 40.00, 'image' => 'product11.png', 'description' => 'Firming cream that improves elasticity and reduces wrinkles.'],

            ['name' => 'Pink Skincare Set', 'price' => 45.00, 'image' => 'product12.png', 'description' => 'Complete skincare set including cleanser, toner, and serum.'],

            ['name' => 'Innisfree Green Tea Serum', 'price' => 32.00, 'image' => 'product13.png', 'description' => 'Hydrating serum with green tea extract for glowing skin.'],

            ['name' => 'Wonder Peach Punch Foam Cleanser', 'price' => 16.00, 'image' => 'product14.png', 'description' => 'Refreshing foam cleanser that removes dirt and oil.'],

            ['name' => 'Honey Face & Body Lotion', 'price' => 19.00, 'image' => 'product15.png', 'description' => 'Honey-infused lotion for smooth and soft skin.'],

        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
