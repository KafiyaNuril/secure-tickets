<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Secure Ticketing') - SMK Wikrama Bogor</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f6f9;
            color: #212529;
        }

        /* NAVBAR */
        .navbar {
            background: #ffffff;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }

        .navbar-brand {
            color: #212529;
            font-weight: 700;
            letter-spacing: 0.3px;
        }

        /* CARD */
        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        }

        .icon-box {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
        }

        /* ALERT */
        .alert {
            border-radius: 0.75rem;
            box-shadow: 0 6px 18px rgba(0,0,0,0.06);
        }

        /* BUTTON */
        .btn {
            border-radius: 0.6rem;
            font-weight: 500;
        }

        /* BADGE */
        .badge {
            padding: 0.5em 0.75em;
            border-radius: 0.5rem;
            font-weight: 500;
        }

        /* FOOTER */
        .footer {
            background: #ffffff;
            border-top: 1px solid #e9ecef;
            padding: 2rem 0;
            margin-top: 4rem;
            color: #6c757d;
        }

        .footer i {
            color: #0d6efd;
        }

        /* CONTAINER SPACING */
        main.container {
            max-width: 1100px;
        }
    </style>

    @stack('styles')
</head>
<body>

{{-- ================= NAVBAR ================= --}}
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <i class="bi bi-shield-lock text-primary"></i> <i class="bi bi-ticket-detailed text-primary"></i> Secure Ticketing
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('tickets.*') ? 'active fw-semibold' : '' }}"
                       href="{{ route('tickets.index') }}">
                        Tickets
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav">
                {{-- Static user (sementara) --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle"></i> Kafiya
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                        <li><a class="dropdown-item" href="#"><i class="bi bi-person"></i> Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

{{-- ================= MAIN ================= --}}
<main class="container py-5">

    {{-- Flash Messages --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="bi bi-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            <i class="bi bi-exclamation-triangle"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Validation Errors --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <strong><i class="bi bi-exclamation-triangle"></i> Terjadi kesalahan:</strong>
            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Content --}}
    @yield('content')
</main>

{{-- ================= FOOTER ================= --}}
<footer class="footer">
    <div class="container text-center">
        <p class="mb-1 fw-semibold">
            <i class="bi bi-shield-lock"></i> Secure Ticketing System
        </p>
        <p class="mb-0 small text-muted">
            &copy; {{ date('Y') }} Bootcamp Secure Coding - SMK Wikrama Bogor
        </p>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

@stack('scripts')
</body>
</html>
