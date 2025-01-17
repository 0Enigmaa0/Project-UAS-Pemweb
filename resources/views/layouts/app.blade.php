<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Komunitas Belajar') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        /* Reset Margin & Padding */
        body, html {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(to right, #4e54c8, #8f94fb);
            color: white;
            padding: 60px 0;
        }

        /* Feature Card */
        .feature-card {
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .feature-card:hover {
            transform: scale(1.05);
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
        }

        /* Footer Styling */
        footer {
            background-color: #212529;
            color: #adb5bd;
        }

        /* Body Background */
        body {
            background-color: #f8f9fa;
        }

        /* Navigation Adjustments */
        nav {
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen d-flex flex-column">
        <!-- Navigation -->
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow-sm">
                <div class="container py-4">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main class="flex-grow-1">
            @hasSection('fullwidth')
                <!-- Full Width Content -->
                @yield('fullwidth')
            @else
                <div class="container py-5">
                    @yield('fullwidth') <!-- Default Container Content -->
                </div>
            @endif
        </main>

        <!-- Footer -->
        <footer class="py-4 text-center">
            <div class="container">
                <p>© {{ date('Y') }} Komunitas Belajar. All rights reserved.</p>
            </div>
        </footer>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
