@extends('layouts.app')

@section('title', 'Moje narudžbine')

@section('content')
<div class="container py-5">
    <h1 class="mb-4" style="color: #561C24; font-family: 'Poppins', sans-serif;">Moje narudžbine</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($narudzbinas->isEmpty())
        <p>Nemate nijednu narudžbinu.</p>
    @else
        <div class="table-responsive">
            <table class="table align-middle" style="background-color: #F5F1EC; border-radius: 12px; overflow: hidden;">
                <thead class="text-white" style="background-color: #561C24;">
                    <tr>
                        <th>ID</th>
                        <th>Ukupna cena</th>
                        <th>Status</th>
                        <th>Akcije</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($narudzbinas as $narudzbina)
                        <tr>
                            <td>{{ $narudzbina->id }}</td>
                            <td>{{ number_format($narudzbina->ukupna_cena, 2, ',', '.') }} RSD</td>
                            <td>{{ $narudzbina->status }}</td>
                            <td>
                                <a href="{{ route('narudzbinas.show', $narudzbina->id) }}" class="btn btn-danger btn-sm mb-1">Detalji</a>
                                @if($narudzbina->status === 'Na cekanju')
                                    <a href="{{ route('narudzbinas.edit', $narudzbina->id) }}" class="btn btn-secondary btn-sm mb-1">Izmeni</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
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
    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
        color: #fff;
    }
    .btn-secondary:hover {
        background-color: #5a6268;
        border-color: #5a6268;
    }
</style>
@endsection
