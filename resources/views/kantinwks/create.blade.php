@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Create New Item</title>
</head>
<style>
            body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        form {
            display: grid;
            grid-gap: 10px;
        }

        label {
            font-size: 16px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"] {
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: calc(100% - 16px);
        }

        button[type="submit"] {
            background-color: #0084F9;
            color: #FFFF;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        button[type="submit"]:hover {
            background-color: #017CE8;
        }
    </style>
<body>
    <h1>Create New Item</h1>
    <form action="{{ route('kantinwks.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="nama_pemasok">Nama Pemasok:</label>
        <input type="text" name="nama_pemasok" required>
        <br>
        <label for="nama_barang">Nama Barang:</label>
        <input type="text" name="nama_barang" required>
        <br>
        <label for="jenis_barang">Jenis Barang:</label>
        <input type="text" name="jenis_barang" required>
        <br>
        <label for="harga_barang">Harga Barang:</label>
        <input type="number" step="0.01" name="harga_barang" required>
        <br>
        <label for="jumlah_barang">Jumlah Barang:</label>
        <input type="number" name="jumlah_barang" required>
        <br>
        <label for="image_path">Image:</label>
        <input type="file" name="image_path" required>
        <br>
        <button type="submit">Create</button>
    </form>
</body>
</html>
@endsection