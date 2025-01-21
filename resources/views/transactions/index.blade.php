@section('title', 'Daftar Transaksi')

@section('content')
    <h1>Daftar Transaksi</h1>
    <a href="{{ route('kantinwks.index') }}" class="btn btn-primary mb-3">Kembali ke Daftar Barang</a>
        <form action="{{ route('transactions.destroyAll') }}" method="POST" style="display:inline;" onsubmit="  return confirm('Yakin ingin menghapus semua transaksi?');">
    <form action="{{ route('transactions.destroyAll') }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger mb-3">Hapus Semua Transaksi</button>
    </form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama User</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Tanggal Transaksi</th>
                <th>Gambar Barang</th>
                <th>Actions</th>
            </tr>
        </thead>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                color: #333;
                margin: 0;
                padding: 20px;
            }

            h1 {
                font-size: 2.5em;
                color: #007bff;
                margin-bottom: 20px;
                text-align: center;
            }

            .btn {
                padding: 10px 20px;
                border-radius: 5px;
                text-transform: uppercase;
                font-weight: bold;
                text-decoration: none;
                display: inline-block;
                transition: 0.3s;
            }

            .btn-primary {
                background-color: #007bff;
                color: #fff;
                border: none;
            }

            .btn-primary:hover {
                background-color: #0056b3;
            }

            .btn-info {
                background-color: #17a2b8;
                color: #fff;
                border: none;
            }

            .btn-info:hover {
                background-color: #117a8b;
            }

            .btn-warning {
                background-color: #ffc107;
                color: #212529;
                border: none;
            }

            .btn-warning:hover {
                background-color: #e0a800;
            }

            .btn-danger {
                background-color: #dc3545;
                color: #fff;
                border: none;
            }

            .btn-danger:hover {
                background-color: #bd2130;
            }

            .table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
                background-color: #fff;
                box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            }

            .table th, .table td {
                padding: 15px;
                text-align: left;
                border: 1px solid #ddd;
            }

            .table th {
                background-color: #007bff;
                color: #fff;
            }

            .table tr:nth-child(even) {
                background-color: #f9f9f9;
            }

            .table tr:hover {
                background-color: #f1f1f1;
            }

            img {
                border-radius: 8px;
                object-fit: cover;
            }

            form {
                display: inline;
            }
        </style>

        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->user->name }}</td>
                    <td>{{ $transaction->kantinwk->nama_barang }}</td>
                    <td>{{ $transaction->quantity }}</td>
                    <td>{{ $transaction->total_price }}</td>
                    <td>{{ $transaction->created_at }}</td>
                    <td>
                        @if($transaction->kantinwk->image_path)
                            <img src="{{ asset('storage/' . $transaction->kantinwk->image_path) }}" alt="{{ $transaction->kantinwk->nama_barang }}" width="100">
                        @else
                            No image available
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" style="display:inline;">

                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

