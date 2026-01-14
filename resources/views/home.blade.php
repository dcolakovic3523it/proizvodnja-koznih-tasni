@extends('layouts.app')

@section('title', 'Početna')

@section('content')

<!-- glavna -->
<section class="bg-main py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="hero-title mb-3">NOVA ZIMSKA<br>KOLEKCIJA</h1>
                <a href="{{ route('proizvods.index') }}" class="btn btn-main">Pogledaj sada</a>
            </div>
            <div class="col-md-6 text-end">
                <img src="{{ asset('images/Rectangle.png') }}" style="width:500px;">
            </div>
        </div>
    </div>
</section>

<!-- katalog -->
<section class="py-5">
    <div class="container text-center">
        <a href="{{ route('proizvods.index') }}" class="katalog-link">
            <h2 class="mb-4">KATALOG</h2>
        </a>

        <div class="row g-4 justify-content-center">
            <div class="col-md-3 col-sm-6 d-flex justify-content-center">
                <div class="card catalog-card p-3">
                    <img src="{{ asset('images/image 2.jpg') }}" style="width:200px;">
                </div>
            </div>

            <div class="col-md-3 col-sm-6 d-flex justify-content-center">
                <div class="card catalog-card p-3">
                    <img src="{{ asset('images/image 3.jpg') }}" style="width:200px;">
                </div>
            </div>

            <div class="col-md-3 col-sm-6 d-flex justify-content-center">
                <div class="card catalog-card p-3">
                    <img src="{{ asset('images/image 4.jpg') }}" style="width:200px;">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- zasto izabrati nas -->
<section class="py-5 bg-white">
    <div class="container text-center">
        <h2 class="mb-5">Zašto izabrati nas?</h2>
        <div class="row">
            <div class="col-md-3 col-6">
                <div>
                    <img src="{{ asset('images/icon4.png') }}" style="width:70px;">
                </div>
                <p>Besplatna dostava</p>
            </div>

            <div class="col-md-3 col-6">
                <div>
                    <img src="{{ asset('images/icon3.png') }}" style="width:50px;">
                </div>
                <p class="mt-3">Garantovan kvalitet</p>
            </div>

            <div class="col-md-3 col-6">
                <div>
                    <img src="{{ asset('images/icon2.png') }}" style="width:50px;">
                </div>
                <p class="mt-3">Laka kupovina</p>
            </div>

            <div class="col-md-3 col-6">
                <div>
                    <img src="{{ asset('images/icon1.png') }}" style="width:50px;">
                </div>
                <p class="mt-3">Podrška 24/7</p>
            </div>
        </div>
    </div>
</section>

<!-- kategorije -->
<section class="bg-categories py-5">
    <div class="container text-center">
        <h2 class="mb-4">KATEGORIJE</h2>
        <div class="row justify-content-center">
            <div class="col-md-4 col-sm-6 d-flex flex-column align-items-center">
                <div class="mb-3">
                    <img src="{{ asset('images/elegantne.png') }}" style="width:200px;">
                </div>
                <p>Elegantne torbe</p>
            </div>

            <div class="col-md-4 col-sm-6 d-flex flex-column align-items-center">
                <div>
                    <img src="{{ asset('images/slika3.png') }}" style="width:200px;">
                </div>
                <p class="mt-4">Poslovne torbe</p>
            </div>

            <div class="col-md-4 col-sm-6 d-flex flex-column align-items-center">
                <div class="mt-3">
                    <img src="{{ asset('images/svakodnevne.png') }}" style="width:200px;">
                </div>
                <p class="mt-4">Torbe za svaki dan</p>
            </div>
        </div>
    </div>
</section>

<!-- o nama -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-5">
                <img src="{{ asset('images/image 11.png') }}" style="width:400px;">
            </div>

            <div class="col-md-7">
                <h3 class="mb-3">Vrhunski kvalitet prirodne kože</h3>
                <p>
                    Naše torbe izrađene su od pažljivo odabrane prirodne kože,
                    sa fokusom na dugotrajnost, estetiku i funkcionalnost.
                </p>
            </div>
        </div>
    </div>
</section>

@endsection
