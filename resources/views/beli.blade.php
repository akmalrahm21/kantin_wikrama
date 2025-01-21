<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beli Barang - Kantin Wikrama</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #212529;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            padding: 20px 0;
            border-bottom: 1px solid rgba(0,0,0,.125);
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .card-body {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            width: 100%;
            padding: .75rem 1rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }

        .btn-primary, .btn-secondary {
            display: inline-block;
            font-weight: 600;
            color: #fff;
            text-align: center;
            vertical-align: middle;
            user-select: none;
            background-color: #007bff;
            border: 1px solid #007bff;
            padding: .75rem 1.5rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: .25rem;
            transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-secondary {
            background-color: #ffa200;
            border-color: #ffa200;
        }

        .btn-primary:hover, .btn-secondary:hover {
            filter: brightness(90%);
        }

        .img-fluid {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>CHECKOUT</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('processBeli', $kantinwk->id) }}" method="POST">
                    @csrf
                    <div class="text-center mb-4">
                        <img src="{{ asset('storage/' . $kantinwk->image_path) }}" alt="{{ $kantinwk->nama_barang }}" class="img-fluid rounded">
                    </div>
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" id="nama_barang" class="form-control" value="{{ $kantinwk->nama_barang }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="harga_barang">Harga Barang</label>
                        <input type="text" id="harga_barang" class="form-control" value="Rp. {{ number_format($kantinwk->harga_barang, 0, ',', '.') }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_barang">Jumlah Barang</label>
                        <input type="number" id="jumlah_barang" name="quantity" class="form-control" max="{{ $kantinwk->jumlah_barang }}" required>
                    </div>
                    <button type="submit" class="btn-primary">Beli</button>
                    <a href="{{ route('pembeli.index') }}" class="btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>