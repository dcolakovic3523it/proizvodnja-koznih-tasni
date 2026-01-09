<?php

namespace Database\Factories;

use App\Models\Kategorija;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProizvodFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'naziv' => fake()->regexify('[A-Za-z0-9]{150}'),
            'opis' => fake()->text(),
            'cena' => fake()->randomFloat(2, 0, 999999.99),
            'stanje' => fake()->numberBetween(-10000, 10000),
            'kategorija_id' => Kategorija::factory(),
        ];
    }
}
