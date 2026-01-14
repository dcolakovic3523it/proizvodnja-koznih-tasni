<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Narudzbina;

class NarudzbinaController extends Controller
{
    // Lista
    public function index()
    {
        $narudzbine = Narudzbina::with('user')->get();
        return view('admin.narudzbine.index', compact('narudzbine'));
    }

    // Dodaj
    public function create()
    {
        return view('admin.narudzbine.create');
    }

    // Cuvanje
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'ukupna_cena' => 'required|numeric|min:0',
            'status' => 'required|string',
        ]);

        Narudzbina::create($request->all());
        return redirect()->route('admin.narudzbine.index')->with('success', 'Narudžbina je uspešno dodata.');
    }

    // Izmena
    public function edit(Narudzbina $narudzbina)
    {
        return view('admin.narudzbine.edit', compact('narudzbina'));
    }

    // Cuvanje
    public function update(Request $request, Narudzbina $narudzbina)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'ukupna_cena' => 'required|numeric|min:0',
            'status' => 'required|string',
        ]);

        $narudzbina->update($request->all());
        return redirect()->route('admin.narudzbine.index')->with('success', 'Narudžbina je uspešno izmenjena.');
    }

    // Brisanje
    public function destroy(Narudzbina $narudzbina)
    {
        $narudzbina->delete();
        return redirect()->route('admin.narudzbine.index')->with('success', 'Narudžbina je uspešno obrisana.');
    }
}
