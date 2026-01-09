<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class NarudzbinaFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'ukupna_cena' => fake()->randomFloat(2, 0, 999999.99),
            'status' => fake()->regexify('[A-Za-z0-9]{50}'),
        ];
    }
}
