@extends('layouts.app')
@section('title', 'Kantinwk Admin')

@section('content')
    <h1>Kantinwk Admin</h1>
    <a href="{{ route('kantinwks.create') }}" class="btn btn-primary mb-3">Tambahkan barang</a>
    <a href="{{ route('transactions.index') }}" class="btn btn-info mb-3">Daftar Transaksi</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Pemasok</th>
                <th>Nama Barang</th>
                <th>Jenis Barang</th>
                <th>Harga Barang</th>
                <th>Jumlah Barang</th>
                <th>Gambar</th>
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
            @foreach ($kantinwks as $kantinwk)
                <tr>
                    <td>{{ $kantinwk->nama_pemasok }}</td>
                    <td>{{ $kantinwk->nama_barang }}</td>
                    <td>{{ $kantinwk->jenis_barang }}</td>
                    <td>{{ $kantinwk->harga_barang }}</td>
                    <td>{{ $kantinwk->jumlah_barang }}</td>
                    <td>
                        @if($kantinwk->image_path)
                            <img src="{{ asset('storage/' . $kantinwk->image_path) }}" alt="{{ $kantinwk->nama_barang }}" width="100">
                        @else
                            No image available
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('kantinwks.edit', $kantinwk) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('kantinwks.destroy', $kantinwk) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
