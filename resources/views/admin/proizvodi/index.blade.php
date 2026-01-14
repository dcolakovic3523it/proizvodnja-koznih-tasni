@extends('layouts.admin')

@section('title', 'Proizvodi')

@section('content')
<div class="container py-5">
    <h1 class="mb-4" style="color: #561C24; font-family: 'Poppins', sans-serif;">Lista proizvoda</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3">
        <a href="{{ route('admin.proizvodi.create') }}" class="btn btn-danger btn-sm">
            Dodaj novi proizvod
        </a>
    </div>

    <div class="table-responsive">
        <table class="table align-middle" style="background-color: #F5F1EC; border-radius: 12px; overflow: hidden;">
            <thead class="text-white" style="background-color: #561C24;">
                <tr>
                    <th>ID</th>
                    <th>Naziv</th>
                    <th>Kategorija</th>
                    <th>Cena</th>
                    <th>Opis</th>
                    <th>Stanje</th>
                    <th>Slika</th>
                    <th>Akcije</th>
                </tr>
            </thead>
            <tbody>
                @forelse($proizvodi as $proizvod)
                    <tr>
                        <td>{{ $proizvod->id }}</td>
                        <td>{{ $proizvod->naziv }}</td>
                        <td>{{ $proizvod->kategorija->naziv ?? '-' }}</td>
                        <td>{{ number_format($proizvod->cena, 2, ',', '.') }} RSD</td>
                        <td>{{ $proizvod->opis }}</td>
                        <td>{{ $proizvod->stanje ? 'Na stanju' : 'Nije na stanju' }}</td>
                        <td>
                            @if($proizvod->slika)
                                <img src="{{ asset('storage/' . $proizvod->slika) }}" alt="{{ $proizvod->naziv }}" width="80" class="rounded">
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.proizvodi.edit', $proizvod->id) }}" class="btn btn-danger btn-sm mb-1">Izmeni</a>

                            <form action="{{ route('admin.proizvodi.destroy', $proizvod->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Da li ste sigurni da želite da obrišete ovaj proizvod?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Obriši</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">Nema proizvoda</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<style>
    body {
        font-family: 'Poppins', sans-serif;
    }
    table th, table td {
        vertical-align: middle;
    }
    .table thead th {
        font-weight: 600;
    }
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
