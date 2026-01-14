@extends('layouts.admin')

@section('title', 'Kategorije')

@section('content')
<div class="container py-5">
    <h1 class="mb-4" style="color: #561C24; font-family: 'Poppins', sans-serif;">Lista kategorija</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3">
        <a href="{{ route('admin.kategorije.create') }}" class="btn btn-danger btn-sm">
            Dodaj novu kategoriju
        </a>
    </div>

    <div class="table-responsive">
        <table class="table align-middle" style="background-color: #F5F1EC; border-radius: 12px; overflow: hidden;">
            <thead class="text-white" style="background-color: #561C24;">
                <tr>
                    <th>ID</th>
                    <th>Naziv</th>
                    <th>Opis</th>
                    <th>Akcije</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kategorije as $kategorija)
                    <tr>
                        <td>{{ $kategorija->id }}</td>
                        <td>{{ $kategorija->naziv }}</td>
                        <td>{{ $kategorija->opis }}</td>
                        <td>
                            <a href="{{ route('admin.kategorije.edit', $kategorija->id) }}" class="btn btn-secondary btn-sm mb-1">Izmeni</a>

                            <form action="{{ route('admin.kategorije.destroy', $kategorija->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Da li ste sigurni da želite da obrišete ovu kategoriju?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Obriši</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Nema kategorija</td>
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
    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }
    .btn-secondary:hover {
        background-color: #5a6268;
        border-color: #5a6268;
    }
</style>
@endsection
