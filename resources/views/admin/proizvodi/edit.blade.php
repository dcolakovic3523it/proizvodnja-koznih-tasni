@extends('layouts.app')

@section('title', 'Izmeni Proizvod')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Izmeni proizvod</h1>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('admin.proizvodi-update', $proizvod->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- @method('PUT') nije potreban jer tvoja ruta koristi POST --}}

        <div class="mb-3">
            <label for="naziv" class="form-label">Naziv proizvoda</label>
            <input type="text" name="naziv" class="form-control" value="{{ old('naziv', $proizvod->naziv) }}" required>
        </div>

        <div class="mb-3">
            <label for="sifra" class="form-label">Šifra</label>
            <input type="text" name="sifra" class="form-control" value="{{ old('sifra', $proizvod->sifra) }}" required>
        </div>

        <div class="mb-3">
            <label for="cena" class="form-label">Cena (RSD)</label>
            <input type="number" step="0.01" name="cena" class="form-control" value="{{ old('cena', $proizvod->cena) }}" required>
        </div>

        <div class="mb-3">
            <label for="kategorija_id" class="form-label">Kategorija</label>
            <select name="kategorija_id" class="form-select" required>
                @foreach($kategorije as $kategorija)
                    <option value="{{ $kategorija->id }}" {{ old('kategorija_id', $proizvod->kategorija_id) == $kategorija->id ? 'selected' : '' }}>
                        {{ $kategorija->naziv }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="opis" class="form-label">Opis proizvoda</label>
            <textarea name="opis" class="form-control" rows="3" required>{{ old('opis', $proizvod->opis) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="stanje" class="form-label">Stanje</label>
            <select name="stanje" class="form-select" required>
                <option value="1" {{ old('stanje', $proizvod->stanje) == 1 ? 'selected' : '' }}>Na stanju</option>
                <option value="0" {{ old('stanje', $proizvod->stanje) == 0 ? 'selected' : '' }}>Nije na stanju</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="slika" class="form-label">Slika proizvoda</label>
            <input type="file" name="slika" class="form-control">
            @if($proizvod->slika)
                <p class="mt-2">Trenutna slika:</p>
                <img src="{{ asset('storage/' . $proizvod->slika) }}" alt="{{ $proizvod->naziv }}" width="120">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Sačuvaj izmene</button>
        <a href="{{ route('admin.proizvodi-list') }}" class="btn btn-secondary">Otkaži</a>
    </form>
</div>
@endsection
