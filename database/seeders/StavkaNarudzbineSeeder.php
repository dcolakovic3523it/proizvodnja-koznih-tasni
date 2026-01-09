<?php

namespace Database\Seeders;

use App\Models\StavkaNarudzbine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StavkaNarudzbineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Prva narudzbina
        StavkaNarudzbine::create([
            "proizvod_id" => 5,
            "narudzbina_id" => 1,
            "kolicina" => 1,
            "cena" => 15000.00
        ]);

        // Druga narudzbina
        StavkaNarudzbine::create([
            "proizvod_id" => 1,
            "narudzbina_id" => 2,
            "kolicina" => 1,
            "cena" => 25000.00
        ]);

        StavkaNarudzbine::create([
            "proizvod_id" => 2,
            "narudzbina_id" => 2,
            "kolicina" => 1,
            "cena" => 25000.00
        ]);

        // Treca narudzbina
        StavkaNarudzbine::create([
            "proizvod_id" => 8,
            "narudzbina_id" => 3,
            "kolicina" => 1,
            "cena" => 18000.00
        ]);
    }
}
