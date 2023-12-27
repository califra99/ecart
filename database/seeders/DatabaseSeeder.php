<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            NationSeeder::class,
            UserSeeder::class,
            ProductSeeder::class,
            CouponSeeder::class
        ]);
    }
}
