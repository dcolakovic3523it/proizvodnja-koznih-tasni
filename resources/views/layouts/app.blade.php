<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>NORA | @yield('title')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            color: #2b2b2b;
            background-color: #ffffff;
        }

        /* GLOBAL STYLES */
        .bg-main { background-color: #F5F1EC; }
        .bg-categories { background-color: #561C24; color: #ffffff; }
        .hero-title { font-size: 42px; font-weight: 600; line-height: 1.2; }
        .btn-main {
            background-color: #561C24;
            color: #ffffff;
            border-radius: 30px;
            padding: 12px 26px;
            font-size: 14px;
            border: none;
        }
        .btn-main:hover { background-color: #44151c; color: #ffffff; }
        .catalog-card { border: none; border-radius: 16px; }
        a.katalog-link { color: inherit; text-decoration: none; }

        /* NAVBAR */
        .navbar { background-color: #F5F1EC; }
        .navbar-brand {
            font-family: 'Cormorant Garamond', serif;
            font-size: 28px;
            font-weight: 600;
            letter-spacing: 2px;
            color: #2b2b2b;
        }
        .nav-link { font-weight: 500; color: #2b2b2b !important; }
        .nav-link:hover { color: #561C24 !important; }

        /* Logout button styling */
        .btn-logout {
            background: none;
            border: none;
            padding: 0;
            margin: 0;
            color: #2b2b2b;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            align-items: center;
            height: 100%;
        }
        .btn-logout:hover { color: #561C24; text-decoration: underline; }

        footer { background-color: #ffffff; }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">NORA</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('proizvods.index') }}">Katalog</a>
                </li>

                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                @endguest

                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('narudzbinas.index') }}">
                            <i class="bi bi-card-list"></i> Moje narudžbine
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('narudzbinas.create') }}">
                            <i class="bi bi-bag-fill"></i> Korpa
                        </a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" class="d-flex">
                            @csrf
                            <button type="submit" class="btn-logout nav-link">Logout</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<!-- Content -->
@yield('content')

<!-- Footer -->
<footer class="py-4 text-center">
    <div class="container">
        <strong class="d-block mb-1">NORA</strong>
        <p class="mb-1">info@nora.rs</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
