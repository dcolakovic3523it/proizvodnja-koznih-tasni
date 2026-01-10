<?php

namespace App\Http\Controllers;

use App\Http\Requests\KategorijaStoreRequest;
use App\Http\Requests\KategorijaUpdateRequest;
use App\Models\Kategorija;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KategorijaController extends Controller
{
    // Lista kategorija
    public function index(Request $request): View
    {
        $kategorijas = Kategorija::all();

        return view('kategorija.index', [
            'kategorijas' => $kategorijas,
        ]);
    }

    // Dodavanje
    public function create(Request $request): View
    {
        return view('kategorija.create');
    }

    // Cuvanje
    public function store(KategorijaStoreRequest $request): RedirectResponse
    {
        Kategorija::create($request->validated());
        return redirect()->route('kategorijas.index')->with('success', 'Kategorija je uspešno dodata.');
    }

    // Jedna kategorija
    public function show(Request $request, Kategorija $kategorija): View
    {
        return view('kategorija.show', [
            'kategorija' => $kategorija,
        ]);
    }

    // Izmena
    public function edit(Request $request, Kategorija $kategorija): View
    {
        return view('kategorija.edit', [
            'kategorija' => $kategorija,
        ]);
    }

    // Azuriranje
    public function update(KategorijaUpdateRequest $request, Kategorija $kategorija): RedirectResponse
    {
        $kategorija->update($request->validated());
        return redirect()->route('kategorijas.index')->with('success', 'Kategorija je uspešno izmenjena.');
    }

    // Brisanje
    public function destroy(Request $request, Kategorija $kategorija): RedirectResponse
    {
        $kategorija->delete();
        return redirect()->route('kategorijas.index')->with('success', 'Kategorija je uspešno obrisana.');
    }
}
