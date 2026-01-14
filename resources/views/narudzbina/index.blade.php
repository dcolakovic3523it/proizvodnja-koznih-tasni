@extends('layouts.app')

@section('title', 'Moje narudžbine')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Moje narudžbine</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($narudzbinas->isEmpty())
        <p>Još niste napravili nijednu narudžbinu.</p>
    @else
        @foreach($narudzbinas as $narudzbina)
            <div class="card mb-3 p-3">
                <p><strong>Porudžbina ID:</strong> {{ $narudzbina->id }}</p>
                <p><strong>Status:</strong> {{ $narudzbina->status }}</p>
                <p><strong>Ukupno:</strong> {{ number_format($narudzbina->ukupno, 2, ',', '.') }} RSD</p>
                <a href="{{ route('narudzbinas.show', $narudzbina->id) }}" class="btn btn-primary btn-sm">Prikaži stavke</a>
            </div>
        @endforeach
    @endif
</div>
@endsection
