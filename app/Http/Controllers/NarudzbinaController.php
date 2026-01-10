<?php

namespace App\Http\Controllers;

use App\Http\Requests\NarudzbinaStoreRequest;
use App\Http\Requests\NarudzbinaUpdateRequest;
use App\Models\Narudzbina;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class NarudzbinaController extends Controller
{
    // Lista
    public function index(Request $request): View
    {
        $narudzbinas = Narudzbina::all();

        return view('narudzbina.index', [
            'narudzbinas' => $narudzbinas,
        ]);
    }

    // Dodavanje
    public function create(Request $request): View
    {
        return view('narudzbina.create');
    }

    // Use case - kreiranje narudžbine
    public function store(NarudzbinaStoreRequest $request): RedirectResponse
    {
        $narudzbina = Narudzbina::create([
            'user_id' => Auth::id(),
            'status' => 'Kreirana.',
        ]);

        return redirect()->route('narudzbinas.index')->with('success', 'Narudžbina je uspešno kreirana.');
    }

    // Jedna narudzbina
    public function show(Request $request, Narudzbina $narudzbina): View
    {
        return view('narudzbina.show', [
            'narudzbina' => $narudzbina,
        ]);
    }

    // Izmena 
    public function edit(Request $request, Narudzbina $narudzbina): View
    {
        return view('narudzbina.edit', [
            'narudzbina' => $narudzbina,
        ]);
    }

    // Azuriranje
    public function update(NarudzbinaUpdateRequest $request, Narudzbina $narudzbina): RedirectResponse
    {
        $narudzbina->update($request->validated());
        return redirect()->route('narudzbinas.index')->with('success', 'Narudžbina je uspešno izmenjena.');
    }

    // Brisanje
    public function destroy(Request $request, Narudzbina $narudzbina): RedirectResponse
    {
        $narudzbina->delete();
        return redirect()->route('narudzbinas.index')->with('success', 'Narudžbina je uspešno izbrisana.');
    }

    // Use case - prikaz narudzbine prijavljenog korisnika
    public function mojeNarudzbine(): View
    {
        $narudzbinas = Narudzbina::where(
            'user_id',
            Auth::id()
        )->get();

        return view('narudzbina.moja', [
            'narudzbinas' => $narudzbinas,
        ]);
    }
}
