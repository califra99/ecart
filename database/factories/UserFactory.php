<?php

namespace Database\Factories;

use App\Models\Nation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'surname' => fake()->word(),
            'email' => fake()->unique()->safeEmail(),
            'password' => static::$password ??= Hash::make('password'),
            'nation_id' => Nation::factory(),
            'newsletter' => 0,
            'invoice' => 0,
            'vat_number' => '',
            'fiscal_code' => '',
            'privacy' => 0,
            'remember_token' => Str::random(10),
        ];
    }
}
