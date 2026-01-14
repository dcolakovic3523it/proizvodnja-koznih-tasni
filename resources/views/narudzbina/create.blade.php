@extends('layouts.app')

@section('title', 'Kreiranje narudžbine')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Vaša korpa</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if(empty($korpa))
        <p>Vaša korpa je prazna.</p>
    @else
        <table class="table table-bordered mb-4">
            <thead>
                <tr>
                    <th>Slika</th>
                    <th>Naziv</th>
                    <th>Cena</th>
                    <th>Količina</th>
                    <th>Ukupno</th>
                </tr>
            </thead>
            <tbody>
                @php $ukupno = 0; @endphp
                @foreach($korpa as $id => $stavka)
                    @php $ukupno += $stavka['cena'] * $stavka['kolicina']; @endphp
                    <tr>
                        <td>
                            <img src="{{ asset('images/' . $stavka['slika']) }}" style="max-width:80px;" alt="{{ $stavka['naziv'] }}">
                        </td>
                        <td>{{ $stavka['naziv'] }}</td>
                        <td>{{ number_format($stavka['cena'],2,',','.') }} RSD</td>
                        <td>{{ $stavka['kolicina'] }}</td>
                        <td>{{ number_format($stavka['cena'] * $stavka['kolicina'],2,',','.') }} RSD</td>
                    </tr>
                    <form method="POST" action="{{ route('korpa.ukloni', $id) }}">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm mb-3">Obriši</button>
                    </form>
                @endforeach
                <tr>
                    <td colspan="4" class="text-end fw-bold">Ukupno:</td>
                    <td class="fw-bold">{{ number_format($ukupno,2,',','.') }} RSD</td>
                </tr>
            </tbody>
        </table>

        {{-- Forma za placanje --}}
        <form method="POST" action="{{ route('narudzbinas.store') }}">
            @csrf
            {{-- Ako želiš da dodaš ime, adresu, telefon --}}
            <div class="mb-3">
                <input type="text" name="full_name" class="form-control" placeholder="Ime i prezime" required>
            </div>
            <div class="mb-3">
                <input type="text" name="address" class="form-control" placeholder="Adresa" required>
            </div>
            <div class="mb-3">
                <input type="text" name="phone" class="form-control" placeholder="Telefon" required>
            </div>

            <button type="submit" class="btn btn-success">
                Plati
            </button>
        </form>
    @endif
</div>
@endsection
