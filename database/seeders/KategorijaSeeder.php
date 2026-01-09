<?php

namespace Database\Seeders;

use App\Models\Kategorija;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategorijaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kategorija::create([
            "naziv" => "Poslovne tašne",
            "opis" => "Tašne pogodne za svaku poslovnu priliku. Prostrane sa izdvojenim delom za laptop i  dokumentaciju."
        ]);

        Kategorija::create([
            "naziv" => "Elegantne tašne",
            "opis" => "Tašne pogodne za svaku svečanu priliku. Minimalističkog izgleda. Savršeno idu uz svaku kombinaciju."
        ]);

        Kategorija::create([
            "naziv" => "Svakodnevne tašne",
            "opis" => "Tašne pogodne za svakodnevne aktivnosti. Razne veličine i modeli. Jednostavnog dizajna."
        ]);
    }
}
