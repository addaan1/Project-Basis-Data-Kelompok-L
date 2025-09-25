<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang - SCM Beras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('{{ asset('images/Background.png') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: #333; /* Warna teks lebih gelap untuk kontras di background terang */
            font-family: 'Poppins', sans-serif; /* Menambahkan font Poppins */
        }
        .navbar {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            padding: 1rem 0;
        }
        .navbar-brand img {
            height: 40px; /* Sesuaikan ukuran logo */
        }
        .nav-link {
            color: #fff !important; /* Warna teks navigasi */
            font-weight: 500;
            margin: 0 10px;
        }
        .nav-link:hover {
            color: #d4edda !important;
        }
        .btn-signup {
            background-color: #28a745; /* Warna hijau untuk Sign up */
            border-color: #28a745;
            color: #fff;
            border-radius: 20px;
            padding: 8px 20px;
            display: flex;
            align-items: center;
        }
        .btn-signup:hover {
            background-color: #218838;
            border-color: #1e7e34;
            color: #fff;
        }
        .btn-login {
            background-color: transparent;
            border: 1px solid #fff;
            color: #fff;
            border-radius: 20px;
            padding: 8px 20px;
            margin-left: 10px;
        }
        .btn-login:hover {
            background-color: rgba(255, 255, 255, 0.2);
            color: #fff;
        }
        .navbar-toggler {
            border-color: rgba(255, 255, 255, 0.1);
        }
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.55%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }
        .glass-morphism-card {
            background: rgba(255, 255, 255, 0.4);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 2rem;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand fw-bold" href="/">
                <img src="{{ asset('images/Logo Warung Padi.png') }}" alt="Warung Padi Logo">
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#">HOME</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">MARKET</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">ABOUT US</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">CONTACT US</a></li>
                </ul>
                <div class="d-flex">
                    <a href="#" class="btn btn-signup me-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle me-2" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                        </svg>
                        Sign up
                    </a>
                    <a href="{{ route('login') }}" class="btn btn-login">Log in</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>