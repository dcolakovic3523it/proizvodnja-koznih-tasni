@extends('layouts.app')

@section('title', 'Detalji narudžbine')

@section('content')
<div class="container py-5">
    <h2 class="mb-4" style="color: #561C24; font-family: 'Poppins', sans-serif;">
        Narudžbina #{{ $narudzbina->id }}
    </h2>

    <div class="mb-4" style="background-color: #F5F1EC; padding: 20px; border-radius: 12px;">
        <p><strong>Status:</strong> {{ $narudzbina->status }}</p>
        <p><strong>Ukupna cena:</strong> {{ number_format($narudzbina->ukupna_cena, 2, ',', '.') }} RSD</p>
        <p><strong>Ime i prezime:</strong> {{ $narudzbina->full_name }}</p>
        <p><strong>Adresa:</strong> {{ $narudzbina->address }}</p>
        <p><strong>Telefon:</strong> {{ $narudzbina->phone }}</p>
        <p><strong>Datum:</strong> {{ $narudzbina->created_at->format('d.m.Y H:i') }}</p>
    </div>

    <h4 class="mb-3" style="color: #561C24;">Stavke narudžbine</h4>

    @if($narudzbina->stavke->isEmpty())
        <p>Ova narudžbina nema stavke.</p>
    @else
        <div class="table-responsive">
            <table class="table align-middle" style="background-color: #F5F1EC; border-radius: 12px; overflow: hidden;">
                <thead class="text-white" style="background-color: #561C24;">
                    <tr>
                        <th>Slika</th>
                        <th>Naziv</th>
                        <th>Cena</th>
                        <th>Količina</th>
                        <th>Ukupno</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($narudzbina->stavke as $stavka)
                        <tr>
                            <td>
                                @if($stavka->slika)
                                    <img src="{{ asset('storage/' . $stavka->slika) }}" alt="{{ $stavka->naziv }}" width="80" class="rounded">
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $stavka->naziv }}</td>
                            <td>{{ number_format($stavka->cena, 2, ',', '.') }} RSD</td>
                            <td>{{ $stavka->kolicina }}</td>
                            <td>{{ number_format($stavka->cena * $stavka->kolicina, 2, ',', '.') }} RSD</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <a href="{{ route('narudzbinas.index') }}" class="btn btn-danger mt-4 rounded-3">Nazad na narudžbine</a>
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
    table th, table td {
        vertical-align: middle;
    }
</style>
@endsection
