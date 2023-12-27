<?php

namespace Database\Seeders;

use App\Models\Nation;
use Illuminate\Database\Seeder;

class NationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Nation::factory()->create(['name' => 'Italy']);
        Nation::factory()->create(['name' => 'Argentina']);
        Nation::factory()->create(['name' => 'USA']);
    }
}
