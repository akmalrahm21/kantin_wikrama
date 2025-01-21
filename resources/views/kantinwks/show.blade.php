<!-- resources/views/kantinwks/show.blade.php -->

@extends('layouts.app')

@section('title', 'Detail Transaksi')

@section('content')
    <h1>Detail Transaksi untuk {{ $kantinwk->nama_barang }}</h1>
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $kantinwk->nama_barang }}</h5>
            <p class="card-text">Harga: Rp. {{ number_format($kantinwk->harga_barang, 0, ',', '.') }}</p>
            <p class="card-text">Jumlah Tersedia: {{ $kantinwk->jumlah_barang }}</p>
            <img src="{{ asset('storage/' . $kantinwk->image_path) }}" alt="{{ $kantinwk->nama_barang }}" width="200">
        </div>
    </div>

    <h2>Daftar Transaksi</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama User</th>
                <th>Quantity</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($combinedTransactions as $transaction)
                <tr>
                    <td>{{ $transaction['user_name'] }}</td>
                    <td>{{ $transaction['total_quantity'] }}</td>
                    <td>Rp. {{ number_format($transaction['total_price'], 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
