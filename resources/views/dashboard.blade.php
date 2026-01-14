@extends('layouts.app') 

@section('title', 'Dashboard')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Admin Dashboard</h1>

    <div class="row g-4">

        {{-- Proizvodi --}}
        <div class="col-md-4">
            <a href="{{ route('admin.proizvodi.index') }}" class="text-decoration-none">
                <div class="card border-primary h-100">
                    <div class="card-body text-center">
                        <h4 class="card-title">Proizvodi</h4>
                        <p class="card-text">
                            Pregled, dodavanje, izmena i brisanje proizvoda
                        </p>
                    </div>
                </div>
            </a>
        </div>

        {{-- Kategorije --}}
        <div class="col-md-4">
            <a href="#" class="text-decoration-none">
                <div class="card border-success h-100">
                    <div class="card-body text-center">
                        <h4 class="card-title">Kategorije</h4>
                        <p class="card-text">
                            Upravljanje kategorijama proizvoda
                        </p>
                    </div>
                </div>
            </a>
        </div>

        {{-- Narudžbine --}}
        <div class="col-md-4">
            <a href="#" class="text-decoration-none">
                <div class="card border-warning h-100">
                    <div class="card-body text-center">
                        <h4 class="card-title">Narudžbine</h4>
                        <p class="card-text">
                            Pregled i obrada narudžbina
                        </p>
                    </div>
                </div>
            </a>
        </div>

    </div>
</div>
@endsection
