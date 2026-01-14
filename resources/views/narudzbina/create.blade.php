@extends('layouts.app')

@section('title', 'Kreiranje narudžbine')

@section('content')
<div class="container py-5">
    <h2 class="mb-4" style="color: #561C24; font-family: 'Poppins', sans-serif;">Vaša korpa</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if(empty($korpa))
        <p>Vaša korpa je prazna.</p>
    @else
        <div class="table-responsive mb-4" style="background-color: #F5F1EC; border-radius: 12px; padding: 15px;">
            <table class="table align-middle mb-0">
                <thead style="background-color: #561C24; color: #fff; border-radius: 12px;">
                    <tr>
                        <th>Slika</th>
                        <th>Naziv</th>
                        <th>Cena</th>
                        <th>Količina</th>
                        <th>Ukupno</th>
                        <th>Akcija</th>
                    </tr>
                </thead>
                <tbody>
                    @php $ukupno = 0; @endphp
                    @foreach($korpa as $id => $stavka)
                        @php $ukupno += $stavka['cena'] * $stavka['kolicina']; @endphp
                        <tr>
                            <td>
                                <img src="{{ asset('images/' . $stavka['slika']) }}" style="max-width:80px;" alt="{{ $stavka['naziv'] }}" class="rounded">
                            </td>
                            <td>{{ $stavka['naziv'] }}</td>
                            <td>{{ number_format($stavka['cena'],2,',','.') }} RSD</td>
                            <td>{{ $stavka['kolicina'] }}</td>
                            <td>{{ number_format($stavka['cena'] * $stavka['kolicina'],2,',','.') }} RSD</td>
                            <td>
                                <form method="POST" action="{{ route('korpa.ukloni', $id) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm rounded-3">Obriši</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4" class="text-end fw-bold">Ukupno:</td>
                        <td class="fw-bold">{{ number_format($ukupno,2,',','.') }} RSD</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Forma za placanje --}}
        <form method="POST" action="{{ route('narudzbinas.store') }}" style="background-color: #F5F1EC; padding: 25px; border-radius: 12px;">
            @csrf

            <div class="mb-3">
                <input type="text" name="full_name" class="form-control rounded-3" placeholder="Ime i prezime" style="border: 1px solid #561C24; color: #561C24;" required>
            </div>
            <div class="mb-3">
                <input type="text" name="address" class="form-control rounded-3" placeholder="Adresa" style="border: 1px solid #561C24; color: #561C24;" required>
            </div>
            <div class="mb-3">
                <input type="text" name="phone" class="form-control rounded-3" placeholder="Telefon" style="border: 1px solid #561C24; color: #561C24;" required>
            </div>

            <button type="submit" class="btn btn-danger rounded-3">Plati</button>
        </form>
    @endif
</div>

<style>
    body {
        font-family: 'Poppins', sans-serif;
    }
    .btn-danger {
        background-color: #561C24;
        border-color: #561C24;
        color: #fff;
    }
    .btn-danger:hover {
        background-color: #44151c;
        border-color: #44151c;
        color: #fff;
    }
</style>
@endsection
