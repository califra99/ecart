<?php

namespace Database\Seeders;

use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create 50 "normal" products with some coupons
        Product::factory()->count(50)->create()->each(
            fn ($product) => $product->coupons()->attach(Coupon::inRandomOrder()->take(rand(1, 3))->pluck('id'))
        );

        // create 10 products with stock_qty = 0
        Product::factory()->count(10)->create(['stock_qty' => 0]);

        // create 5 products with active = 0
        Product::factory()->count(5)->create(['active' => 0]);
    }
}
