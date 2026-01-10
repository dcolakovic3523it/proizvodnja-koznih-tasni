<?php

namespace App\Http\Controllers;

use App\Http\Requests\StavkaNarudzbineStoreRequest;
use App\Http\Requests\StavkaNarudzbineUpdateRequest;
use App\Models\StavkaNarudzbine;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StavkaNarudzbineController extends Controller
{
    // Lista stavki
    public function index(Request $request): View
    {
        $stavkaNarudzbines = StavkaNarudzbine::all();

        return view('stavkaNarudzbine.index', [
            'stavkaNarudzbines' => $stavkaNarudzbines,
        ]);
    }

    // Dodavanje
    public function create(Request $request): View
    {
        return view('stavkaNarudzbine.create');
    }

    // Cuvanje
    public function store(StavkaNarudzbineStoreRequest $request): RedirectResponse
    {
        StavkaNarudzbine::create($request->validated());
        return redirect()->route('stavkaNarudzbines.index')->with('success', 'Stavka je uspešno sačuvana.');
    }

    // Jedna stavka
    public function show(Request $request, StavkaNarudzbine $stavkaNarudzbine): View
    {
        return view('stavkaNarudzbine.show', [
            'stavkaNarudzbine' => $stavkaNarudzbine,
        ]);
    }

    // Izmena
    public function edit(Request $request, StavkaNarudzbine $stavkaNarudzbine): View
    {
        return view('stavkaNarudzbine.edit', [
            'stavkaNarudzbine' => $stavkaNarudzbine,
        ]);
    }

    // Azuriranje
    public function update(StavkaNarudzbineUpdateRequest $request, StavkaNarudzbine $stavkaNarudzbine): RedirectResponse
    {
        $stavkaNarudzbine->update($request->validated());
        return redirect()->route('stavkaNarudzbines.index')->with('success', 'Stavka je uspešno izmenjena.');
    }

    // Brisanje
    public function destroy(Request $request, StavkaNarudzbine $stavkaNarudzbine): RedirectResponse
    {
        $stavkaNarudzbine->delete();
        return redirect()->route('stavkaNarudzbines.index')->with('success', 'Stavka je uspešno izbrisana.');
    }
}
