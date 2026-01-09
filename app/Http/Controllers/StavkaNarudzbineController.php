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
    public function index(Request $request): Response
    {
        $stavkaNarudzbines = StavkaNarudzbine::all();

        return view('stavkaNarudzbine.index', [
            'stavkaNarudzbines' => $stavkaNarudzbines,
        ]);
    }

    public function create(Request $request): Response
    {
        return view('stavkaNarudzbine.create');
    }

    public function store(StavkaNarudzbineStoreRequest $request): Response
    {
        $stavkaNarudzbine = StavkaNarudzbine::create($request->validated());

        $request->session()->flash('stavkaNarudzbine.id', $stavkaNarudzbine->id);

        return redirect()->route('stavkaNarudzbines.index');
    }

    public function show(Request $request, StavkaNarudzbine $stavkaNarudzbine): Response
    {
        return view('stavkaNarudzbine.show', [
            'stavkaNarudzbine' => $stavkaNarudzbine,
        ]);
    }

    public function edit(Request $request, StavkaNarudzbine $stavkaNarudzbine): Response
    {
        return view('stavkaNarudzbine.edit', [
            'stavkaNarudzbine' => $stavkaNarudzbine,
        ]);
    }

    public function update(StavkaNarudzbineUpdateRequest $request, StavkaNarudzbine $stavkaNarudzbine): Response
    {
        $stavkaNarudzbine->update($request->validated());

        $request->session()->flash('stavkaNarudzbine.id', $stavkaNarudzbine->id);

        return redirect()->route('stavkaNarudzbines.index');
    }

    public function destroy(Request $request, StavkaNarudzbine $stavkaNarudzbine): Response
    {
        $stavkaNarudzbine->delete();

        return redirect()->route('stavkaNarudzbines.index');
    }
}
