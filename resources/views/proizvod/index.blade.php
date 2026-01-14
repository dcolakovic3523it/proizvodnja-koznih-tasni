@extends('layouts.app')

@section('title', 'Katalog')

@section('content')
<style>
    body {
        font-family: 'Poppins', sans-serif;
        color: #2b2b2b;
        background-color: #ffffff;
    }

    .product-card {
        border: none;
        border-radius: 16px;
        transition: transform 0.3s, box-shadow 0.3s;
        overflow: hidden;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .product-card img {
        max-height: 180px;  
        width: 100%;
        object-fit: contain;   
        border-radius: 12px;
        transition: transform 0.3s;
    }

    .product-card img:hover {
        transform: scale(1.05);
    }
</style>

<section class="py-5">
    <div class="container">
        <div class="row g-4">
            @foreach ($proizvods as $proizvod)
                <div class="col-md-4 col-sm-6">
                    <div class="card product-card p-3 text-center">
                        <img src="{{ asset('images/' . $proizvod->slika) }}"
                             class="img-fluid mb-3"
                             alt="{{ $proizvod->naziv }}">

                        <a href="{{ route('proizvod.show', $proizvod->id) }}"
                           class="text-dark text-decoration-none">
                            <p class="mb-1 fw-semibold">
                                {{ $proizvod->naziv }}
                            </p>
                        </a>

                        <small class="text-muted">
                            {{ number_format($proizvod->cena, 2, ',', '.') }} RSD
                        </small>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
