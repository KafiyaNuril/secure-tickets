<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Secure Ticketing - SMK Wikrama Bogor</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #4f46e5;
            --primary-dark: #4338ca;
            --bg-dark: #0f172a;
            --text-muted: #94a3b8;
            --border-subtle: rgba(255, 255, 255, .15);
        }

        body {
            font-family: 'Inter', sans-serif;
        }

        /* HERO SECTION */
        .hero-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            background:
                radial-gradient(circle at top right, rgba(79, 70, 229, .25), transparent 50%),
                radial-gradient(circle at bottom left, rgba(56, 189, 248, .15), transparent 50%),
                var(--bg-dark);
            color: #fff;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 1rem;
        }

        .hero-subtitle {
            font-size: 1.1rem;
            color: var(--text-muted);
            max-width: 520px;
            margin-bottom: 2rem;
        }

        .btn-primary-custom {
            background: linear-gradient(135deg, var(--primary), #6366f1);
            border: none;
            padding: 0.75rem 1.5rem;
            font-weight: 500;
            border-radius: 10px;
        }

        .btn-primary-custom:hover {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary));
        }

        .btn-outline-light {
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
        }
    </style>
</head>

<body>

    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="hero-title">
                        Sistem Ticketing untuk Laporan & Permintaan Fitur
                    </h1>

                    <p class="hero-subtitle">
                        Kelola laporan bug, permintaan fitur, dan kendala sistem secara terstruktur
                        melalui platform ticketing yang aman, cepat, dan mudah digunakan.
                    </p>

                    <div class="hero-cta">
                        <a href="{{ route('tickets.index') }}" class="btn btn-primary-custom me-3">
                            <i class="bi bi-shield-lock me-1"></i> Lihat Tiket
                        </a>

                        <a href="{{ route('tickets.create') }}" class="btn btn-outline-light me-3"
                            style="border-color: var(--border-subtle);">
                            Buat Tiket Baru
                        </a>

                        <a href="{{ route('demo-blade.index') }}" class="btn btn-outline-light"
                            style="border-color: var(--border-subtle);">
                            Demo Blade
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
