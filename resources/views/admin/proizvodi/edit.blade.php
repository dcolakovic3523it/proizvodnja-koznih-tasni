@extends('layouts.admin')

@section('title', 'Izmeni Proizvod')

@section('content')
<div class="container py-5">
    <h1 class="mb-4" style="color: #561C24; font-family: 'Poppins', sans-serif;">Izmeni proizvod</h1>

    {{-- Prikaz grešaka --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error) 
                    <li>{{ $error }}</li> 
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Forma za izmenu --}}
    <form action="{{ route('admin.proizvodi.update', $proizvod->id) }}" 
          method="POST" 
          enctype="multipart/form-data"
          style="background-color: #F5F1EC; padding: 30px; border-radius: 12px;">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="naziv" class="form-label" style="color: #561C24;">Naziv proizvoda</label>
            <input type="text" 
                   name="naziv" 
                   class="form-control rounded-3" 
                   style="background-color: #ffffff; color: #561C24; border: 1px solid #561C24;"
                   value="{{ old('naziv', $proizvod->naziv) }}" 
                   required>
        </div>

        <div class="mb-3">
            <label for="cena" class="form-label" style="color: #561C24;">Cena (RSD)</label>
            <input type="number" 
                   step="0.01" 
                   name="cena" 
                   class="form-control rounded-3" 
                   style="background-color: #ffffff; color: #561C24; border: 1px solid #561C24;"
                   value="{{ old('cena', $proizvod->cena) }}" 
                   required>
        </div>

        <div class="mb-3">
            <label for="kategorija_id" class="form-label" style="color: #561C24;">Kategorija</label>
            <select name="kategorija_id" class="form-select rounded-3" 
                    style="background-color: #ffffff; color: #561C24; border: 1px solid #561C24;" 
                    required>
                <option value="">-- Izaberite kategoriju --</option>
                @foreach($kategorije as $kategorija)
                    <option value="{{ $kategorija->id }}"
                        {{ old('kategorija_id', $proizvod->kategorija_id) == $kategorija->id ? 'selected' : '' }}>
                        {{ $kategorija->naziv }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="opis" class="form-label" style="color: #561C24;">Opis proizvoda</label>
            <textarea name="opis" class="form-control rounded-3" rows="3" 
                      style="background-color: #ffffff; color: #561C24; border: 1px solid #561C24;">{{ old('opis', $proizvod->opis) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="stanje" class="form-label" style="color: #561C24;">Stanje</label>
            <select name="stanje" class="form-select rounded-3" 
                    style="background-color: #ffffff; color: #561C24; border: 1px solid #561C24;" 
                    required>
                <option value="1" {{ old('stanje', $proizvod->stanje) == 1 ? 'selected' : '' }}>
                    Na stanju
                </option>
                <option value="0" {{ old('stanje', $proizvod->stanje) == 0 ? 'selected' : '' }}>
                    Nije na stanju
                </option>
            </select>
        </div>

        <div class="mb-3">
            <label for="slika" class="form-label" style="color: #561C24;">Slika proizvoda</label>

            @if($proizvod->slika)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $proizvod->slika) }}" width="120" class="img-thumbnail rounded-3">
                </div>
            @endif

            <input type="file" name="slika" class="form-control rounded-3">
            <small class="text-muted">Ostavite prazno ako ne želite da menjate sliku.</small>
        </div>

        <button type="submit" class="btn btn-danger rounded-3 me-2">Sačuvaj izmene</button>
        <a href="{{ route('admin.proizvodi.index') }}" class="btn btn-secondary rounded-3">Otkaži</a>
    </form>
</div>

<style>
    .btn-danger {
        background-color: #561C24;
        border-color: #561C24;
    }
    .btn-danger:hover {
        background-color: #44151c;
        border-color: #44151c;
    }
</style>
@endsection
