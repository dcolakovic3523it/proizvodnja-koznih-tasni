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
        $narudzbinas = Narudzbina::where('user_id', Auth::id())->latest()->get();

        return view('narudzbina.index', [
            'narudzbinas' => $narudzbinas,
        ]);
    }

    // Dodavanje
    public function create()
    {
        $korpa = session('korpa', []);
        return view('narudzbina.create', compact ('korpa'));
    }

    // Use case - kreiranje narudžbine
    public function store (NarudzbinaStoreRequest $request) : RedirectResponse
    {
        $korpa = session('korpa', []);

        if(empty($korpa)) {
            return redirect()->back()->with('error', 'Korpa je prazna.');
        }

        $ukupno = 0;
        foreach($korpa as $stavka) {
            $ukupno += $stavka['cena'] * $stavka['kolicina'];
        }

        // Kreiranje narudzbine
        $narudzbina = Narudzbina::create([
            'user_id' => Auth::id(),
            'status' => 'Na cekanju',
            'ukupna_cena' => $ukupno,
            'full_name' => $request->full_name ?? '',
            'address' => $request->address ?? '',
            'phone' => $request->phone ?? '',
        ]);

        // Dodavanje stavki
        foreach($korpa as $proizvodId => $stavka) {
            $narudzbina->stavke()->create([
                'proizvod_id' => $proizvodId,
                'naziv' => $stavka['naziv'],
                'cena' => $stavka['cena'],
                'slika' => $stavka['slika'] ?? null,
                'kolicina' => $stavka['kolicina'],
            ]);
        }

        // Ciscenje korpe
        session()->forget('korpa');
        return redirect()->route('narudzbinas.index')->with('success', 'Narudzbina je uspesno kreirana!');
    }


    // Jedna narudzbina
    public function show(Request $request, Narudzbina $narudzbina): View
    {
        if($narudzbina->user_id !== Auth::id()) {
            abort(403); // sigurnosna provera
        }

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

}
