@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Barang</h1>

        <form action="{{ route('kantinwks.update', $kantinwk->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama_pemasok">Nama Pemasok</label>
                <input type="text" name="nama_pemasok" class="form-control" value="{{ $kantinwk->nama_pemasok }}">
            </div>

            <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" value="{{ $kantinwk->nama_barang }}">
            </div>

            <div class="form-group">
                <label for="jenis_barang">Jenis Barang</label>
                <input type="text" name="jenis_barang" class="form-control" value="{{ $kantinwk->jenis_barang }}">
            </div>

            <div class="form-group">
                <label for="harga_barang">Harga Barang</label>
                <input type="text" name="harga_barang" class="form-control" value="{{ $kantinwk->harga_barang }}">
            </div>

            <div class="form-group">
                <label for="jumlah_barang">Jumlah Barang</label>
                <input type="text" name="jumlah_barang" class="form-control" value="{{ $kantinwk->jumlah_barang }}">
            </div>

            <div class="form-group">
                <label for="image">Gambar</label>
                @if($kantinwk->image_path)
                    <div>
                        <img src="{{ asset('storage/' . $kantinwk->image_path) }}" alt="{{ $kantinwk->nama_barang }}" width="100">
                    </div>
                @endif
                <input type="file" name="image" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
