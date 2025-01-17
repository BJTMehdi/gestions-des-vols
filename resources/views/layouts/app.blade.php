<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap and Custom CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
    @vite(['resources/css/app.css', 'resources/css/style1.css', 'resources/js/app.js'])

    <!-- Icons -->
    <link href="assets/img/favicon.png" rel="icon">
    <script src="https://kit.fontawesome.com/191bd47327.js" crossorigin="anonymous"></script>

    <!-- Custom Inline CSS -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #333;
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        .navmenu ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
            gap: 30px;
        }

        .navmenu li {
            margin: 0;
        }

        .navmenu a {
            text-decoration: none;
            color: white;
            padding: 10px 15px;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .navmenu a:hover {
            background-color: #444;
            border-radius: 5px;
        }

        .navmenu a.active {
            font-weight: bold;
            color: #f39c12;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .alert {
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }

        footer {
            background-color: #333;
            color: white;
            padding: 15px;
            text-align: center;
        }

        /* Page Heading */
        .page-heading {
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .page-heading h1 {
            margin: 0;
            font-size: 24px;
        }

        /* Main Content */
        main {
            padding: 20px;
            background-color: #fff;
            margin-top: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        /* Flash Messages */
        .alert {
            margin-bottom: 20px;
        }
    </style>
</head>
<body class="font-sans antialiased">

    <header id="header" class="header">
        <h1>Gestion des Vols</h1>
        <nav id="navmenu" class="navmenu">
            <ul>
                <!-- Vols link -->
                <li>
                    <a class="nav-link {{ request()->routeIs('vols.*') ? 'active' : '' }}" href="{{ route('vols.index') }}">
                        <i class="fa-solid fa-plane"></i>
                        <span>Vols</span>
                    </a>
                </li>

                <!-- Passagers link -->
                <li>
                    <a class="nav-link {{ request()->routeIs('passagers.*') ? 'active' : '' }}" href="{{ route('passagers.index') }}">
                        <i class="fa-solid fa-user"></i>
                        <span>Passagers</span>
                    </a>
                </li>

                <!-- Réservations link -->
                <li>
                    <a class="nav-link {{ request()->routeIs('reservations.*') ? 'active' : '' }}" href="{{ route('reservations.index') }}">
                        <i class="fa-solid fa-couch"></i>
                        <span>Réservations</span>
                    </a>
                </li>
            </ul>
        </nav>
    </header>

    <div class="min-h-screen bg-white">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="page-heading">
                <div class="container">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Flash Messages -->
        <div class="container mt-4">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot ?? '' }}
                @yield('content')
            </main>
        </div>
    </div>

    <footer>
        <p class="mb-0">&copy; {{ date('Y') }} Gestion des Vols - Tous droits réservés</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
