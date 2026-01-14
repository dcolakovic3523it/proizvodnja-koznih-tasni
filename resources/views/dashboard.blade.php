@extends('layouts.admin') 

@section('title', 'Dashboard')

@section('content')
<div class="container py-5">

    <div class="row g-4">

        {{-- Proizvodi --}}
        <div class="col-md-4">
            <a href="{{ route('admin.proizvodi.index') }}" class="text-decoration-none">
                <div class="card h-100 shadow-sm rounded-4" style="background-color: #F5F1EC; border: none;">
                    <div class="card-body text-center" style="color: #561C24; font-family: 'Poppins', sans-serif;">
                        <h4 class="card-title fw-bold">Proizvodi</h4>
                        <p class="card-text">
                            Pregled, dodavanje, izmena i brisanje proizvoda
                        </p>
                    </div>
                </div>
            </a>
        </div>

        {{-- Kategorije --}}
        <div class="col-md-4">
            <a href="{{ route('admin.kategorije.index') }}" class="text-decoration-none">
                <div class="card h-100 shadow-sm rounded-4" style="background-color: #F5F1EC; border: none;">
                    <div class="card-body text-center" style="color: #561C24; font-family: 'Poppins', sans-serif;">
                        <h4 class="card-title fw-bold">Kategorije</h4>
                        <p class="card-text">
                            Upravljanje kategorijama proizvoda
                        </p>
                    </div>
                </div>
            </a>
        </div>

        {{-- Narudžbine --}}
        <div class="col-md-4">
            <a href="{{ route('admin.narudzbine.index') }}" class="text-decoration-none">
                <div class="card h-100 shadow-sm rounded-4" style="background-color: #F5F1EC; border: none;">
                    <div class="card-body text-center" style="color: #561C24; font-family: 'Poppins', sans-serif;">
                        <h4 class="card-title fw-bold">Narudžbine</h4>
                        <p class="card-text">
                            Pregled i obrada narudžbina
                        </p>
                    </div>
                </div>
            </a>
        </div>

    </div>
</div>

<style>
    .card:hover {
        transform: translateY(-5px);
        transition: all 0.3s ease;
        box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    }
    .card-title {
        font-size: 1.5rem;
    }
    .card-text {
        font-size: 1rem;
    }
</style>
@endsection
