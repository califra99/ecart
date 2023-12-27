<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Francesco',
            'surname' => 'Calian',
            'email' => 'francescocalian@gmail.com',
            'nation_id' => 1,
            'vat_number' => '11111111111',
            'fiscal_code' => 'CGNFTC99R15I775R',
        ]);
    }
}
