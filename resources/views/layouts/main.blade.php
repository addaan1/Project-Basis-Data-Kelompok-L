<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warung Padi</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body style="background-image: url('{{ asset('images/Background.png') }}'); background-size: cover; background-attachment: fixed;">

    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">
                <img src="{{ asset('images/Logo Warung Padi.png') }}" alt="Logo">
                <span>PETANI</span>
            </div>

            <h4>Dashboard</h4>
            <ul>
                <li><a href="{{ url('/app/dashboard') }}" class="active"><i class="fas fa-home"></i> Dashboard</a></li>
            </ul>

            <h4>List Menu</h4>
            <ul>
                <li><a href="{{ url('/app/saldo') }}"><i class="fas fa-coins"></i> Saldo</a></li>
                <li><a href="{{ url('/app/transaksi') }}"><i class="fas fa-exchange-alt"></i> Aktivitas Transaksi</a></li>
                <li><a href="{{ url('/app/negosiasi') }}"><i class="fas fa-comments"></i> Status Negosiasi</a></li>
                <li><a href="{{ url('/app/inventaris') }}"><i class="fas fa-boxes"></i> Inventaris</a></li>
            </ul>

            <h4>Setting</h4>
            <ul>
                <li><a href="{{ url('/app/settings') }}"><i class="fas fa-user-cog"></i> Pengaturan Akun</a></li>
                <li><a href="{{ url('/app/ewallet') }}"><i class="fas fa-wallet"></i> Pengaturan E-Wallet</a></li>
            </ul>

            <form action="{{ url('/logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout">Logout</button>
            </form>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="card">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
