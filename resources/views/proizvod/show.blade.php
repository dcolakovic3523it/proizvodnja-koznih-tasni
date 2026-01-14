@extends('layouts.app')

@section('title', $proizvod->naziv)

@section('content')
<style>
    body {
        font-family: 'Poppins', sans-serif;
        color: #2b2b2b;
        background-color: #ffffff;
    }

    .product-title {
        font-weight: 600;
        font-size: 1.8rem;
    }

    .product-category {
        color: #6c757d;
        font-size: 0.95rem;
    }

    .price {
        color: #7f1d1d;
        font-weight: 600;
        font-size: 1.3rem;
    }

    .rating i {
        color: #ffc107;
        font-size: 1.2rem;
    }

    .main-product-image {
        max-height: 360px;
        width: 100%;
        object-fit: contain;
        border-radius: 16px;
    }

    .btn-dark {
        background-color: #2b2b2b;
        border-color: #2b2b2b;
    }

    .btn-dark:hover {
        background-color: #561C24;
        border-color: #561C24;
    }
</style>

<div class="container py-5">
    <div class="row align-items-center">

        {{-- SLIKA PROIZVODA --}}
        <div class="col-md-6 text-center mb-4 mb-md-0">
            <img src="{{ $proizvod->slika ? asset('images/' . $proizvod->slika) : asset('images/default.jpg') }}"
                 class="img-fluid main-product-image"
                 alt="{{ $proizvod->naziv }}">
        </div>

        {{-- PODACI O PROIZVODU --}}
        <div class="col-md-6">
            <h2 class="product-title">{{ $proizvod->naziv }}</h2>

            <p class="product-category">
                {{ $proizvod->kategorija->naziv }}
            </p>

            <p class="price">
                {{ number_format($proizvod->cena, 2, ',', '.') }} RSD
            </p>

            <div class="rating mb-4">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star"></i>
            </div>

            {{-- DODAJ U KORPU --}}
            <form method="POST" action="{{ route('korpa.dodaj', $proizvod->id) }}">
                @csrf
                <button type="submit" class="btn btn-dark px-4 py-2">
                    <i class="bi bi-bag-fill"></i> Dodaj u korpu
                </button>
            </form>
        </div>

    </div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
@endsection
