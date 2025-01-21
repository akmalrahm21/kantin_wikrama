<!-- resources/views/checkout/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mb-4">Checkout</h1>
        <form action="{{ route('checkout.store') }}" method="POST">
            @csrf
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Jenis</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $item)
                        @if($item->kantinwk)
                            <tr>
                                <td>{{ $item->kantinwk->nama_barang }}</td>
                                <td>{{ $item->kantinwk->jenis_barang }}</td>
                                <td>Rp. {{ number_format($item->kantinwk->harga_barang, 0, ',', '.') }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>Rp. {{ number_format($item->kantinwk->harga_barang * $item->quantity, 0, ',', '.') }}</td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="5" class="text-danger">Produk tidak ditemukan</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Konfirmasi Checkout</button>
        </form>
    </div>
</body>
</html>
