<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProizvodStoreRequest;
use App\Http\Requests\ProizvodUpdateRequest;
use App\Models\Proizvod;
use App\Models\Kategorija;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProizvodController extends Controller
{

    // Katalog - use case
    public function index(Request $request): View
    {
        $proizvods = Proizvod::all();

        return view('proizvod.index', [
            'proizvods' => $proizvods,
        ]);
    }

    // Dodavanje proizvoda
    public function create(Request $request): View
    {
        return view('proizvod.create');
    }

    // Cuvanje u bazu
    public function store(ProizvodStoreRequest $request): RedirectResponse
    {
        Proizvod::create($request->validated());
        return redirect()->route('proizvods.index')->with('success', 'Proizvod je uspešno dodat.');
    }

    // Jedan proizvod
    public function show(Request $request, Proizvod $proizvod): View
    {
        return view('proizvod.show', [
            'proizvod' => $proizvod,
        ]);
    }

    // Izmena
    public function edit(Request $request, Proizvod $proizvod): View
    {
        return view('proizvod.edit', [
            'proizvod' => $proizvod,
        ]);
    }

    // Azuriranje
    public function update(ProizvodUpdateRequest $request, Proizvod $proizvod): RedirectResponse
    {
        $proizvod->update($request->validated());
        return redirect()->route('proizvods.index')->with('success', 'Proizvod je uspešno izmenjen.');
    }

    // Brisanje
    public function destroy(Request $request, Proizvod $proizvod): RedirectResponse
    {
        $proizvod->delete();
        return redirect()->route('proizvods.index')->with('success', 'Proizvod je uspešno obrisan.');
    }

    
}
