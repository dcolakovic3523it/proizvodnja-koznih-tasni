@extends('layouts.app')

@section('title', 'Detalji narudžbine')

@section('content')
<div class="container py-5">
    <h2>Narudžbina #{{ $narudzbina->id }}</h2>
    <p>Status: {{ $narudzbina->status }}</p>
    <p>Ukupno: {{ number_format($narudzbina->ukupno, 2, ',', '.') }} RSD</p>
    <p>Adresa: {{ $narudzbina->address }}</p>
    <p>Telefon: {{ $narudzbina->phone }}</p>

    <h4>Stavke:</h4>
    <ul>
        @foreach($narudzbina->stavke as $stavka)
            <li>
                {{ $stavka->naziv }} - {{ $stavka->kolicina }} x {{ number_format($stavka->cena, 2, ',', '.') }} RSD
            </li>
        @endforeach
    </ul>

    <a href="{{ route('narudzbinas.index') }}" class="btn btn-secondary mt-3">Nazad na narudžbine</a>
</div>
@endsection
