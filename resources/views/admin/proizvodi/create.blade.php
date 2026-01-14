@extends('layouts.app')

@section('title', 'Dodaj Proizvod')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Dodaj novi proizvod</h1>

    {{-- Prikaz grešaka --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error) 
                    <li>{{ $error }}</li> 
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Forma za dodavanje --}}
    <form action="{{ route('admin.proizvodi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="naziv" class="form-label">Naziv proizvoda</label>
            <input type="text" name="naziv" class="form-control" value="{{ old('naziv') }}" required>
        </div>

        <div class="mb-3">
            <label for="cena" class="form-label">Cena (RSD)</label>
            <input type="number" step="0.01" name="cena" class="form-control" value="{{ old('cena') }}" required>
        </div>

        <div class="mb-3">
            <label for="kategorija_id" class="form-label">Kategorija</label>
            <select name="kategorija_id" class="form-select" required>
                <option value="">-- Izaberite kategoriju --</option>
                @foreach($kategorije as $kategorija)
                    <option value="{{ $kategorija->id }}" {{ old('kategorija_id') == $kategorija->id ? 'selected' : '' }}>
                        {{ $kategorija->naziv }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="opis" class="form-label">Opis proizvoda</label>
            <textarea name="opis" class="form-control" rows="3">{{ old('opis') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="stanje" class="form-label">Stanje</label>
            <select name="stanje" class="form-select" required>
                <option value="1" {{ old('stanje', 1) == 1 ? 'selected' : '' }}>Na stanju</option>
                <option value="0" {{ old('stanje') === 0 ? 'selected' : '' }}>Nije na stanju</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="slika" class="form-label">Slika proizvoda</label>
            <input type="file" name="slika" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Sačuvaj</button>
        <a href="{{ route('admin.proizvodi.index') }}" class="btn btn-secondary">Otkaži</a>
    </form>
</div>
@endsection
