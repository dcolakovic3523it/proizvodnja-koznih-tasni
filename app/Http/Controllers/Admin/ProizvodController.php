<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Proizvod;
use App\Models\Kategorija;
use Illuminate\Http\Request;

class ProizvodController extends Controller
{

    // Lista proizvoda
    public function index()
    {
        $proizvodi = Proizvod::with('kategorija')->get();
        return view('admin.proizvodi.index', compact('proizvodi'));
    }

    // Dodavanje
    public function create()
    {
        $kategorije = Kategorija::all();
        return view('admin.proizvodi.create', compact('kategorije'));
    }

    // Cuvanje novog proizvoda
    public function store(Request $request)
    {
        $request->validate([
            'naziv' => 'required|string|max:255',
            'opis' => 'required|string',
            'cena' => 'required|numeric|min:0',
            'kategorija_id' => 'required|exists:kategorijas,id',
            'stanje' => 'required|boolean',
            'slika' => 'nullable|image',
        ]);

        $data = $request->all();

        if($request->hasFile('slika')) {
            $data['slika'] = $request->file('slika')->store('proizvodi', 'public');
        }

        Proizvod::create($data);
        return redirect()->route('admin.proizvodi.index')->with('success', 'Proizvod je uspešno dodat.');
    }

    // Izmena
    public function edit(Proizvod $proizvod)
    {
        $kategorije = Kategorija::all();
        return view('admin.proizvodi.edit', compact('proizvod', 'kategorije'));
    }

    // Cuvanje izmena
    public function update(Request $request, Proizvod $proizvod)
    {
        $request->validate([
            'naziv' => 'required|string|max:255',
            'opis' => 'required|string',
            'cena' => 'required|numeric|min:0',
            'kategorija_id' => 'required|exists:kategorijas,id',
            'stanje' => 'required|boolean',
            'slika' => 'nullable|image',
        ]);

        $data = $request->all();

        $proizvod->update($data);
        return redirect()->route('admin.proizvodi.index')->with('success', 'Proizvod je uspešno izmenjen.');
    }

    // Brisanje
    public function destroy(Proizvod $proizvod)
    {
        $proizvod->delete();
        return redirect()->route('admin.proizvodi.index')->with('success', 'Proizvod je uspešno obrisan.');
    }


}