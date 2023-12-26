<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coupon>
 */
class CouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => fake()->regexify('[A-Z0-9]{10}'),
            'value' => fake()->numberBetween(5, 50),
            'active' => 1,
            'min_price' => fake()->numberBetween(0, 50),
            'max_price' => fake()->numberBetween(500, 1000)
        ];
    }
}
