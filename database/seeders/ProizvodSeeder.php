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
            "naziv" => "Braon kožna tasna",
            "opis" => "Poslovna tašna od vrhunskog kvaliteta.",
            "cena" => 25000.00,
            "stanje" => "Na stanju.",
            "kategorija_id" => 1
        ]);

        Proizvod::create([
            "naziv" => "Bordo kožna tasna",
            "opis" => "Poslovna tašna od vrhunskog kvaliteta.",
            "cena" => 25000.00,
            "stanje" => "Na stanju.",
            "kategorija_id" => 1
        ]);

        Proizvod::create([
            "naziv" => "Bež kožna tasna",
            "opis" => "Poslovna tašna od vrhunskog kvaliteta.",
            "cena" => 25000.00,
            "stanje" => "Na stanju.",
            "kategorija_id" => 1
        ]);

        Proizvod::create([
            "naziv" => "Kamel kožna tasna",
            "opis" => "Poslovna tašna od vrhunskog kvaliteta.",
            "cena" => 25000.00,
            "stanje" => "Na stanju.",
            "kategorija_id" => 1
        ]);

        Proizvod::create([
            "naziv" => "Bordo kožna tasna",
            "opis" => "Elegantna tašna od vrhunskog kvaliteta.",
            "cena" => 15000.00,
            "stanje" => "Na stanju.",
            "kategorija_id" => 2
        ]);

        Proizvod::create([
            "naziv" => "Kamel kožna tasna",
            "opis" => "Poslovna tašna od vrhunskog kvaliteta.",
            "cena" => 30000.00,
            "stanje" => "Na stanju.",
            "kategorija_id" => 1
        ]);

        Proizvod::create([
            "naziv" => "Zelena kožna tasna",
            "opis" => "Poslovna tašna od vrhunskog kvaliteta.",
            "cena" => 25000.00,
            "stanje" => "Na stanju.",
            "kategorija_id" => 1
        ]);

        Proizvod::create([
            "naziv" => "Crna kožna tasna",
            "opis" => "Svakodnevna tašna od vrhunskog kvaliteta.",
            "cena" => 18000.00,
            "stanje" => "Na stanju.",
            "kategorija_id" => 3
        ]);

        Proizvod::create([
            "naziv" => "Braon kožna tasna",
            "opis" => "Elegantna tašna od vrhunskog kvaliteta.",
            "cena" => 15000.00,
            "stanje" => "Na stanju.",
            "kategorija_id" => 2
        ]);

        Proizvod::create([
            "naziv" => "Bordo kožna tasna",
            "opis" => "Elegantna tašna od vrhunskog kvaliteta.",
            "cena" => 15000.00,
            "stanje" => "Na stanju.",
            "kategorija_id" => 2
        ]);

        Proizvod::create([
            "naziv" => "Bež kožna tasna",
            "opis" => "Poslovna tašna od vrhunskog kvaliteta.",
            "cena" => 25000.00,
            "stanje" => "Na stanju.",
            "kategorija_id" => 1
        ]);

        Proizvod::create([
            "naziv" => "Crna kožna tasna",
            "opis" => "Svakodnevna tašna od vrhunskog kvaliteta.",
            "cena" => 10000.00,
            "stanje" => "Na stanju.",
            "kategorija_id" => 3
        ]);


    }
}
