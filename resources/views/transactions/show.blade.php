<!-- resources/views/transactions/show.blade.php -->

@extends('layouts.app')

@section('title', 'Detail Transaksi - ' . $kantinwk->nama_barang)

@section('content')
    <h1>Detail Transaksi - {{ $kantinwk->nama_barang }}</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama User</th>
                <th>Quantity</th>
                <th>Total Harga</th>
                <th>Tanggal Transaksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->user->name }}</td>
                    <td>{{ $transaction->quantity }}</td>
                    <td>Rp. {{ number_format($transaction->total_price, 0, ',', '.') }}</td>
                    <td>{{ $transaction->created_at->format('d-m-Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection