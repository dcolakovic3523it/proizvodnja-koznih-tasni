<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategorija;

class KategorijaController extends Controller
{
    // Lista kategorija
    public function index()
    {
        $kategorije = Kategorija::all();
        return view('admin.kategorije.index', compact('kategorije'));
    }

    // Dodaj
    public function create()
    {
        return view('admin.kategorije.create');
    }

    // Cuvanje nove kategorije
    public function store(Request $request)
    {
        $request->validate([
            'naziv' => 'required|string|max:255',
            'opis' => 'required|string',
        ]);

        Kategorija::create($request->all());

        return redirect()->route('admin.kategorije.index')->with('success', 'Kategorija je uspešno dodata.');
    }

    // Izmena
    public function edit(Kategorija $kategorija)
    {
        return view('admin.kategorije.edit', compact('kategorija'));
    }

    // Cuvanje izmene
    public function update(Request $request, Kategorija $kategorija)
    {
        $request->validate([
            'naziv' => 'required|string|max:255',
            'opis' => 'required|string',
        ]);

        $kategorija->update($request->all());

        return redirect()->route('admin.kategorije.index')->with('success', 'Kategorija je uspešno izmenjena.');
    }

    // Brisanje
    public function destroy(Kategorija $kategorija)
    {
        $kategorija->delete();
        return redirect()->route('admin.kategorije.index')->with('success', 'Kategorija je uspešno obrisana.');
    }
}
