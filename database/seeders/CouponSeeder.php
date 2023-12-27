<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create 25 coupons with active = 1
        Coupon::factory()->count(25)->create();

        // create 5 coupons with active = 0
        Coupon::factory()->count(10)->create(['active' => 0]);
    }
}
