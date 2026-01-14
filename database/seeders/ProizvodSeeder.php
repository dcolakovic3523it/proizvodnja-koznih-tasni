<?php

namespace Database\Seeders;

use App\Models\Proizvod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProizvodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Proizvod::create([
            "naziv" => "Braon kožna tašna",
            "opis" => "Poslovna tašna od vrhunskog kvaliteta.",
            "cena" => 25000.00,
            "stanje" => "Na stanju.",
            "slika" => "slika1.png", 
            "kategorija_id" => 1
        ]);

        Proizvod::create([
            "naziv" => "Bordo kožna tašna",
            "opis" => "Elegantna tašna od vrhunskog kvaliteta.",
            "cena" => 15000.00,
            "stanje" => "Na stanju.",
            "slika" => "slika2.png", 
            "kategorija_id" => 2
        ]);

        Proizvod::create([
            "naziv" => "Bež kožna tašna",
            "opis" => "Svakodnevna tašna od vrhunskog kvaliteta.",
            "cena" => 18000.00,
            "stanje" => "Na stanju.",
            "slika" => "slika3.png", 
            "kategorija_id" => 3
        ]);


    }
}
