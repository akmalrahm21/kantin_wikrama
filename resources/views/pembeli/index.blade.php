<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pembeli - Kantin Wikrama</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #FFFAF2;
            color: #343a40;
        }

        .navbar {
            position: fixed;
            top: 0;
            width: 98%;
            background: #0DC1DD;
            color: white;
            padding: 1em;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin: 0 1em;
            transition: color 0.3s ease;
        }

        .navbar a:hover {
            color: #adb5bd;
        }

        .search-form {
            display: flex;
            align-items: center;
            margin: 0 auto;
        }

        .search-form input[type="text"] {
            padding: 5px;
            font-size: 1em;
            border: none;
            border-radius: 4px 0 0 4px;
            outline: none;
        }

        .search-form button {
            padding: 5px 10px;
            font-size: 1em;
            border: none;
            background-color: #007bff;
            color: white;
            border-radius: 0 4px 4px 0;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .search-form button:hover {
            background-color: #0056b3;
        }

        .container {
            margin-top: 100px; /* Offset for the fixed navbar */
            padding: 20px;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .col-md-4 {
            flex: 0 0 calc(33.3333% - 20px);
            max-width: calc(33.3333% - 20px);
            box-sizing: border-box;
        }

        .card {
            background: white;
            border: none;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            padding: 20px;
            text-align: center;
        }

        .card-title {
            font-size: 1.5em;
            margin-bottom: 10px;
            color: #343a40;
        }

        .card-text {
            margin-bottom: 10px;
            color: #6c757d;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1em;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .alert {
            padding: 15px;
            background-color: #09EABA;
            color: white;
            margin-bottom: 20px;
            border-radius: 4px;
            text-align: center;
        }

        .filter-buttons {
            margin-bottom: 20px;
            text-align: center;
        }

        .filter-buttons button {
            margin: 0 10px;
            padding: 10px 15px;
            font-size: 1em;
            color: white;
            background-color: #09EABA;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .filter-buttons button:hover {
            background-color: #0DC1DD;
        }

        @media (max-width: 768px) {
            .col-md-4 {
                flex: 0 0 calc(50% - 20px);
                max-width: calc(50% - 20px);
            }
        }

        @media (max-width: 576px) {
            .col-md-4 {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }
    </style>
    <script>
        function confirmLogout(event) {
            event.preventDefault();
            if (confirm("Yakin ingin logout?")) {
                document.getElementById('logout-form').submit();
            }
        }

        function filterProducts(type) {
            document.getElementById('filter-form').elements['type'].value = type;
            document.getElementById('filter-form').submit();
        }
    </script>
</head>
<body>
    <div class="navbar">
        <div class="navbar-brand">
            <a href="">Kantin HEBAT</a>
        </div>
        <div class="search-form">
            <form action="{{ route('search') }}" method="GET">
                <input type="text" name="query" placeholder="Cari produk...">
                <button type="submit">Cari</button>
            </form>
        </div>
        <div class="navbar-menu">
            <a href="#" onclick="confirmLogout(event)">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
    <div class="container">
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Filter Buttons -->
        <div class="filter-buttons">
            <form id="filter-form" action="{{ route('pembeli.index') }}" method="GET" style="display: inline;">
                <input type="hidden" name="type" value="all">
                <button type="button" onclick="filterProducts('all')">SEMUA</button>
                <button type="button" onclick="filterProducts('makanan')">MAKANAN</button>
                <button type="button" onclick="filterProducts('minuman')">MINUMAN</button>
            </form>
        </div>

        <div class="row">
            @foreach ($kantinwks as $kantinwk)
                <div class="col-md-4">
                    <div class="card product-card">
                        <img src="{{ asset('storage/' . $kantinwk->image_path) }}" alt="{{ $kantinwk->nama_barang }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $kantinwk->nama_barang }}</h5>
                            <p class="card-text">Harga: Rp. {{ number_format($kantinwk->harga_barang, 0, ',', '.') }}</p>
                            <p class="card-text">Jumlah Tersedia: {{ $kantinwk->jumlah_barang }}</p>
                            <a href="{{ route('beli', $kantinwk->id) }}" class="btn">Beli</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
