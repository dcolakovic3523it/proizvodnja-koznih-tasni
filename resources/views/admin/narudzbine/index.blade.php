@extends('layouts.admin')

@section('title', 'Narudžbine')

@section('content')
<div class="container py-5">
    <h1 class="mb-4" style="color: #561C24; font-family: 'Poppins', sans-serif;">Lista narudžbina</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3">
        <a href="{{ route('admin.narudzbine.create') }}" class="btn btn-danger btn-sm">
            Dodaj novu narudžbinu
        </a>
    </div>

    <div class="table-responsive">
        <table class="table align-middle" style="background-color: #F5F1EC; border-radius: 12px; overflow: hidden;">
            <thead class="text-white" style="background-color: #561C24;">
                <tr>
                    <th>ID</th>
                    <th>Korisnik</th>
                    <th>Ukupna cena</th>
                    <th>Status</th>
                    <th>Akcije</th>
                </tr>
            </thead>
            <tbody>
                @forelse($narudzbine as $narudzbina)
                    <tr>
                        <td>{{ $narudzbina->id }}</td>
                        <td>{{ $narudzbina->user->name ?? '-' }}</td>
                        <td>{{ number_format($narudzbina->ukupna_cena, 2, ',', '.') }} RSD</td>
                        <td>{{ $narudzbina->status }}</td>
                        <td>
                            <a href="{{ route('admin.narudzbine.edit', $narudzbina->id) }}" class="btn btn-secondary btn-sm mb-1">Izmeni</a>

                            <form action="{{ route('admin.narudzbine.destroy', $narudzbina->id) }}" 
                                  method="POST" 
                                  class="d-inline-block" 
                                  onsubmit="return confirm('Da li ste sigurni da želite da obrišete ovu narudžbinu?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Obriši</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Nema narudžbina</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<style>
    body { font-family: 'Poppins', sans-serif; }
    table th, table td { vertical-align: middle; }
    .table thead th { font-weight: 600; }
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
