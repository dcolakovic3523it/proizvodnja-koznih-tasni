<?php

namespace Database\Seeders;

use App\Models\Narudzbina;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NarudzbinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Narudzbina::create([
            "user_id" => 1,
            "ukupna_cena" => 15000.00,
            "status" => "U obradi."
        ]);

        Narudzbina::create([
            "user_id" => 2,
            "ukupna_cena" => 50000.00,
            "status" => "Na čekanju."
        ]);

        Narudzbina::create([
            "user_id" => 3,
            "ukupna_cena" => 18000.00,
            "status" => "U obradi."
        ]);

    }
}
