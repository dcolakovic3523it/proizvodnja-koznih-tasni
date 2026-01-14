@extends('layouts.admin')

@section('title', 'Izmeni Narudžbinu')

@section('content')
<div class="container py-5">
    <h1 class="mb-4" style="color: #561C24; font-family: 'Poppins', sans-serif;">Izmeni narudžbinu #{{ $narudzbina->id }}</h1>

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

    <form action="{{ route('admin.narudzbine.update', $narudzbina->id) }}" method="POST" style="background-color: #F5F1EC; padding: 30px; border-radius: 12px;">
        @csrf
        @method('PUT')

        {{-- Korisnik --}}
        <div class="mb-3">
            <label for="user_id" class="form-label" style="color: #561C24;">Korisnik (ID)</label>
            <input type="number" name="user_id" 
                   class="form-control rounded-3" 
                   style="background-color: #ffffff; color: #561C24; border: 1px solid #561C24;"
                   value="{{ old('user_id', $narudzbina->user_id) }}" required>
        </div>

        {{-- Ukupna cena --}}
        <div class="mb-3">
            <label for="ukupna_cena" class="form-label" style="color: #561C24;">Ukupna cena (RSD)</label>
            <input type="number" step="0.01" name="ukupna_cena" 
                   class="form-control rounded-3" 
                   style="background-color: #ffffff; color: #561C24; border: 1px solid #561C24;"
                   value="{{ old('ukupna_cena', $narudzbina->ukupna_cena) }}" required>
        </div>

        {{-- Status --}}
        <div class="mb-3">
            <label for="status" class="form-label" style="color: #561C24;">Status</label>
            <input type="text" name="status" 
                   class="form-control rounded-3" 
                   style="background-color: #ffffff; color: #561C24; border: 1px solid #561C24;"
                   value="{{ old('status', $narudzbina->status) }}" required>
        </div>

        <button type="submit" class="btn btn-danger rounded-3 me-2">Sačuvaj</button>
        <a href="{{ route('admin.narudzbine.index') }}" class="btn btn-secondary rounded-3">Otkaži</a>
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
