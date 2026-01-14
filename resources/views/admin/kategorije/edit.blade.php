@extends('layouts.admin')

@section('title', 'Izmeni Kategoriju')

@section('content')
<div class="container py-5">
    <h1 class="mb-4" style="color: #561C24; font-family: 'Poppins', sans-serif;">Izmeni kategoriju</h1>

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
    <form action="{{ route('admin.kategorije.update', $kategorija->id) }}" 
          method="POST" 
          style="background-color: #F5F1EC; padding: 30px; border-radius: 12px;">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="naziv" class="form-label" style="color: #561C24;">Naziv kategorije</label>
            <input type="text" name="naziv" 
                   class="form-control rounded-3" 
                   style="background-color: #ffffff; color: #561C24; border: 1px solid #561C24;"
                   value="{{ old('naziv', $kategorija->naziv) }}" required>
        </div>

        <div class="mb-3">
            <label for="opis" class="form-label" style="color: #561C24;">Opis kategorije</label>
            <textarea name="opis" class="form-control rounded-3" rows="3" 
                      style="background-color: #ffffff; color: #561C24; border: 1px solid #561C24;">{{ old('opis', $kategorija->opis) }}</textarea>
        </div>

        <button type="submit" class="btn btn-danger rounded-3 me-2">Sačuvaj izmene</button>
        <a href="{{ route('admin.kategorije.index') }}" class="btn btn-secondary rounded-3">Otkaži</a>
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
